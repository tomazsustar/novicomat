<?php

/**
 * This is the model class for table "{{koledar}}".
 *
 * The followings are the available columns in table '{{koledar}}':
 * @property integer $id
 * @property string $naslov
 * @property integer $id_vsebine
 * @property string $zacetek
 * @property string $konec
 * @property string $lokacija
 * @property integer $id_lokacija
 */
class Koledar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Koledar the static model class
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
		return '{{koledar}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naslov, zacetek, lokacija', 'required'),
			array('id_vsebine', 'numerical', 'integerOnly'=>true),
			array('konec, zacetek', 'ext.myvalidators.DateOrTime'), 
			array('konec','ext.myvalidators.Later', 'then'=>'zacetek'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naslov, id_vsebine, zacetek, konec, lokacija, id_lokacija', 'safe', 'on'=>'search'),
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
			'vsebina'    => array(self::BELONGS_TO, 'Vsebine',    'vsebina_id'),
		);
	}
	
	public function behaviors()
	{
	    return array('datetimeDBBehavior' => array('class' => 'ext.DateTimeDBBehavior')); // uredi datum, da je pravega formata za v bazo in iz nje
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'naslov' => 'Naslov',
			'id_vsebine' => 'Id Vsebine',
			'zacetek' => 'Zacetek',
			'konec' => 'Konec',
			'lokacija' => 'Lokacija',
			'id_lokacija' => 'Id Lokacija',
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
		$criteria->compare('naslov',$this->naslov,true);
		$criteria->compare('id_vsebine',$this->id_vsebine);
		$criteria->compare('zacetek',$this->zacetek,true);
		$criteria->compare('konec',$this->konec,true);
		$criteria->compare('lokacija',$this->lokacija,true);
		$criteria->compare('id_lokacija',$this->id_lokacija);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
