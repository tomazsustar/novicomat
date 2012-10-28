<?php

/**
 * This is the model class for table "jos_jevents_vevdetail".
 *
 * The followings are the available columns in table 'jos_jevents_vevdetail':
 * @property integer $evdet_id
 * @property string $rawdata
 * @property integer $dtstart
 * @property string $dtstartraw
 * @property integer $duration
 * @property string $durationraw
 * @property integer $dtend
 * @property string $dtendraw
 * @property string $dtstamp
 * @property string $class
 * @property string $categories
 * @property string $color
 * @property string $description
 * @property double $geolon
 * @property double $geolat
 * @property string $location
 * @property integer $priority
 * @property string $status
 * @property string $summary
 * @property string $contact
 * @property string $organizer
 * @property string $url
 * @property string $extra_info
 * @property string $created
 * @property integer $sequence
 * @property integer $state
 * @property string $modified
 * @property integer $multiday
 * @property integer $hits
 * @property integer $noendtime
 */
class JeventsVevdetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JeventsVevdetail the static model class
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
		return 'jos_jevents_vevdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rawdata, description, summary, url', 'required'),
			array('dtstart, duration, dtend, priority, sequence, state, multiday, hits, noendtime', 'numerical', 'integerOnly'=>true),
			array('geolon, geolat', 'numerical'),
			array('dtstartraw, durationraw, dtendraw, dtstamp, created', 'length', 'max'=>30),
			array('class', 'length', 'max'=>10),
			array('categories, location, contact, organizer', 'length', 'max'=>120),
			array('color, status', 'length', 'max'=>20),
			array('extra_info', 'length', 'max'=>240),
			array('modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('evdet_id, rawdata, dtstart, dtstartraw, duration, durationraw, dtend, dtendraw, dtstamp, class, categories, color, description, geolon, geolat, location, priority, status, summary, contact, organizer, url, extra_info, created, sequence, state, modified, multiday, hits, noendtime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'evdet_id' => 'Evdet',
			'rawdata' => 'Rawdata',
			'dtstart' => 'Dtstart',
			'dtstartraw' => 'Dtstartraw',
			'duration' => 'Duration',
			'durationraw' => 'Durationraw',
			'dtend' => 'Dtend',
			'dtendraw' => 'Dtendraw',
			'dtstamp' => 'Dtstamp',
			'class' => 'Class',
			'categories' => 'Categories',
			'color' => 'Color',
			'description' => 'Description',
			'geolon' => 'Geolon',
			'geolat' => 'Geolat',
			'location' => 'Location',
			'priority' => 'Priority',
			'status' => 'Status',
			'summary' => 'Summary',
			'contact' => 'Contact',
			'organizer' => 'Organizer',
			'url' => 'Url',
			'extra_info' => 'Extra Info',
			'created' => 'Created',
			'sequence' => 'Sequence',
			'state' => 'State',
			'modified' => 'Modified',
			'multiday' => 'Multiday',
			'hits' => 'Hits',
			'noendtime' => 'Noendtime',
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

		$criteria->compare('evdet_id',$this->evdet_id);
		$criteria->compare('rawdata',$this->rawdata,true);
		$criteria->compare('dtstart',$this->dtstart);
		$criteria->compare('dtstartraw',$this->dtstartraw,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('durationraw',$this->durationraw,true);
		$criteria->compare('dtend',$this->dtend);
		$criteria->compare('dtendraw',$this->dtendraw,true);
		$criteria->compare('dtstamp',$this->dtstamp,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('categories',$this->categories,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('geolon',$this->geolon);
		$criteria->compare('geolat',$this->geolat);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('organizer',$this->organizer,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('extra_info',$this->extra_info,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('sequence',$this->sequence);
		$criteria->compare('state',$this->state);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('multiday',$this->multiday);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('noendtime',$this->noendtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param Vsebine $vsebina
	 */
	public function mapVsebine(&$vsebina){
		$this->rawdata='';
		$this->dtstart = strtotime($vsebina->start_date);
		$this->dtstartraw='';
		$this->duration=0;
		$this->durationraw='';
		if(isset($vsebina->end_date))$this->dtend = strtotime($vsebina->end_date);
		else $this->dtend = strtotime(ZDate::setTime($vsebina->start_date, '23:59:59'));
		$this->dtendraw='';
		$this->dtstamp ='';
		$this->class='';
		$this->categories='';
		$this->color='';
		//if(isset($vsebina->publish_up)) $this->description ='';
		//else $this->description = $vsebina->text;
		$this->description = $vsebina->text;
		$this->geolon=0;
		$this->geolat=0;
		$this->location=$vsebina->lokacija;
		$this->priority=0;
		$this->status='';
		$this->summary = $vsebina->koledar_naslov;
		$this->contact = '';
		$this->organizer = '';
		$this->url = '';
		$this->extra_info = '';
		$this->created='';
		$this->sequence=0;
		$this->state=1; //published
		$this->multiday=1;
		$this->hits=0;
		if(isset($vsebina->end_date) || ZDate::getTime($vsebina->start_date)=='00:00:00') $this->noendtime=0;
		else $this->noendtime=1;
		$this->modified=ZDate::dbDateTime_php(time()); // zdaj
	}
	public function mapKoledar(&$dogodek, &$vsebina){
		$this->rawdata='';
		$this->dtstart = strtotime(ZDate::dbDateTime_php($dogodek->zacetek));
		$this->dtstartraw='';
		$this->duration=0;
		$this->durationraw='';
		if(isset($dogodek->konec))$this->dtend = strtotime(ZDate::dbDateTime_php($dogodek->konec));
		else $this->dtend = strtotime(ZDate::setTime(ZDate::dbDateTime_php($dogodek->zacetek), '23:59:59'));
		$this->dtendraw='';
		$this->dtstamp ='';
		$this->class='';
		$this->categories='';
		$this->color='';
		//if(isset($vsebina->publish_up)) $this->description ='';
		//else $this->description = $vsebina->text;
		$this->description = $vsebina->text;
		$this->geolon=0;
		$this->geolat=0;
		$this->location = $vsebina->lokacija;
		$this->priority=0;
		$this->status='';
		$this->summary = $dogodek->naslov;
		$this->contact = '';
		$this->organizer = '';
		$this->url = '';
		$this->extra_info = '';
		$this->created='';
		$this->sequence=0;
		$this->state=1; //published
		$this->multiday=1;
		$this->hits=0;
		if(isset($dogodek->konec) || ZDate::getTime(ZDate::dbDateTime_php($dogodek->zacetek))=='00:00:00') $this->noendtime=0;
		else $this->noendtime=1;
		$this->modified=ZDate::dbDateTime_php(time()); // zdaj
	}
}
