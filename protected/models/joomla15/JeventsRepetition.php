<?php

/**
 * This is the model class for table "jos_jevents_repetition".
 *
 * The followings are the available columns in table 'jos_jevents_repetition':
 * @property integer $rp_id
 * @property integer $eventid
 * @property integer $eventdetail_id
 * @property string $duplicatecheck
 * @property string $startrepeat
 * @property string $endrepeat
 */
class JeventsRepetition extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JeventsRepetition the static model class
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
		return 'jos_jevents_repetition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eventid, eventdetail_id', 'numerical', 'integerOnly'=>true),
			array('duplicatecheck', 'length', 'max'=>32),
			array('startrepeat, endrepeat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rp_id, eventid, eventdetail_id, duplicatecheck, startrepeat, endrepeat', 'safe', 'on'=>'search'),
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
			'rp_id' => 'Rp',
			'eventid' => 'Eventid',
			'eventdetail_id' => 'Eventdetail',
			'duplicatecheck' => 'Duplicatecheck',
			'startrepeat' => 'Startrepeat',
			'endrepeat' => 'Endrepeat',
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

		$criteria->compare('rp_id',$this->rp_id);
		$criteria->compare('eventid',$this->eventid);
		$criteria->compare('eventdetail_id',$this->eventdetail_id);
		$criteria->compare('duplicatecheck',$this->duplicatecheck,true);
		$criteria->compare('startrepeat',$this->startrepeat,true);
		$criteria->compare('endrepeat',$this->endrepeat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
}