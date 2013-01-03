<?php

/**
 * 
 * Enter description here ...
 * @property simple_html_dom $html
 * @property Vsebine $currentItem
 * @author root
 *
 */

class SDKompoljeParser extends Parser {
	
	var $html = array();
	
	var $currentItem;  
	var $foto="";
	var $parser_state = 0; //ali je bila celica z avtorjem že prebrana. za njo namreč pride celica s tekstom
	
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

				 $s1= 'table[style=width: 468px; float: left; border-color: #c0c0c0; border-width: 0]';
			     foreach ($this->html->find($s1,0)->find('td') as $td) {
			     	self::Log($this->parser_state);
			     	$this->loop($td); //najdemo tabelo v kateri so članki in loopamo po celicah
			     	$this->parser_state++;
			     	
			     } 
			}
//			//print_r($channel);
//	           
	      	$this->afterProcess();
	           
	   }
       
        
        /**
         * 
         * se kliče v vzanki za vsako vsebino
         * @param s$item
         */        
        public function loop(& $item){
        	
        	$fc=$item->firstChild();
        	if($fc)	$fc2 = $fc->firstChild();
        	
        	if($item->style=="height: 10px; width: 738px;"){
        		// vsak članek se začne s tako celico
        		$this->currentItem = new Vsebine();
        		$this->foto = "";
        		$this->parser_state=0;
        		
        		$this->counter_processed++;
        		//self::Log($item);
        	}       	
        	elseif(isset($fc2)){
        		if($fc2->tag=='img'){ //slika
        			$this->currentItem->slika=$this->stran_model->home_url.'/'.$fc2->src;
//        			$fc2->style="width:150px;float:left;";
//        			$fc2->width=null;
//        			$fc2->height = null;
//        			$this->currentItem->introtext.=$fc2; //če je slika jo damo kar v introtext
        			//$this->parser_state=1;
        			//self::Log($this->currentItem->introtext);
        		}else if($fc2->tag=='strong'){ //naslov
        			$this->currentItem->title = $fc2->innertext;
    				//self::Log($fc->innertext);
        			//self::Log($fc2->innertext);
        			$this->parser_state=2;
        		} 
        	}elseif($fc){
        		if($fc->style=="font-size: x-small; font-family: Verdana; color: #666666; margin-left: 10px; margin-right: 10px; margin-bottom: 10px"){
        			//podatki o avtorju, datum, foto
        			
        			
        			//avtor
        			$arr=explode(',', $fc->innertext, 2);
        			$this->currentItem->author_alias=trim($arr[0]);
        			
        			//datum
        			preg_match(ZDate::DATE_REGEX, $arr[1], $matches);
        			$this->currentItem->created = $matches[0];
        			
        			//foto
        			$arr2=explode(':', $arr[1], 2);
        			if(count($arr2)==2)
        				$this->foto = trim($arr2[1]);
        				
        			$this->currentItem->author = $this->currentItem->author_alias. " (Foto: ".$this->foto.")"; 
        			
        			//$this->parser_state=3;
        			
        			//self::Log($matches[0]);
        			//self::Log($fc->innertext);
        		}
        	}
        	if($this->parser_state==4){
        	//text
        	self::Log($item);
        		foreach ($item->children as $ch) {
        			$ch->class=null;
        			$ch->style=null;
        		}
        		$this->currentItem->fulltext.=$item;
        		
        		$this->beforeInsert($this->currentItem);
				
        		//shrani če že ne obstaja
        		if ($this->exists($item)){ // če že obstaja ga ne gledamo več
						$this->counter_existing++;
				}else{
					$this->currentItem->global_id=$this->stran_model->home_url.'/'.$this->currentItem->created.$this->currentItem->title;
					$this->currentItem->vir_url=$this->stran_model->home_url;
					
					if($this->currentItem->save(false)){
						$this->counter_imported++;
					}else{
						$this->counter_import_error++;
					}
				}
	        		
	        	
        	}
        	
        	
		
        }
        
        /**
         * 
         * odpre in prebere rss vir
         */
        public function readSource(){
        	
	        try{ 
	        		$string = file_get_contents($this->stran_model->url);
	        		$string = iconv('windows-1250','UTF-8', $string);
	                $this->html=str_get_html($string);
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
        
  
	protected function exists(& $item){ 
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					array('global_id'=>$this->stran_model->home_url.'/'.$this->currentItem->created.$this->currentItem->title)  //values
					);
	  }
        
}