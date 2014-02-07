<?php
class FeedController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	private $feed;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('feed'),
				'users'=>array('*'),
			),
		);
	}
	
	public function actionVsebine(){
	//naloži zend class za generacijo rss
		//add zend folder to the include path and save the old one
	    /*$oldPath=set_include_path(($path=Yii::import('application.vendors.*')).PATH_SEPARATOR.get_include_path());
		//include zend_loader
        require_once $path.DIRECTORY_SEPARATOR.'Zend'.DIRECTORY_SEPARATOR.'Loader.php';
        //load zend_feed class
        Zend_Loader::loadClass('Zend_Feed');*/
		
		
		
		if(isset($_GET['portal']))
		{
			$portal=Portali::model()->findByAttributes(array('domena'=>$_GET['portal']));
			if(!isset($portal))
				die("Portal ne obstaja");
			$vsebine=array();
			$prestej=0;
			
			if(isset($_GET['vs'])){
				$vsebine=Vsebine::model()->najdiVsebinoNaPortalu($portal->id, $_GET['vs']);
				$prestej=1;
			}else{	
				$limit=Yii::app()->request->getQuery('limit', 10);
				$offset=Yii::app()->request->getQuery('offset', 0);
				
				if ($limit>0){ //ce je limit = 0 sploh ne gremo iskati vsebin na bazo
					$vsebine=Vsebine::model()->najdiZaPortal($portal->id, $offset, $limit);
					$prestej=Vsebine::model()->prestejZaPortal($portal->id);
				}
			}
			//if(count($vsebine)){
			
			    Yii::import('ext.feed.*');
		 
		 
				$this->feed = new EFeed();
				 
				$this->feed->title= 'Novicomat';
				$this->feed->description = 'Vsebine iz Novicomata';
				 
				//$this->feed->setImage('Testing RSS 2.0 EFeed class','http://www.ramirezcobos.com/rss',
				//'http://www.yiiframework.com/forum/uploads/profile/photo-7106.jpg');
				 
				$this->feed->addChannelTag('language', 'sl-si');
				$this->feed->addChannelTag('pubDate', date(DATE_RSS, time()));
				$this->feed->addChannelTag('link', $this->createAbsoluteUrl('vsebine/index'));
				 
				// * self reference
				$this->feed->addChannelTag('atom:link',$this->createAbsoluteUrl('feed/vsebine'));
				
				$this->feed->addChannelTag('count',$prestej);
				
		//		$vsebine=Vsebine::model()->findAll(array(
		//	        'order'=>'publish_up DESC',
		//	        'limit'=>20,
		//	    ));
				
			    foreach($vsebine as $vsebina)
			    {
			    	$item = $this->feed->createNewItem();
			       	$item->title = $vsebina->title;
					$item->link  = $this->createAbsoluteUrl('vsebine/view',array('id'=>$vsebina->id));
					// we can also insert well formatted date strings
					$item->date = $vsebina->publish_up;
					$item->description = $vsebina->SummaryHTML;
					if(isset($_GET['vs']))				
						$item->addTag('content:encoded', $vsebina->getFullContentHTML("lightbox-slike"));
					 
					$item->addTag('author', $vsebina->author_alias);
					$item->addTag('guid', $this->createAbsoluteUrl('vsebine/view',array('id'=>$vsebina->id)),array('isPermaLink'=>'true'));
					$item->addTag('id',$vsebina->id);
					$this->feed->addItem($item);
			    }		 
			    
			    $dogodkov=Yii::app()->request->getQuery('dogodkov', 0); //$_GET['dogodki']
			    if($dogodkov){  //dodaj se n zadnijh dogodkov
			    		$this->addEvents($portal);
			    	
			    	
			    }
				
				$this->feed->generateFeed();
				Yii::app()->end();
			
			//}
		}
	}
	
	function actionDogodki(){
		if(isset($_GET['portal']))
		{
			$portal=Portali::model()->findByAttributes(array('domena'=>$_GET['portal']));
			if(!isset($portal))
				die("Portal ne obstaja");
			$prestej=0;
			
			    Yii::import('ext.feed.*');
				$this->feed = new EFeed();
				$this->feed->title= 'Novicomat';
				$this->feed->description = 'Dogodki iz Novicomata';
				//$this->feed->setImage('Testing RSS 2.0 EFeed class','http://www.ramirezcobos.com/rss',
				//'http://www.yiiframework.com/forum/uploads/profile/photo-7106.jpg');
				 
				$this->feed->addChannelTag('language', 'sl-si');
				$this->feed->addChannelTag('pubDate', date(DATE_RSS, time()));
				$this->feed->addChannelTag('link', $this->createAbsoluteUrl('vsebine/index'));
				 
				// * self reference
				$this->feed->addChannelTag('atom:link',$this->createAbsoluteUrl('feed/dogodki'));
				
				//$this->feed->addChannelTag('count',$prestej);
				
				$this->addEvents($portal);
				
				$this->feed->generateFeed();
				Yii::app()->end();
		}
	}
	
		
	function addEvents($portal){
		$dogodkov=Yii::app()->request->getQuery('dogodkov', 10); //limit - $_GET['dogodki']
		$od = $dogodki=Yii::app()->request->getQuery('od', false);
    	$do = $dogodki=Yii::app()->request->getQuery('do', false);
    	$doffset = Yii::app()->request->getQuery('doffset', 0);
    	$dogodki=Koledar::model()->najdiDogodkeNaPortalu($portal->id, $doffset, $dogodkov, $od, $do);
    	$events=array();
    	foreach ($dogodki as $dogodek){
//			    		Yii::trace('foreach dogodek', 'FeedController.actionVsebine()');
//			    		$events['event']=array(
//			    			
//			    			'naslov'=>$dogodek->naslov,
//			    			'id'=>$dogodek->id,
//			    			'id_vsebine'=>$dogodek->id_vsebine,
//			    			'zacetek'=>$dogodek->zacetek,
//			    			'konec'=>$dogodek->konec,
//			    			'lokacija'=>$dogodek->lokacija,
//			    		);
			    		//$this->feed->addChannelTagsArray($dogodek);
	    	$item = $this->feed->createNewItem();
	    	$item->title = $dogodek->naslov;
	    	$item->addTag('id', $dogodek->id);
	    	$item->addTag('id_vsebine', $dogodek->id_vsebine);
	    	$item->addTag('start', ZDate::translateFormat_php($dogodek->zacetek, DATE_RSS));
	    	$item->addTag('end', ZDate::translateFormat_php($dogodek->konec, DATE_RSS));
	    	$item->addTag('location', $dogodek->lokacija);
	    	$this->feed->addItem($item);
		}
	}
	
}