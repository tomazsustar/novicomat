<?php

class RssParser extends Parser {
	
	var $feed = array();
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
		     
				// Loop over each channel item and store relevant data
				foreach ($this->feed as $item) {
					$this->loop($item);
						
				}			   
			}
			//print_r($channel);
	           
	      	$this->afterProcess();
	           
	   }
       
        
        /**
         * 
         * se kliče v vzanki za vsako vsebino
         * @param $item
         */        
        public function loop(& $item){
        	$this->counter_processed++;
			if ($this->exists($item)){ // če že obstaja ga ne gledamo več
				$this->counter_existing++;
				return;
			} 
			$vsebina = new Vsebine();
			
			//vir
			if($item->title()) $vsebina->title = $item->title(); //naslov
			if($item->link())$vsebina->vir_url = $item->link(); //link
			if($item->description()){ $vsebina->text = $item->description();} //r_replace(array('{','}'), '', $item->description());}
			if($item->guid())$vsebina->global_id = $item->guid(); //globalni id
			if($item->pubDate())$vsebina->created = date('Y-m-d H:i:s', strtotime($item->pubDate())); //datum objave originalne vsebine
			if($item->author())$vsebina->author = $item->author(); //avtor
			if($item->content())$vsebina->fulltext = $item->content(); //vsebina
			
			//interne vrednosti
			$this->beforeInsert($vsebina);
			
			if($vsebina->save(false)){
				$this->counter_imported++;
			}else{
				$this->counter_import_error++;
			} 
        }
        
        /**
         * 
         * odpre in prebere rss vir
         */
        public function readSource(){
        	//add zend folder to the include path and save the old one
	        $this->oldPath=set_include_path(($path=Yii::import('application.vendors.*')).PATH_SEPARATOR.get_include_path());
	        //include zend_loader
	        require_once $path.DIRECTORY_SEPARATOR.'Zend'.DIRECTORY_SEPARATOR.'Loader.php';
	        //load zend_feed class
	        Zend_Loader::loadClass('Zend_Feed');
	        //read the feed, try/catch will prevent it from throw an exception
	        try{ 
	                $this->feed=Zend_Feed::import($this->stran_model->url);
	                //preveri, če se je stran spremenila
	                $this->trenutni_hash = md5($this->feed->saveXML());
	                
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
        
        /**
         * operacije po končanjem uvozu
         * @see protected/components/parsers/Parser::afterProcess()
         */
        public function afterProcess(){
        	//after you use zend classes, remove zend from included paths to increase perfomance
	        set_include_path($this->oldPath);
	             
	        parent::afterProcess();
        }
        
        /**
         * 
         * Preveri, če ta vsebina že obstaja v bazi
         * @param unknown_type $item
         */
       
	protected function exists(& $item){
        	return Vsebine::model()->exists(
        			'global_id=:global_id', //condition
					array('global_id'=>$item->guid())  //values
					);
	  }
        
}