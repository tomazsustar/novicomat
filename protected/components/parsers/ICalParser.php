<?php

require_once Yii::app()->basePath.'/vendors/ics-parser-read-only/ICal.php.back.php';
require_once Yii::app()->basePath.'/vendors/ics-parser-read-only/MyCal.ics';

class ICalParser extends ICal {
    public $filename = 'MyCal.ics';

    public function __construct() {
        parent::__construct($this->filename);
    }

    public function izpisiNekaj() {
        echo "nekaj izpisano" . "<br />";
    }

}


?>
