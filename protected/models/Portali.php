<?php

/**
 * This is the model class for table "{{portali}}".
 *
 * The followings are the available columns in table '{{portali}}':
 * @property integer $id
 * @property string $domena
 * @property string $tag
 * @property integer $tip
 */
class Portali extends CActiveRecord
{
	public $checked;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Portali the static model class
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
		return '{{portali}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('domena, tag, tip', 'required'),
			array('tip', 'numerical', 'integerOnly'=>true),
			array('domena, tag', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, domena, tag, tip', 'safe', 'on'=>'search'),
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
			'domena' => 'Domena',
			'tag' => 'Tag',
			'tip' => 'Tip',
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
		$criteria->compare('domena',$this->domena,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('tip',$this->tip);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function createRoles()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$auth=Yii::app()->authManager;
				
		$role=$auth->createRole($this->domena.'-avtor');
		$role->addChild('avtor');
		
		$role=$auth->createRole($this->domena.'-objava');	
		$role->addChild($this->domena.'-avtor');
		
		$role=$auth->createRole($this->domena.'-urednik');
		$role->addChild($this->domena.'-objava');
		
		$role=$auth->createRole($this->domena.'-manager');
		$role->addChild($this->domena.'-urednik');
		
		$auth->addItemChild('admin', $this->domena.'-manager');
	}
}