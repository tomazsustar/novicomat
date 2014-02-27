<?php

/**
 * This is the model class for table "{{lokacije}}".
 *
 * The followings are the available columns in table '{{lokacije}}':
 * @property integer $id
 * @property string $ime_lokacije
 * @property string $ime_prostora
 * @property string $ime_stavbe
 * @property string $ulica_vas
 * @property string $h_st
 * @property string $postna_st
 * @property string $kraj
 * @property string $obcina
 * @property string $drzava
 * @property integer $level
 * @property integer $parent
 * @property string $geolat
 * @property string $geolng
 * @property integer $vsebina_id
 * @property integer $uporabnik_id
 * @property integer $gln
 * @property string $created
 * @property string $updated
 */
class Lokacije extends CActiveRecord
{
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
		return array(
			array('drzava', 'required'),
			array('ime_lokacije, ulica_vas, kraj', 'length', 'max'=>256),
			array('ime_prostora, ime_stavbe, obcina', 'length', 'max'=>250),
			array('h_st, postna_st', 'length', 'max'=>8),
			array('drzava', 'length', 'max'=>265),

			array('ime_lokacije, ime_prostora, ime_stavbe, ulica_vas, postna_st, kraj, obcina, drzava', 'safe', 'on'=>'search'),
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
			'ime_lokacije' => 'Ime Lokacije',
			'ime_prostora' => 'Ime Prostora',
			'ime_stavbe' => 'Ime Stavbe',
			'ulica_vas' => 'Ulica ali vas',
			'h_st' => 'Hišna številka',
			'postna_st' => 'Poštna številka',
			'kraj' => 'Kraj',
			'obcina' => 'Občina',
			'drzava' => 'Država'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('ime_lokacije',$this->ime_lokacije,true);
		$criteria->compare('ime_prostora',$this->ime_prostora,true);
		$criteria->compare('ime_stavbe',$this->ime_stavbe,true);
		$criteria->compare('ulica_vas',$this->ulica_vas,true);
		$criteria->compare('postna_st',$this->postna_st,true);
		$criteria->compare('kraj',$this->kraj,true);
		$criteria->compare('obcina',$this->obcina,true);
		$criteria->compare('drzava',$this->drzava,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function AssembleSimple($Lokacija) {
		$New = array(
			"id" => $Lokacija->id,
			"ulica_vas" => $Lokacija->ulica_vas,
			"ime_stavbe" => $Lokacija->ime_stavbe,
			"h_st" => $Lokacija->h_st,
			"kraj" => $Lokacija->kraj,
			"drzava" => $Lokacija->drzava,
			"ime_lokacije" => $Lokacija->ime_lokacije,
			"obcina" => $Lokacija->obcina
		);
		
		return $New;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lokacije the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
