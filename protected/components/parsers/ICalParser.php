<?php

Yii::import('application.vendors.*');
require_once('ics-parser-read-only/ICal.php');
require_once('ics-parser-read-only/MyCal.ics');

class ICalParser extends Parser {
    /*
     * Parser ima 3 abstraktne metode: import, readSource, 
     * loop
     */

    public function __construct() {
        echo "v konstruktorju <br />";
    }

    public function import() {
         $this->readSource();
         $datoteka = 'basictest.ics';
                
         
        $ical = new ICal($datoteka);
        $events = $ical->events();

        $koledar = new Koledar(); // naslov, zacetek, konec, kolakcija 
        $vsebina = new Vsebine(); // naslov

        foreach ($events as $event) {
            echo "Vsebina naslov: " .$vsebina->title=$event['SUMMARY'] . "<br />";
            echo "Koledar naslov: " .$koledar->naslov=$event['SUMMARY'] . "<br />";
            echo "Koledar zacetek: " .$koledar->zacetek=date('Y-m-d', strtotime($event['DTSTART'])) . "<br />";
            echo "Koledar konec: " .$koledar->konec=date('Y-m-d', strtotime($event['DTEND'])) . "<br />";
            echo "Koledar lokacija: ". $koledar->lokacija=$event['LOCATION'] . "<br />";
            echo "========================================== <br />";
        }

        // testiranje
        /*
        echo "v funkciji import() <br />";
        echo $events[0]['SUMMARY'];
        echo "<br />";

        $vsebina->title=$events[0]['SUMMARY'];

        echo $vsebina->title;

        $koledar->naslov=$events[0]['SUMMARY'];
        $koledar->zacetek=$events[0]['DTSTART'];
        $koledar->konec=$events[0]['DTEND'];
        $koledar->lokacija=$events[0]['LOCATION'];
         */
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
        echo "v readSource <br />";
        file_put_contents("basictest.ics", file_get_contents('http://www.google.com/calendar/ical/jaklicev.dom%40gmail.com/public/basic.ics'));

        $datoteka = 'basictest.ics';
    }

    public function loop(& $item) {

    }
    

}

?>
