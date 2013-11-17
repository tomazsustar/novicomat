<?php

Yii::import('application.vendors.*');
require_once('ics-parser-read-only/ICal.php');
require_once('simple_html_dom.php');

class ICalParser extends Parser {
    /*
     * Parser ima 3 abstraktne metode: import, readSource, loop
     */
    var $html = array();
    var $oldPath;
    var $datoteka;

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
            $ical = new ICal('basictest.ics');
            $events = $ical->events();
            foreach ($events as $event) {
                    $this->loop($event);
            }			   
        }
			//print_r($channel);
	           
	      	$this->afterProcess();

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
        $vsebina->title=$event['SUMMARY'];
        $vsebina->global_id=$event['UID'];
        $koledar->naslov=$event['SUMMARY'];
        $koledar->zacetek=date('Y-m-d', strtotime($event['DTSTART']));
        $koledar->konec=date('Y-m-d', strtotime($event['DTEND']));
        $koledar->lokacija=$event['LOCATION'];

        // da se napolni baza brez vseh atributov in nastavimo id_vsebine za koledar
        if($vsebina->save(false)){
            $koledar->id_vsebine=$vsebina->getPrimaryKey();
            $koledar->save(false);
            
        }
    }
    

    /**
     * 
     * odpre in prebere ics vir
     */
    public function readSource() {
        try { 
                $this->html=file_get_html($this->stran_model->url);
                //preveri, če se je stran spremenila
                $this->trenutni_hash = md5($this->html);
                self::Log("Prebrano. ".$this->stran_model->url);
        } catch(CException $e){ 
                Yii::log($e->getMessage(),CLogger::LEVEL_WARNING);
        }
        // ustvarimo datoteko datoteko in jo nafilamo z vsebino prebrano iz urlja za parsanje
        file_put_contents("basictest.ics", file_get_contents($this->stran_model->url));
    }

	protected function exists(& $item){
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					array('global_id'=>$item['UID'])  //values
					);
	  }

}

?>
