<?php

/**
 * This is the model class for table "{{slike_vsebine}}".
 *
 * The followings are the available columns in table '{{slike_vsebine}}':
 * @property integer $id_slike
 * @property integer $id_vsebine
 * @property integer $mesto_prikaza
 */
class SlikeVsebine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SlikeVsebine the static model class
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
		return '{{slike_vsebine}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_slike, id_vsebine, mesto_prikaza', 'required'),
			array('id_slike, id_vsebine, mesto_prikaza, zp_st', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_slike, id_vsebine, mesto_prikaza, zp_st', 'safe', 'on'=>'search'),
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
			'id_slike' => 'Id Slike',
			'id_vsebine' => 'Id Vsebine',
			'mesto_prikaza' => 'Mesto Prikaza',
			'zp_st' => 'Zaporedna številka',
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

		$criteria->compare('id_slike',$this->id_slike);
		$criteria->compare('id_vsebine',$this->id_vsebine);
		$criteria->compare('mesto_prikaza',$this->mesto_prikaza);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}