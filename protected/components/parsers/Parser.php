<?php

/**
 * 
 * Enter description here ...
 * @author root
 * @property Strani $stran_model
 *
 */
abstract class Parser extends CComponent
{
	var $stran_model;
	var $trenutni_clanek;
	var $msg;
	var $counter_processed=0;
	var	$counter_imported=0;
	var $counter_existing=0;
	var $counter_import_error=0;
	var $trenutni_hash=""; //se primerja s hashem zadnega importa, da se ugotovi, ali je bila stran spremenjena
	
	public function __construct(){
		require_once Yii::app()->basePath.'/vendors/simple_html_dom.php';
	}
	
 	abstract function import();
        
    abstract function readSource();

	abstract function loop(& $item);
        
	
	/**
	 * 
	 * Enter description here ...
	 * @param Vsebine $vsebina
	 */
	public function beforeInsert(& $vsebina){
//		echo '<pre>';
//		print_r($vsebina->attributes);
//		echo '</pre>';
//		die();
		
		$vsebina->site_id=$this->stran_model->id; //id strani
		$vsebina->import_checksum = md5($vsebina->introtext); //checksum  
		$vsebina->imported = ZDate::dbNow(); //datum uvoza
		
		//default values
		if(trim($vsebina->author_alias) == "") $vsebina->author_alias =$this->stran_model->author_alias;
		if(trim($vsebina->tags) == "") $vsebina->tags =$this->stran_model->tags;
		if($vsebina->sectionid<1)$vsebina->sectionid = $this->stran_model->sectionid;
		if($vsebina->catid<1)$vsebina->catid = $this->stran_model->catid;
		if($vsebina->event_cat<1)$vsebina->event_cat = $this->stran_model->event_cat;
		
		$this->processHtml($vsebina);
		
		$vsebina->text.='<br><span style="float:right;font-style:italic">(Vir: '.$vsebina->virLink.')</span>';
	}
	
	public function afterProcess(){
		
       	$this->stran_model->porocilo = $this->getReport(); 
		$this->stran_model->last_update=ZDate::dbNow();
		$this->stran_model->last_update_hash=$this->trenutni_hash;
		$this->stran_model->update(array('last_update', 'porocilo', 'last_update_hash'));
		echo $this->getReport();
	}
	
	private function processHtml(& $vsebina){
		
		if(trim($vsebina->text)!=""){ 
		$html = str_get_html($vsebina->text);
		
			if (is_object($html)){
				$this->processImages($html);
				$vsebina->text=$html;
			}
			else{
				self::Log("html objekt ni bil ustvarjen", $vsebina);
			}
		} else self::Log("prazna vsebina", $vsebina);
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param Vsebine $vsebina
	 */
	protected function processImages( & $html){
		
		//echo '<pre>';print_r($html->find('img'));echo'</pre>';
		foreach ($html->find('img') as $e){
			$style = new ZStyle($e->style);
			$style->removeRules(array('border'));
			$style->margin = '5px';
			$e->style=$style;
			
			//src - če je bila pot d oslike nastavljena relativno, jo moramo nastaviti absolutno
			if(substr($e->src, 0,4)!="http"){
				$e->src=$this->stran_model->home_url.'/'.$e->src;
			}
		}
		
		
	}
	
	protected function processLinks(& $html){
		foreach ($html->find('a') as $a){ //povezave nastavimo absolutno
			if(substr($a->href, 0,4)!="http"){
				$a->href=$this->stran_model->home_url.'/'.$a->href;
			}
		}
	}
	
	public function getReport(){
		$report="";
			//$report = "Uvoz iz strani: ". $this->stran_model->naslov. "\n";
			$report.= $this->counter_processed." pregledanih\n";
           $report.= $this->counter_existing." ze obstojecih\n";
           $report.= $this->counter_imported." uvozenih\n";
           $report.= $this->counter_import_error." napak\n";
           $report.= $this->msg."\n";
           return $report;
	}
	
	protected static function Log($msg, &$vsebina=false, $level='info'){
		
		if(!$vsebina)
			Yii::log($msg, $level, 'parser');
		else
			Yii::log($msg.' - '. $vsebina->title, $level, 'parser');
	}
	
	  
}