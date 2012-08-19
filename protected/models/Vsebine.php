<?php

/**
 * This is the model class for table "vsebine".
 *
 * The followings are the available columns in table 'vsebine':
 * @property integer $id
 * @property string $title
 * @property string $introtext
 * @property string $fulltext
 * @property integer $state
 * @property integer $sectionid
 * @property integer $catid
 * @property string $author
 * @property string $created
 * @property string $imported
 * @property integer $checked_out
 * @property string $checked_out_time
 * @property string $edited
 * @property integer $edited_by
 * @property string $publish_up
 * @property string $publish_down
 * @property string $tags
 * @property integer $site_id
 * @property string $start_date
 * @property string $end_date
 * @property string $import_checksum
 * @property integer $original_changed
 * @property string $export_checksum
 * @property string $global_id
 * @property string $params
 * @property string $vir_url
 * @property string $lokacija
 */
class Vsebine extends CActiveRecord
{
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vsebine the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{vsebine}}';
	}
	
	public function getText()
	{
		$return = $this->introtext;
		if( $this->fulltext != "") $return.=' <hr id="system-readmore" /> '.$this->fulltext;
		return $return;
	}
	
	public function setText($value)
	{
		//echo 'AAAAAAAAAAAAAAAAAAAaa';
		// če najde readmore, razdeli na dva dela
		$arr = explode('<hr id="system-readmore" />', $value, 2); //besedilo	
		$this->introtext = $arr[0];
		if(count($arr)==2) $this->fulltext = $arr[1];
		else $this->fulltext ="";
	}
	
	public function getShow_intro()
	{
		$params = new ZParams($this->params);
		if(trim($params->show_intro)=="")
				return 1;
		else 
			return $params->show_intro;
	}
	
	public function setShow_intro($value)
	{
		$params = new ZParams($this->params);
		$params->show_intro = $value;
		$this->params=$params;
	}
	
	public function getVirLink(){
		if(isset($this->stran)){
			return '<a href="'.$this->vir_url.'" target="_blank">'.$this->stran->vir_text.'</a>';
		}
		else return "Članek ni uvožen";	
	}
	
	public function behaviors()
	{
	    return array('datetimeDBBehavior' => array('class' => 'ext.DateTimeDBBehavior')); // 'ext' is in Yii 1.0.8 version. For early versions, use 'application.extensions' instead.
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('title, introtext, fulltext, state, sectionid, catid, author, created, imported, checked_out, checked_out_time, edited, edited_by, publish_up, publish_down, tags, site_id, start_date, end_date, import_checksum, original_changed, export_checksum, global_id, params, vir_url', 'required'),
			
			array('publish_up, publish_down, start_date, end_date','dateOrTime'),
			array('publish_down','later', 'then'=>'publish_up'),
			array('end_date','later', 'then'=>'start_date'),
			array('title, text', 'required'),
			array('sectionid, catid', 'requiredIf', 'isset'=>'publish_up'),
			array('event_cat, lokacija', 'requiredIf', 'isset'=>'start_date'),
			array('publish_up', 'requiredIf', 'notset'=>'start_date'),
			array('tags', 'safe'),
			array('created', 'default', 'value'=>ZDate::dbNow(), 'setOnEmpty'=>true, 'on'=>'insert'),
			array('event_cat,state', 'default', 'value'=>0, 'setOnEmpty'=>true, 'on'=>'insert'),
			
			
			array('state, sectionid, catid, checked_out, edited_by, site_id, original_changed, event_cat, show_intro', 'numerical', 'integerOnly'=>true),
			array('author, author_alias, global_id', 'length', 'max'=>256),
			array('import_checksum, export_checksum', 'length', 'max'=>32),
			
			//array('start_date', 'date','format'=>'dd.MM.yyyy H:m'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, introtext, fulltext, state, sectionid, catid, author, created, imported, checked_out, checked_out_time, edited, edited_by, publish_up, publish_down, tags, site_id, start_date, end_date, import_checksum, original_changed, export_checksum, global_id, params, vir_url, stran.naslov', 'safe', 'on'=>'search'),
		);
	}
	
	// dovoli dva različna formata
	public function dateOrTime($attribute, $params = array()){
		if(!trim($this->$attribute)==""){ //če je prazen ga ne glej
			$validator = CValidator::createValidator('date', $this, $attribute, array('format'=>ZDate::FORM_DATE_FORMAT_YII));
			$validator->validate($this);
			$validator = CValidator::createValidator('date', $this, $attribute, array('format'=>ZDate::FORM_DATETIME_FORMAT_YII));
			$validator->validate($this);
			if(count($this->getErrors($attribute))!=2){ //če je prišel vsaj skozi en validator
				$this->clearErrors($attribute);
			}
			else{
				$this->clearErrors($attribute);
				$this->addError($attribute, $this->getAttributeLabel($attribute)." je napačnega formata.");
			}
		}
		
	}
	
	// zahtevaj če je vnešen publish _up
	public function requiredIf($attribute, $params = array()){
		//echo $attribute;
		if(key_exists('isset', $params)){
			if(trim($this->$params['isset'])!=""){
				$val = CValidator::createValidator('required', $this, $attribute);
				$val->validate($this);
			}
		}
		if(key_exists('notset', $params)){
			if(trim($this->$params['notset'])==""){
				$message = 'Vsaj en izmed '.$this->getAttributeLabel($attribute).' ali '.$this->getAttributeLabel($this->$params['notset']). ' mora biti vnešen.';
				$val = CValidator::createValidator('required', $this, $attribute, array('message'=>$message));
				$val = CValidator::createValidator('required', $this, $this->$params['notset'], array('message'=>$message));
				$val->validate($this);
			}
		}
		
	}
	
	//preveri, da je en datum ksnejši od drugega
	public function later($attribute, $params = array()){
		//echo strtotime($this->$params['compareTo']) > strtotime($this->$attribute);
		if(trim($this->$attribute)!=""){
			if(strtotime($this->$params['then']) > strtotime($this->$attribute)){
				$this->addError($attribute, $this->getAttributeLabel($attribute)." mora biti kasnejši od ".$this->getAttributeLabel($params['then']).".");
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'stran' => array(self::BELONGS_TO, 'Strani', 'site_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'introtext' => 'Introtext',
			'fulltext' => 'Fulltext',
			'state' => 'State',
			'sectionid' => 'Sectionid',
			'catid' => 'Catid',
			'author' => 'Avtor izvirnika',
			'author_alias' => 'Avtor',
			'created' => 'Created',
			'imported' => 'Imported',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'edited' => 'Edited',
			'edited_by' => 'Edited By',
			'publish_up' => 'Publish Up',
			'publish_down' => 'Publish Down',
			'tags' => 'Tags',
			'site_id' => 'Site',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'import_checksum' => 'Import Checksum',
			'original_changed' => 'Original Changed',
			'export_checksum' => 'Export Checksum',
			'global_id' => 'Global',
			'params' => 'Params',
			'vir_url' => 'Vir Url',
			'stran' => 'Vir',
			'stran.naslov'=>'Vir',
			'text' => 'Besedilo',
			'frontpage'=>'Prva stran',
			'event_cat' => 'Kategorija v koledarju',
			'show_intro' => 'Pokaži uvod',
			'Lokacija' => 'lokacija',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('introtext',$this->introtext,true);
		$criteria->compare('fulltext',$this->fulltext,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('sectionid',$this->sectionid);
		$criteria->compare('catid',$this->catid);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('imported',$this->imported,true);
		$criteria->compare('checked_out',$this->checked_out);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('edited',$this->edited,true);
		$criteria->compare('edited_by',$this->edited_by);
		$criteria->compare('publish_up',$this->publish_up,true);
		$criteria->compare('publish_down',$this->publish_down,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('site_id',$this->site_id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('import_checksum',$this->import_checksum,true);
		$criteria->compare('original_changed',$this->original_changed);
		$criteria->compare('export_checksum',$this->export_checksum,true);
		$criteria->compare('global_id',$this->global_id,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('vir_url',$this->vir_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getNextID(){
		$c = new CDbCriteria; 
		$c->order="created ASC";
		$c->limit=1;
		$c->offset=-1;
		$c->condition='state=0';
		if($result=$this->find($c))
			return $result->id;
		else return false;
	}
	
//	protected function beforeSave(){
//    if (!parent::beforeSave()) return false;
//    ....your code
//	}
	
	public function onAfterSave($event){
		// posodobi seznam ključnih besed
		$non_existing_tags = Tags::model()->findNonExistingTags($this->tags);
		//die(print_r($non_existing_tags, true));
		foreach ($non_existing_tags as $tag){
			echo $tag;
			$model= new Tags;
			$model->tag=$tag;
			$model->save(false);
		}		
		parent::onAfterSave($event);
	}
	
}