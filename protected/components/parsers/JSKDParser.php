<?php



/**
 * 
 * Enter description here ...
 * @property simple_html_dom $html
 * @property Vsebine $currentItem
 * @author root
 *
 */

class JSKDParser extends Parser {
	
	var $html = array();
	
	var $currentItem;  
	var $foto="";
	var $parser_state = 0; //1-začni parsati, 2-naslov najden
	
        /**
         * Shows the statistics of resources used by application
         * @param boolean $return defines if the result should be returned or send to output
         * @return string
         */
		
	   public function __construct($stran_model){
	   		$this->stran_model=$stran_model; // nastavi globalno spremenljivko
	   		parent::__construct();
	   }
	   
	
	public function import(){        
		    	
		    	ini_set('display_errors',1); 
 				error_reporting(E_ALL);
		    	//echo "AAA!";	
		    $this->readSource();
		     
			if($this->trenutni_hash!="" &&  $this->trenutni_hash == $this->stran_model->last_update_hash){
				self::Log("Stran se ni spremenila");
				$this->msg = "Stran se ni spremenila";
				
			}else{
				//$arr=preg_split('/<br[\s\/]*>/i', $this->preprocess());
				$arr=explode('<br>', $this->preprocess());
				self::Log(print_r($arr, true));
				foreach ($arr as $item) {
					$this->loop($item);
				}
				//shrani še zadnjega
				$this->saveCurrentItem();
			}
	           
	      	$this->afterProcess();
	           
	   }
       
        
        /**
         * 
         * se kliče v vzanki za vsako vsebino
         * @param simple_html_dom_node $item
         */        
        public function loop(& $item){
        	$item=trim($item);
        	if($item==""){
        		return;
        	}
        	if($this->parser_state==1 && $this->isTitle($item)){ // najdi prvi naslov
        		$this->counter_processed++;
        		$this->currentItem = new Vsebine();
        		$this->currentItem->title = strip_tags($item);
        		$this->parser_state=2;
        		$this->Log($this->currentItem->title);
        	}elseif($this->parser_state==2){ //za prvim naslovom mora biti text
        		$this->currentItem->introtext = $item;
        		$this->parser_state=3;
        	}elseif($this->parser_state==3){ // za tekstom je lahko naslov ali pa spet text. 
        		if($this->isTitle($item)){ //Če je naslov shranimo prejšnjega in odpremo novo vsebino
        			$this->counter_processed++;
        			$this->saveCurrentItem();
        			$this->currentItem = new Vsebine();
	        		$this->currentItem->title = strip_tags($item);
	        		$this->parser_state=2;
        		}
        		else{ //če ni potem vsebino pripnemo tekstu
        			$this->currentItem->introtext.="<br>".$item;
        		}
        		
        	}
	
        }
        
        private function saveCurrentItem(){
        	if(!isset($this->currentItem))return;
        	
        	//shrani če že ne obstaja
        	if ($this->exists($this->currentItem)){ // če že obstaja ga ne gledamo več
					$this->counter_existing++;
			}else{
				
        		$this->currentItem->created=ZDate::dbNow();	
				$this->currentItem->global_id=$this->stran_model->home_url.'/'.$this->currentItem->title;
				$this->currentItem->vir_url=$this->stran_model->home_url;
				
				$this->beforeInsert($this->currentItem);
				if($this->currentItem->save(false)){
					$this->counter_imported++;
				}else{
					$this->counter_import_error++;
				}
			}
        }
        
        private function isTitle($item){
        	$out = false;
        	if(
        		strpos(substr($item, 0, 10), "<b>")!==false && //če poboldan
        		strlen($item) < 120 //če je krajši kot 120 
        	){
        		$out = true;
        	}
        	return $out;
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
	                //echo $this->html;
	                //preveri, če se je stran spremenila
	                $this->trenutni_hash = md5($string);
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
        
    protected function preprocess(){
    	 $s1= 'div[id=rte_holder_3698933]';
    	 //najdi začetek
	     foreach ($this->html->find($s1,0)->children as $item) {
	     	//self::Log($this->parser_state);
	     	
		     	if ($this->parser_state==0) { // najdi "Vabimo" nato šele začni s parsanjem
	        		if ($child=$item->firstChild()) {
	        			if($child->class=="heading1"){
	        				if(strpos($child->innertext, "Vabimo")!==false){
	        					self::Log($child->innertext);
	        					$item->nextSibling()->outertext="{start}"; //označimo začetek
	        					$this->parser_state=1;
	        					break;
	        				}
	        			}
	        		}
	        	}
	     } 
	     
   		  //odstrani velike naslove
    	foreach ($this->html->find($s1,0)->find('font[class=heading1], script') as $item) {
	     	$item->outertext="";
	     }
//	     //označi začetke vseh divovo in p-jev
	     foreach ($this->html->find($s1,0)->find('div,p') as $item) {
	     	$item->outertext="<br>".$item->outertext;
	     }
	     
	     $this->html->find($s1,0)->innertext=strip_tags($this->html->find($s1,0),'<br><b><a><i><strong><img><em>');
	    
	     $arr2=explode("{start}", $this->html->find($s1,0));
	     
	     //echo $arr[1];
	     return $arr2[1];
    }
  
	protected function exists(& $item){ 
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					array('global_id'=>$this->stran_model->home_url.'/'.$this->currentItem->title)  //values
					);
	  }
        
}