<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
/**
	 * 
	 * Enter description here ...
	 * @param Vsebine $vsebina
	 */
	protected function izvoziVsebino(&$vsebina){
		
		//zastavice
		$is_content = true;
		$is_event = false;
		$content_saved =false;
		$event_saved=false;	
		
//		if(isset($vsebina->publish_up)) $is_content = true;
		if($vsebina->koledar) $is_event = true;
		$content = new Content();
		$event = new JeventsVevent();
		$evdet = new JeventsVevdetail(); 
		$izvoz = new Izvoz();
		
		if($is_content){ // vpiši med članke
			$content->mapVsebine($vsebina); // prepiši vrednosti v joomlino tabelo
			if($content->save(false)){ //shrani
				$content_saved=true;
				if($vsebina->frontpage){
					//prva stran
					$fp = new ContentFrontpage();
					$fp->content_id = $content->getPrimaryKey();
					$fp->save(false);
				}
				$izvoz->je_clanek = 1;					
				$izvoz->id_clanka_izvoz = $content->getPrimaryKey(); //poveži izhodno tabelo z glavno				
			}
		}
		foreach($vsebina->dogodki as $dogodek){
		//if($is_event){  // vpiši v koledar
			 //najprej uredimo detaile
			//$evdet->mapVsebine($vsebina);
			$evdet->mapVsebine($dogodek, $vsebina);
			if ($evdet->save(false)){ //če so detajli shranjeni shranimo še dogodek
				$event->mapVsebine($vsebina);
				$event->detail_id = $evdet->getPrimaryKey(); //povežemo z detajli
				if($event->save(false)){
					$rrule = new JeventsRrule(); // potreben je še zapis v rrule, sicer se dogodki nočejo prikazovati
					$rrule->setDefaultValues();
					$rrule->eventid = $event->getPrimaryKey();
					if($rrule->save(false)){
						// to pa še ni vse kot kaže je treba narediti zapis tudi v jevents_repetition
						$repetition = new JeventsRepetition();
						$repetition->eventid=$event->getPrimaryKey();
						$repetition->eventdetail_id=$evdet->getPrimaryKey();
						$repetition->duplicatecheck=md5($event->getPrimaryKey().$evdet->dtstart);
						$repetition->startrepeat=$vsebina->start_date;
						$repetition->endrepeat=date(ZDate::DB_DATETIME_FORMAT_PHP, $evdet->dtend);
						if($repetition->save(false)){
												
							$event_saved=true;
							$izvoz->je_dogodek  = 1;
							$izvoz->id_dogodka_izvoz = $event->getPrimaryKey(); //poveži izhodno tabelo z glavno
						}
					}
					
				}
			}
		}
		
		// na koncu še povežemo dogodek in novico
		if($content_saved && $event_saved){
			$agenda = new JevAgendaminutes();
			$agenda->evdet_id = $evdet->getPrimaryKey();
			$agenda->agenda_id = $content->getPrimaryKey();
			$agenda->save(false);
		}
		
		if($content_saved || $event_saved){ //posodobi status in shrani še v tabelo izvoz
			$izvoz->id_vsebine = $vsebina->id;
			$izvoz->cilj='zelnik';
			if($izvoz->save(false)){
					//echo "JAAA!<br>";
			}
			
			$vsebina->state = 2;  // posodobi staus na glavni tabeli: 2-prenešen
			if($vsebina->update(array('state'))){
					//echo "JAAA!<br>";
			}			
		}									
	}
}
