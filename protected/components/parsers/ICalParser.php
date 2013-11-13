<?php

<<<<<<< HEAD
Yii::import('application.vendors.*');
require_once('ics-parser-read-only/ICal.php');
require_once('ics-parser-read-only/MyCal.ics');

class ICalParser extends Parser {
    /*
     * Parser ima 3 abstraktne metode: import, readSource, 
     * loop
     */
=======
require_once Yii::app()->basePath.'/vendors/ics-parser-read-only/ICal.php.back.php';
require_once Yii::app()->basePath.'/vendors/ics-parser-read-only/MyCal.ics';

class ICalParser extends ICal {
    public $filename = 'MyCal.ics';

    public function __construct() {
        parent::__construct($this->filename);
    }
>>>>>>> eeb9e7b24d46a45fb12e167358778fe6e08bff55

    public function __construct() {
        echo "v konstruktorju <br />";
    }

    public function import() {
         $this->readSource();
         $datoteka = 'basictest.ics';
                
         
        $ical = new ICal($datoteka);
        $events = $ical->events();

        $koledar = new Koledar(); // id, title, 
        $vsebina = new Vsebine(); // id, naslov, id_vsebine, zacetek, konec, lokacija, id_lokacija

        /*
        foreach ($events as $event) {
            $vsebina->title=$event['SUMMARY'];
            $koledar->title=$event['SUMMARY'];
            $koledar->zacetek=$event['DTSTAER'];
            $koledar->konec=$event['DTEND'];
            $koledar->lokacija=$event['LOCATION'];
        }
         */
        $vsebina->title=$events[0]['SUMMARY'];
        $koledar->title=$events[0]['SUMMARY'];
        $koledar->title=$events[0]['DTSTAER'];
        $koledar->title=$events[0]['DTEND'];
        $koledar->title=$events[0]['LOCATION'];
    }


    /**
     * 
     * odpre in prebere ics vir
     */
    public function readSource() {
        /*
        try { 
                $this->html=file_get_html($this->stran_model->url);
                //preveri, če se je stran spremenila
                $this->trenutni_hash = md5($this->html);
                self::Log("Prebrano. ".$this->stran_model->url);
        } catch(CException $e){ 
                Yii::log($e->getMessage(),CLogger::LEVEL_WARNING);
        }
         */
        // Ustvarimo datoteko datoteko in jo nafilamo z vsebino prebrano iz urlja za parsanje
//        file_put_contents("basictest.ics", file_get_contents($this->stran_model->url));
        file_put_contents("basictest.ics", file_get_contents('http://www.google.com/calendar/ical/jaklicev.dom%40gmail.com/public/basic.ics'));

        $datoteka = 'basictest.ics';
    }

    public function loop(& $item) {

    }
    

}


?>
