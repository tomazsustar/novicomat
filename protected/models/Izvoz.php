<?php

/**
 * This is the model class for table "{{izvoz}}".
 *
 * The followings are the available columns in table '{{izvoz}}':
 * @property integer $id
 * @property integer $je_clanek
 * @property integer $je_dogodek
 * @property integer $id_clanka_izvoz
 * @property integer $id_dogodka_izvoz
 * @property integer $id_vsebine
 * @property string $cilj
 */
class Izvoz extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Izvoz the static model class
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
		return '{{izvoz}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('je_clanek, je_dogodek, id_clanka_izvoz, id_dogodka_izvoz, id_vsebine, cilj', 'required'),
			array('je_clanek, je_dogodek, id_clanka_izvoz, id_dogodka_izvoz, id_vsebine', 'numerical', 'integerOnly'=>true),
			array('cilj', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, je_clanek, je_dogodek, id_clanka_izvoz, id_dogodka_izvoz, id_vsebine, cilj', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'je_clanek' => 'Je Clanek',
			'je_dogodek' => 'Je Dogodek',
			'id_clanka_izvoz' => 'Id Clanka Izvoz',
			'id_dogodka_izvoz' => 'Id Dogodka Izvoz',
			'id_vsebine' => 'Id Vsebine',
			'cilj' => 'Cilj',
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
		$criteria->compare('je_clanek',$this->je_clanek);
		$criteria->compare('je_dogodek',$this->je_dogodek);
		$criteria->compare('id_clanka_izvoz',$this->id_clanka_izvoz);
		$criteria->compare('id_dogodka_izvoz',$this->id_dogodka_izvoz);
		$criteria->compare('id_vsebine',$this->id_vsebine);
		$criteria->compare('cilj',$this->cilj,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}