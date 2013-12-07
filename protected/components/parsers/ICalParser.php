<?php

Yii::import('application.vendors.*');
require_once('ics-parser-read-only/ICal.php');

class ICalParser extends Parser {
    /*
     * Parser ima 3 abstraktne metode: import, readSource, loop
     */

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
            $ical = new ICal('protected/runtime/basictest.ics');
            if ($ical->events() != false) { // preverimo, ce je brez eventsov
                $events = $ical->events();
                foreach ($events as $event) {
                        $this->loop($event);
                }			   
            } 
            /*
            $events = $ical->events();
            foreach ($events as $event) {
                    $this->loop($event);
            }			   
             */
        }
	           
        $this->after();

    }

    // preverjanje trenutnega hasha    
    public function after() {
        $this->afterProcess();
        //echo "<br />";
        //echo "Trenutni hash: " .$this->trenutni_hash;
    }

    public function loop(& $event) {
        $this->counter_processed++;
        if ($this->exists($event)){ // če že obstaja ga ne gledamo več
            $this->counter_existing++;
            return;
        } 

        $koledar = new Koledar(); // naslov, zacetek, konec, lokacija 
        $vsebina = new Vsebine(); // naslov

        // filanje koledarja in vsebine
        $vsebina->title=preg_replace('[\\\]', '', $event['SUMMARY']);
        $vsebina->global_id=$event['UID'];
        //$vsebina->introtext=preg_replace('[\\\]', '', preg_replace('/\v+|\\\[rn]/', '<br />', $event['DESCRIPTION']));
        $vsebina->introtext=preg_replace('[\\\]', '', preg_replace('/\v+|\\\[rn]/', ' ', $event['DESCRIPTION']));
        $vsebina->created=date('d-m-Y G:i:s', strtotime($event['CREATED']));
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
        try { 
                // ustvarimo datoteko datoteko in jo nafilamo z vsebino prebrano iz urlja za parsanje
                file_put_contents("protected/runtime/basictest.ics", file_get_contents($this->stran_model->url));
                $icsfile = file_get_contents("protected/runtime/basictest.ics");

                //preveri, če se je stran spremenila
                $this->trenutni_hash = md5($icsfile);
                self::Log("Prebrano. ".$this->stran_model->url);
        } catch(CException $e){ 
                Yii::log($e->getMessage(),CLogger::LEVEL_WARNING);
        }
    }

	protected function exists(& $item){
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					array('global_id'=>$item['UID'])  //values
					);
	  }
}

?>
