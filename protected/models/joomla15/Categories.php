<?php

/**
 * This is the model class for table "jos_categories".
 *
 * The followings are the available columns in table 'jos_categories':
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $name
 * @property string $alias
 * @property string $image
 * @property string $section
 * @property string $image_position
 * @property string $description
 * @property integer $published
 * @property string $checked_out
 * @property string $checked_out_time
 * @property string $editor
 * @property integer $ordering
 * @property integer $access
 * @property integer $count
 * @property string $params
 */
class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Categories the static model class
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
		return 'jos_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, params', 'required'),
			array('parent_id, published, ordering, access, count', 'numerical', 'integerOnly'=>true),
			array('title, name, alias, image', 'length', 'max'=>255),
			array('section, editor', 'length', 'max'=>50),
			array('image_position', 'length', 'max'=>30),
			array('checked_out', 'length', 'max'=>11),
			array('checked_out_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, title, name, alias, image, section, image_position, description, published, checked_out, checked_out_time, editor, ordering, access, count, params', 'safe', 'on'=>'search'),
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
	
	public static function listBySection($sectionid){
		return CHtml::listData(Categories::model()->findAll('section=:sectionid', array(':sectionid'=>$sectionid)),
	                  'id','title');
	}
	
	public static function listJevCat(&$cats=false, &$list=false, $bullet="" ){
		if(!$list){
			// inicializacija
			$list = array();
			$cats = Categories::model()->findAllByAttributes(array('section'=>'com_jevents', 'parent_id'=>0));
		}
		foreach ($cats as $cat) {
			$list[$cat->id]=$bullet.$cat->title;
			self::listJevCat(@Categories::model()->findAllByAttributes(array('section'=>'com_jevents', 'parent_id'=>$cat->id)), $list, "...".$bullet." ");
		}              
		return $list;
	}
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'name' => 'Name',
			'alias' => 'Alias',
			'image' => 'Image',
			'section' => 'Section',
			'image_position' => 'Image Position',
			'description' => 'Description',
			'published' => 'Published',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'editor' => 'Editor',
			'ordering' => 'Ordering',
			'access' => 'Access',
			'count' => 'Count',
			'params' => 'Params',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('section',$this->section,true);
		$criteria->compare('image_position',$this->image_position,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('checked_out',$this->checked_out,true);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('editor',$this->editor,true);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('access',$this->access);
		$criteria->compare('count',$this->count);
		$criteria->compare('params',$this->params,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}