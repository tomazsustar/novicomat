<?php

/**
 * This is the model class for table "strani".
 *
 * The followings are the available columns in table 'strani':
 * @property integer $id
 * @property string $url
 * @property integer $state
 * @property string $last_update
 * @property integer $urnik
 * @property string $porocilo
 * @property string $naslov
 * @property string $vir_text
 */
class Strani extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Strani the static model class
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
		return '{{strani}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, parser,  naslov, home_url, vir_text', 'required'),
			array('state, urnik, event_cat, catid, sectionid', 'numerical', 'integerOnly'=>true),
			array('last_update, last_update_hash, urnik, porocilo, vir_text, tags, author_alias', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, stran.naslov, last_update, urnik, porocilo, naslov, vir_text', 'safe', 'on'=>'search'),
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
			//'tip' => array(self::BELONGS_TO, 'TipiStrani', 'tip_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Url strani za parsenje',
			'parser' => 'Parser',
			'last_update' => 'Last Update',
			'urnik' => 'Urnik',
			'porocilo' => 'Porocilo',
			'naslov' => 'Naslov',
			'vir_text' => 'Besedilo "Vir"',
			'author_alias' => 'Privzeti avtor',
			'tags' => 'Ključne besede',
			'home_url' => 'Url prve strani',
			'state'=>'Aktivna'
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
		$criteria->compare('state',$this->state);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('urnik',$this->urnik);
		$criteria->compare('porocilo',$this->porocilo,true);
		$criteria->compare('naslov',$this->naslov,true);
		$criteria->compare('vir_text',$this->vir_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getParsersList() 
	  {
	
	    // create an array to hold directory list
	    $results = array();
	
	    // create a handler for the directory
	    $handler = opendir(Yii::app()->basePath.'/components/parsers/');
	
	    // open directory and walk through the filenames
	    while ($file = readdir($handler)) {
	
	      // if file isn't this directory or its parent, add it to the results
	      if ($file != "." && $file != ".." && $file !='Parser.php') {
	        $results[$file] = $file;
	      }
	
	    }
	
	    // tidy up: close the handler
	    closedir($handler);
	
	    // done!
	    return $results;
	
	  }
	
}