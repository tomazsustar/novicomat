<?php

/**
 * This is the model class for table "{{tags}}".
 *
 * The followings are the available columns in table '{{tags}}':
 * @property integer $id
 * @property integer $parent
 * @property string $tag
 * @property string $alias
 */
class Tags extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tags the static model class
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
		return '{{tags}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag', 'required'),
			array('parent', 'numerical', 'integerOnly'=>true),
			array('tag', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent, tag', 'safe'),
			array('alias', 'length', 'max'=>256),
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
			'parent' => 'Parent',
			'tag' => 'Tag',
			'alias' => 'Alias',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('alias',$this->tag,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function str_to_array($tags_string){
		$all_tags = explode(',', addslashes($tags_string)); // v zbirko + addslashes
		$trimed_tags=array();

		foreach ($all_tags as $tag){
			if(($trimmed_tag = trim($tag)) != "" )
			$trimed_tags[] = $trimmed_tag; 
		}

        return array_unique($trimed_tags); // podvojene vrednosti ignoriramo
	}

    public function str_to_array_alias($tags_alias) {
		//$all_tags = explode(',', addslashes($tags_alias)); // v zbirko + addslashes
        $trimed_tags=array();

		foreach ($tags_alias as $tag){
			if(($trimmed_tag = trim($tag)) != "" )
            $poisci = array('\"',"\'"," ","č","š","ž","Č","Š","Ž");
            $zamenjaj = array("_","_","_","c","s","z","C","S","Z");
            $tagsReplace = str_replace($poisci, $zamenjaj, $trimmed_tag);
            $cleanTags = strtolower($tagsReplace);

			$trimed_tags[] = $cleanTags; 
		}

        return array_unique($trimed_tags); // podvojene vrednosti ignoriramo
    }

	/**
	 * 
	 * Najde ključne besede, ki jih še ni v databazi
	 * @param array $allTags
	 */
	public function findNonExistingTags($trimed_tags){
		$existing_tags=Tags::model()->findAll("BINARY tag IN ('".implode("','", $trimed_tags)."')"); // najde vse tage, ki že obstajajo - BINARY poskrbi da isce z case sensitive

		$existing_tags_simple_array = array();
        foreach ($existing_tags as $tag) {
            $existing_tags_simple_array[]=$tag->tag; // to simple array
        }

		return array_udiff($trimed_tags, $existing_tags_simple_array, 'strcasecmp') ; // poišče razliko in vrne
	}
}
