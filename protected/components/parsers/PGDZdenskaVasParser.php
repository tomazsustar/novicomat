<?php

/**
 * 
 * Enter description here ...
 * @property simple_html_dom $html
 * @author root
 *
 */

class PGDZdenskaVasParser extends Parser {
	
	var $html = array();
	
	var $currentItem; 
	var $oldPath;
	var $parser_state = 0; //1-naslov, 2-vsebina
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
				//self::Log($this->html->find('table[class=blog]',0)->children[0]->children[0]);
				
				// Loop over each channel item and store relevant data
				foreach ($this->html->find('table[class=contentpaneopen]') as $item) {
					//najdi vse linke znotraj td[class=main-body] in imajo tekst Več...
					
						//self::Log($item->innertext);
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
        	if ($this->parser_state<1){
        		$this->parser_state=1;
        		
        		//najprej pride naslov, ob nasledni iteraciji pa vsebina
        		$this->currentItem = new Vsebine();
        		$this->currentItem->title = trim($item->find('td[class=contentheading]',0)->innertext); //naslov
        		//self::Log($this->currentItem->title);
        	}
        	else{
        		$this->counter_processed++;
				if ($this->exists($item)){ // če že obstaja ga ne gledamo več
					$this->counter_existing++;
					$this->parser_state=0;
					return;
				} 
        		$this->parser_state=2;
        		//Prispeval: Avtor - razbijemo po dvopičju
        		$arr = explode(':',$item->find('span[class=small]',0)->innertext) ;
        		$this->currentItem->author=trim($arr[1]);
        		//self::Log($this->currentItem->author);
        		$this->currentItem->created=ZDate::parseDate($item->find('td[class=createdate]',0));
				//self::Log($this->currentItem->created);
        		
        		$this->currentItem->fulltext=$item->children[2]->firstChild()->innertext;
        		//self::Log($this->currentItem->introtext);
        		
        		$this->currentItem->vir_url=$this->stran_model->url;
        		$this->currentItem->global_id = $this->stran_model->home_url.'/'.$this->currentItem->title;
        		
        		//če ima preberi več, izpišemo link v fulltext. Stran ni vrne, da nimam pravice za dostop do te vsebine.
        		foreach($item->find('a[class=readon]') as $preberiVec){
        			$this->currentItem->vir_url=$preberiVec->href;
        			$preberiVec->class=null;
        			$preberiVec->innertext="Več na strani PGD Zdenska vas..."; 
        			$this->currentItem->fulltext.=$preberiVec;
        			//echo $html;
        			//self::Log($html->find('table[class=contentpaneopen]',1));
        		}
        		
   				   	//interne vrednosti
				$this->beforeInsert($this->currentItem);
				
				if($this->currentItem->save(false)){
					$this->counter_imported++;
				}else{
					$this->counter_import_error++;
				}
        		
        		$this->parser_state=0;
        		
        	}
//        	$this->counter_processed++;
//			if ($this->exists($item)){ // če že obstaja ga ne gledamo več
//				$this->counter_existing++;
//				return;
//			} 
			//self::Log($item);
//			$html = file_get_html($this->stran_model->home_url.'/'.$item->href);
//			if(is_object($html)){
//				
//				$vsebina = new Vsebine();
//				
//				$vsebina->title = trim($html->find('td[class=capmain]',0)->innertext); //naslov
//				$vsebina->vir_url = $this->stran_model->home_url.'/'.$item->href; //link
//				$vsebina->text = $html->find('td[class=main-body]',0)->innertext; //text
//				$vsebina->author = $html->find('td[class=news-footer]',0)->find('a',0)->innertext; //avtor
//				
//				preg_match(ZDate::DATETIME_REGEX, $html->find('td[class=news-footer]',0), $matches);
//				//self::Log("datum ".$matches[0]."  ".ZDate::dbDateTime_php($matches[0]));
//				$vsebina->created = ZDate::dbDateTime_php($matches[0]);
//				
//				$vsebina->global_id = $vsebina->vir_url;
//				
//
//			
//				//interne vrednosti
//				$this->beforeInsert($vsebina);
//				
//				if($vsebina->save(false)){
//					$this->counter_imported++;
//				}else{
//					$this->counter_import_error++;
//				}
//				self::Log("Prebrano. ".$item->href);
//			}else self::Log("html objekt ni bil ustvarjen");

        }
        
        /**
         * 
         * odpre in prebere rss vir
         */
        public function readSource(){
        	
	        try{ 
	                $this->html=file_get_html($this->stran_model->url);
	                //preveri, če se je stran spremenila
	               $this->trenutni_hash = md5($this->html->find('table[class=blog]',0));
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
					array('global_id'=>$this->stran_model->home_url.'/'.$this->currentItem->title)  //values
					);
	  }
        
}