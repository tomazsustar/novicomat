<?php

/**
 * This is the model class for table "{{lokacije}}".
 *
 * The followings are the available columns in table '{{lokacije}}':
 * @property integer $id
 * @property string $naziv
 * @property string $ulica
 * @property string $h_st
 * @property string $postna_st
 * @property string $posta
 * @property string $dod_naslov
 * @property string $drzava
 * @property integer $id_vsebine
 * @property string $kontakt
 * @property string $location
 * @property integer $id_stars
 * @property integer $rezervacije
 * @property integer $izbira
 */
class Lokacije extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lokacije the static model class
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
		return '{{lokacije}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('naziv, ulica, h_st, postna_st, posta, dod_naslov, drzava, kontakt, id_stars, rezervacije, izbira', 'required'),
			array('id_vsebine, id_stars, rezervacije, izbira', 'numerical', 'integerOnly'=>true),
			array('naziv, ulica, posta', 'length', 'max'=>256),
			array('h_st, postna_st', 'length', 'max'=>8),
			array('drzava', 'length', 'max'=>265),
			array('location', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, naziv, ulica, h_st, postna_st, posta, dod_naslov, drzava, id_vsebine, kontakt, location, id_stars, rezervacije, izbira', 'safe', 'on'=>'search'),
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
			'naziv' => 'Naziv',
			'ulica' => 'Ulica',
			'h_st' => 'H St',
			'postna_st' => 'Postna St',
			'posta' => 'Posta',
			'dod_naslov' => 'Dod Naslov',
			'drzava' => 'Drzava',
			'id_vsebine' => 'Id Vsebine',
			'kontakt' => 'Kontakt',
			'location' => 'Location',
			'id_stars' => 'Id Stars',
			'rezervacije' => 'Rezervacije',
			'izbira' => 'Izbira',
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
		$criteria->compare('naziv',$this->naziv,true);
		$criteria->compare('ulica',$this->ulica,true);
		$criteria->compare('h_st',$this->h_st,true);
		$criteria->compare('postna_st',$this->postna_st,true);
		$criteria->compare('posta',$this->posta,true);
		$criteria->compare('dod_naslov',$this->dod_naslov,true);
		$criteria->compare('drzava',$this->drzava,true);
		$criteria->compare('id_vsebine',$this->id_vsebine);
		$criteria->compare('kontakt',$this->kontakt,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('id_stars',$this->id_stars);
		$criteria->compare('rezervacije',$this->rezervacije);
		$criteria->compare('izbira',$this->izbira);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}