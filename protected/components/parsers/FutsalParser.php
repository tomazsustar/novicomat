<?php

/**
 * 
 * Enter description here ...
 * @property simple_html_dom $html
 * @author root
 *
 */

class FutsalParser extends Parser {
	
	var $html = array();
	var $oldPath;
        /**
         * Shows the statistics of resources used by application
         * @param boolean $return defines if the result should be returned or send to output
         * @return string
         */
		
	   public function __construct($stran_model){
	   		$this->stran_model=$stran_model; // nastavi globalno spremenljivko
	   		parent::__construct();
	   }
	   
	
	public function import()
		    {        	
		     $this->readSource();
		        	
			if($this->trenutni_hash!="" &&  $this->trenutni_hash == $this->stran_model->last_update_hash){
				self::Log("Stran se ni spremenila");
				$this->msg = "Stran se ni spremenila";
				
			}else{
		     
				
//				$body = new simple_html_dom();
//				$body->load($this->html->find('td[class=main-body]',0));
//				self::Log("najdenih ". count($body->find('a')). " povezav");
				
				// Loop over each channel item and store relevant data
				foreach ($this->html->find('a[class=read-more-link]') as $item) {
					//najdi vse linke znotraj td[class=main-body] in imajo tekst Več...
						self::Log($item->innertext.$item->href);
						$this->loop($item);
				}			   
			}
			//print_r($channel);
	           
	      	$this->afterProcess();
	           
	   }
       
        
        /**
         * 
         * se kliče v vzanki za vsako vsebino
         * @param s$item
         */        
        public function loop(& $item){
        	$this->counter_processed++;
			if ($this->exists($item)){ // če že obstaja ga ne gledamo več
				$this->counter_existing++;
				return;
			} 
			
			$html = file_get_html($item->href);
			if(is_object($html)){
				
				$vsebina = new Vsebine();
				
				$vsebina->title = trim($html->find('h1[class=entry-title]',0)->title); //naslov
				$vsebina->vir_url = $item->href; //link
				$vsebina->fulltext = $html->find('div[class=entry-content]',0)->innertext; //text
				$vsebina->author = $html->find('address[class=vcard]',0)->find('a',0)->innertext; //avtor
				
				//preg_match(ZDate::DATETIME_REGEX, $html->find('td[class=news-footer]',0), $matches);
				
				$vsebina->created = ZDate::dbDateTime_php($html->find('abbr[class=published]',0)->title);
				//self::Log("datum ".$html->find('abbr[class=published]',0)->title."  ".ZDate::dbDateTime_php($html->find('abbr[class=published]',0)->title));
				
				$vsebina->global_id = $vsebina->vir_url;
				
				//slika
				$img = $html->find('div[class=the-post-image]',0)->find('img',0);
				$vsebina->slika = $img->src;
//				$img->height=null;
//				$img->style="width:150px;margin:5px;float:right;";
				//$vsebina->fulltext = $img.trim($vsebina->text); //slika
				//self::Log($vsebina->text);
				//interne vrednosti
				$this->beforeInsert($vsebina);
				
				if($vsebina->save(false)){
					$this->counter_imported++;
				}else{
					$this->counter_import_error++;
				}
				self::Log("Prebrano. ".$item->href);
			}else self::Log("html objekt ni bil ustvarjen");

        }
        
        /**
         * 
         * odpre in prebere rss vir
         */
        public function readSource(){
        	
	        try{ 
	                $this->html=file_get_html($this->stran_model->url);
	                //preveri, če se je stran spremenila
	                $this->trenutni_hash = md5($this->html);
	                self::Log("Prebrano. ".$this->stran_model->url);
	        }catch(CException $e){ 
	                Yii::log($e->getMessage(),CLogger::LEVEL_WARNING);
	        }
	        
	        
			/*	$channel = array(
				    'title'       => $feed->title(),
				    'link'        => $feed->link(),
				    'description' => $feed->description(),
				    'items'       => array()
				    );*/
	        
	        
        }
        
//        /**
//         * operacije po končanjem uvozu
//         * @see protected/components/parsers/Parser::afterProcess()
//         */
//        public function afterProcess(){
//        	//after you use zend classes, remove zend from included paths to increase perfomance
//	        set_include_path($this->oldPath);
//	             
//	        parent::afterProcess();
//        }
        
	protected function exists(& $item){
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					array('global_id'=>$item->href)  //values
					);
	  }
        
}
