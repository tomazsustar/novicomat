<?php

/**
 * This is the model class for table "jos_jevents_vevent".
 *
 * The followings are the available columns in table 'jos_jevents_vevent':
 * @property integer $ev_id
 * @property integer $icsid
 * @property integer $catid
 * @property string $uid
 * @property string $refreshed
 * @property string $created
 * @property string $created_by
 * @property string $created_by_alias
 * @property string $modified_by
 * @property string $rawdata
 * @property string $recurrence_id
 * @property integer $detail_id
 * @property integer $state
 * @property integer $lockevent
 * @property integer $author_notified
 * @property string $access
 */
class JeventsVevent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JeventsVevent the static model class
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
		return 'jos_jevents_vevent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rawdata', 'required'),
			array('icsid, catid, detail_id, state, lockevent, author_notified', 'numerical', 'integerOnly'=>true),
			array('uid', 'length', 'max'=>255),
			array('created_by, modified_by, access', 'length', 'max'=>11),
			array('created_by_alias', 'length', 'max'=>100),
			array('recurrence_id', 'length', 'max'=>30),
			array('refreshed, created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ev_id, icsid, catid, uid, refreshed, created, created_by, created_by_alias, modified_by, rawdata, recurrence_id, detail_id, state, lockevent, author_notified, access', 'safe', 'on'=>'search'),
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
			'details'=>array(self::BELONGS_TO, 'JeventsVevdetail', 'detail_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ev_id' => 'Ev',
			'icsid' => 'Icsid',
			'catid' => 'Catid',
			'uid' => 'Uid',
			'refreshed' => 'Refreshed',
			'created' => 'Created',
			'created_by' => 'Created By',
			'created_by_alias' => 'Created By Alias',
			'modified_by' => 'Modified By',
			'rawdata' => 'Rawdata',
			'recurrence_id' => 'Recurrence',
			'detail_id' => 'Detail',
			'state' => 'State',
			'lockevent' => 'Lockevent',
			'author_notified' => 'Author Notified',
			'access' => 'Access',
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

		$criteria->compare('ev_id',$this->ev_id);
		$criteria->compare('icsid',$this->icsid);
		$criteria->compare('catid',$this->catid);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('refreshed',$this->refreshed,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_by_alias',$this->created_by_alias,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('rawdata',$this->rawdata,true);
		$criteria->compare('recurrence_id',$this->recurrence_id,true);
		$criteria->compare('detail_id',$this->detail_id);
		$criteria->compare('state',$this->state);
		$criteria->compare('lockevent',$this->lockevent);
		$criteria->compare('author_notified',$this->author_notified);
		$criteria->compare('access',$this->access,true);

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
		$this->icsid = 1;
		$this->catid = $vsebina->event_cat;
		$this->uid = $vsebina->global_id; 
		$this->refreshed = ZDate::dbDateTime_php(time());
		$this->created = $this->refreshed;
		$this->created_by = 62;
		$this->created_by_alias = $vsebina->author;
		$this->modified_by = 62;
		//$this->rawdata =
		//$this->detail_id = //se vpiše posebej
		$this->state=1; //published
		$this->access=0;
		$this->lockevent=0;
		$this->author_notified=0;
	}
}