<?php

/**
 * This is the model class for table "{{slike}}".
 *
 * The followings are the available columns in table '{{slike}}':
 * @property integer $id
 * @property string $url
 * @property string $url2
 * @property string $opis
 * @property string $title
 * @property string $avtor
 * @property string $datum
 * @property string $tags
 */
class Slike extends CActiveRecord
{
	
	var $msg = "";
	/**
	 * Returns the static model of the specified AR class.
	 * @return Slike the static model class
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
		return '{{slike}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url', 'required'),
			array('title, avtor', 'length', 'max'=>256),
			array('datum, url2, opis, title, avtor, tags, pot', 'safe'),
			array('ime_slike','unique', 'message'=>'Slika s tem imenom že obstaja'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, url2, opis, title, avtor, datum, tags', 'safe', 'on'=>'search'),
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
			
			'vsebine' =>array(self::MANY_MANY, 'Vsebine', 'slike_vsebine(id_vsebine, id_slike)')
		);
	}

    /*
     * Funkcija vrne pot do slike za trenutno vsebino
     */
    public function potDoSlike($idd_vsebine) {

        $command = Yii::app()->db->createCommand()
            ->selectDistinct('s.pot, s.ime_slike')
            ->from('vs_slike s')
            ->join('vs_slike_vsebine sv', 'sv.id_slike=s.id')
            ->where("sv.id_vsebine = '$idd_vsebine' AND sv.mesto_prikaza != '3'") // slike, ki imajo mesto prikaza različno od 3
            ->queryAll();

         //print_r($command);
        return $command;
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Url',
			'url2' => 'Url2',
			'opis' => 'Opis',
			'title' => 'Title',
			'avtor' => 'Avtor',
			'datum' => 'Datum',
			'tags' => 'Tags',
			'pot' => 'pot',
			'ime_slike' => 'Ime_slike',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('url2',$this->url2,true);
		$criteria->compare('opis',$this->opis,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('avtor',$this->avtor,true);
		$criteria->compare('datum',$this->datum,true);
		$criteria->compare('tags',$this->tags,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
/**
	 * 
	 * Enter description here ...
	 * @param Slike $slika_mdl
	 */
	public function slikca(){
			if(!class_exists('WideImage', false)) 
				require_once Yii::app()->basePath.'/vendors/wideimage/WideImage.php';
			
			//load
			WideImage::load($this->pot.$this->ime_slike)
				->resize(300, 200, 'outside')
				->crop('center', 'center', 300, 200)
				->saveToFile(Yii::app()->params['imgDir'].'slikce/'.$this->ime_slike);
			
			//set url2
			$this->url2=Yii::app()->params['imgUrl'].'slikce/'.$this->ime_slike;
		
	}
}
