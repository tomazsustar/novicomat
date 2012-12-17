<?php

/**
 * 
 * Odpre rss, za vsebino pa odpre članek z get parametrom tmpl=component, kar povzroči, da se
 * odpre samo članek. Nato iz njega prebere vsebino.
 * Parser je primeren za joomline strani, katere v rss-ju nimajo celotne vsebine(npr: teksta, slik, ipd). 
 * Parser tudi odstrani nepotrebne dive
 *  
 * @author root
 *
 */
class ZeleniValParser extends RssParser{
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
			if($item->guid())$vsebina->global_id = $item->guid(); //globalni id
			if($item->pubDate())$vsebina->created = date('Y-m-d H:i:s', strtotime($item->pubDate())); //datum objave originalne vsebine
			if($item->author())$vsebina->author = $item->author(); //avtor
        	if($item->description()){ 
        		$vsebina->fulltext = strip_tags($item->description(), '<em><br><p><a><strong><ul><li><img>');
        		$vsebina->fulltext = str_replace('{rokbox}', '<img src="', $vsebina->fulltext);
        		$vsebina->fulltext = str_replace('{/rokbox}', '" style="float:left;width:150px;" />', $vsebina->fulltext);
        	}
			if($item->link()){
				$vsebina->vir_url = $item->link(); //link
				$append='';
				if(strstr($vsebina->vir_url, '?'))	$append='&tmpl=component'; //če je v urlju že '?' 
				else $append='?tmpl=component';
				
				self::Log("odpiram: ".$vsebina->vir_url.$append, $vsebina);
				// Create a DOM object from a URL
				$html = file_get_html($vsebina->vir_url.$append);
				if(is_object($html)){
					    $html->find('h2[class=contentheading]', 0)->outertext=""; //odstrani naslov
					    $html->find('div[class=buttonheading]', 0)->outertext=""; //odstrani knofe
					    $html->find('p[class=articleinfo]', 0)->outertext=""; //odstrani šodr
					    foreach ($html->find('div[class=jv-social-share-button-contain]') as $div) {
					    	$div->outertext="";
					    }
					    
//					    //potegni ven slike
//					    $first_image="";
//					    $rest = ""		;		    
//					    $is_first = true;
//					    foreach ($html->find('img') as $e) {
//					    		//prvi sliki dodaj float left
//					    		if ($is_first){
//					    			$e->style='float:left;';
//					    			$first_image = (string) $e;
//					    		}
//					    		$rest.= (string) $e;
//					    		
//					    		//pobiši slike, ker jih potem dodamo nazaj, sicer so lahko podvojene
//						    	$e->outertext="";
//						    	$is_first=false;
//						    }
//					    
//					    //odstrani bedne dive od phoca gallery
//						foreach ($html->find('div[class=phocagallery]') as $div) {
//					    	$div->outertext="";
//					    }
//					    					    
//						 
//					    //daj slike nazaj v vsebino
//						$vsebina->text = $first_image.$html->find('div[class=rt-article]', 0)->innertext.$rest;

					    $vsebina->fulltext.= $html->find('div[class=main-article]', 0)->innertext;

						
						self::Log("Prebrano. "/*.$vsebina->text*/ ,$vsebina);
				}else self::Log("html objekt ni bil ustvarjen", $vsebina);
					
			}
			
			
			
        	//if($item->description()){ $vsebina->text = /*$item->description();}*/ str_replace(array('{','}'), '', $item->description());}
			
			
				
			
			//interne vrednosti
			$this->beforeInsert($vsebina);
			//shrani
			if($vsebina->save(false)){
				$this->counter_imported++;
			}else{
				$this->counter_import_error++;
			} 
        }
}