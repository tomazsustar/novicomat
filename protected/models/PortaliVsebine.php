<?php

/**
 * This is the model class for table "{{portali_vsebine}}".
 *
 * The followings are the available columns in table '{{portali_vsebine}}':
 * @property integer $id
 * @property integer $id_portala
 * @property integer $id_vsebine
 * @property integer $status
 */
class PortaliVsebine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PortaliVsebine the static model class
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
		return '{{portali_vsebine}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_portala, id_vsebine, status', 'required'),
			array('id_portala, id_vsebine, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_portala, id_vsebine, status', 'safe', 'on'=>'search'),
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
			'portal' => array(self::BELONGS_TO, 'Portali', 'id_portala'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_portala' => 'Id Portala',
			'id_vsebine' => 'Id Vsebine',
			'status' => 'Status',
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
		$criteria->compare('id_portala',$this->id_portala);
		$criteria->compare('id_vsebine',$this->id_vsebine);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function vsiPortaliGledeNaVsebino($vsebina){
		$query = "SELECT p.id, domena, status FROM {{portali}} p LEFT OUTER JOIN {{portali_vsebine}} pv ON p.id=pv.id_portala WHERE id_vsebine=$vsebina->id OR id_vsebine IS NULL";
		 
		$out=Yii::app()->db->createCommand($query)->queryAll();
		//print_r($out);
		return $out;
		
	}
	
}