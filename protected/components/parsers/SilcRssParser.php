<?php

class SilcRssParser extends RssParser {
		
		private $dogodek;
	
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
			$dogodek = new Koledar();
			
			//vir
			if($item->title()) $vsebina->title = $item->title(); //naslov
			if($item->link())$vsebina->vir_url = $item->link(); //link
			if($item->pubDate())$vsebina->created = date('Y-m-d H:i:s', strtotime($item->pubDate())); //datum objave originalne vsebine
			
			if($item->description()){
				$html = str_get_html($item->description());		
					if (is_object($html)){
						$html->find('a.read_more', 0)->outertext="";	
						
						if($html->find('tr.ec3_month td', 0)){
							$this->dogodek=true;
							$mesec=ZDate::stMeseca($html->find('tr.ec3_month td', 0)->innertext);
							$dan = $html->find('tr.ec3_day td', 0)->innertext;
							$ura = $html->find('tr.ec3_time td', 0)->innertext;
							$leto=$this->smiselnoLeto($item->pubDate(), $mesec);
							
							$dogodek->zacetek=$dan.'.'.$mesec.'.'.$leto.' '.$ura;
							$dogodek->naslov=$vsebina->title;
							$vsebina->frontpage=0;
							
							$html->find('div.ec3_iconlet', 0)->outertext="";
							$html->find('p', 0)->outertext="";
							
							//self::Log($dogodek->zacetek, $vsebina);
						}else $this->dogodek=false;
						
						$vsebina->text= strip_tags($html);
					}
			
			};
			if($item->guid())$vsebina->global_id = $item->guid(); //globalni id
			
			if($item->author())$vsebina->author = $item->author(); //avtor
			if($item->content()){ //vsebina
				$html = str_get_html($item->content());		
					if (is_object($html)){
						
						foreach($html->find('script') as $script){
							$script->outertext="";
						}
						foreach($html->find('div') as $div){
							if(trim($div->innertext)=="") $div->outertext="";
						}
						foreach($html->find('li[id=wp_thumbie_li]') as $li){
							$li->outertext="";
						}
						foreach($html->find('ul') as $ul){
							if(!$ul->children) $ul->uotertext="";
						}
						$html->find('h3.related_post_title', 0)->outertext="";
						
						$html->find('div.ec3_iconlet', 0)->outertext="";
						//self::Log($html, $vsebina);
						$vsebina->fulltext = $html;
					}
					else{
						self::Log("html objekt ni bil ustvarjen", $vsebina);
					}
			
			}
			
			$vsebina->show_intro=0;
			//interne vrednosti
			$this->beforeInsert($vsebina);
			
			if($vsebina->save(false)){
				if($this->dogodek){
					$dogodek->id_vsebine=$vsebina->getPrimaryKey();
					$dogodek->save(false);
				}
				
				$this->counter_imported++;
			}else{
				$this->counter_import_error++;
			} 
        }
        
        private function smiselnoLeto($pubDate, $mesec){
        	
        	if(intval($mesec) < 5 && date('n', strtotime($pubdate)) > 9){
        		return date('Y', strtotime($pubDate))+1;
        	}else return date('Y', strtotime($pubDate));
        }

        
}