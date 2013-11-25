<?php

Yii::import('application.vendors.*');
require_once('ics-parser-read-only/ICal.php');

class TrubarjeviKrajiICalParser extends Parser {
    /*
     * Parser ima 3 abstraktne metode: import, readSource, loop
     */
    var $poljeID = array(); // izracunamo na podlagi summary in zacetka dogodka
    var $stevec = 0; // steje stevilo zgeneriranih idjev v $poljeID[]

    public function __construct($stran_model) {
        $this->stran_model=$stran_model;
        parent::__construct();
    }

    public function import() {
	    $this->readSource();
		        	
        if($this->trenutni_hash!="" &&  $this->trenutni_hash == $this->stran_model->last_update_hash){
            self::Log("Stran se ni spremenila");
            $this->msg = "Stran se ni spremenila";
            
        } else{
		     
            // Loop over each channel item and store relevant data
            $ical = new ICal('trubarjeviKraji.ics');
            $events = $ical->events();
            foreach ($events as $event) {
                    $this->loop($event);
            }			   
        }
			//print_r($channel);
	           
        $this->afterProcess();

    }

    public function loop(& $event) {
        $koledar = new Koledar(); // naslov, zacetek, konec, lokacija 
        $vsebina = new Vsebine(); // naslov

        /* za trubarjeve kraje izracunamo id tako da skup damo summary in zacetni datum dogodka */
        $vsebina->global_id=md5($event['SUMMARY'] . $event['DTSTART']); // izracunano na podlagi SUMMARY, DTSTART
        $this->poljeID[] = $vsebina->global_id;

        $this->counter_processed++;
        if ($this->exists($stevec)){ // če že obstaja ga ne gledamo več
            $this->counter_existing++;
            return;
        } 
        $this->stevec++;

        // filanje koledarja in vsebine
        $vsebina->title=preg_replace('[\\\]', '', $event['SUMMARY']);
        $vsebina->introtext=preg_replace('[\\\]', '', preg_replace('/\v+|\\\[rn]/', '', $event['DESCRIPTION']));
        $vsebina->created=ZDate::dbNow();
        $koledar->naslov=preg_replace('[\\\]', '', $event['SUMMARY']);
        $koledar->zacetek=date('d-m-Y G:i:s', strtotime($event['DTSTART']));
        $koledar->konec=date('d-m-Y G:i:s', strtotime($event['DTEND']));
        $koledar->lokacija=$event['LOCATION'];
		$vsebina->imported = ZDate::dbNow(); //datum uvoza

        // da se napolni baza brez vseh atributov in nastavimo id_vsebine za koledar
        if($vsebina->save(false)){
            $this->counter_imported++;
            $koledar->id_vsebine=$vsebina->getPrimaryKey();
            $koledar->save(false);
        } else {
            $this->counter_import_error++;
        }
    }
    

    /**
     * 
     * odpre in prebere ics vir
     */
    public function readSource() {
            // ustvarimo datoteko datoteko in jo nafilamo z vsebino prebrano iz urlja za parsanje
            file_put_contents("trubarjeviKraji.ics", file_get_contents($this->stran_model->url));
            $icsfile = file_get_contents("trubarjeviKraji.ics");
    }

	protected function exists(& $stevec){
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					//array('global_id'=>$item['UID'])  //values
					array('global_id'=>$this->poljeID[$this->stevec])
					);
	  }
}

?>
