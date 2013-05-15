<?php

/**
 * This is the model class for table "jos_content".
 *
 * The followings are the available columns in table 'jos_content':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $title_alias
 * @property string $introtext
 * @property string $fulltext
 * @property integer $state
 * @property string $sectionid
 * @property string $mask
 * @property string $catid
 * @property string $created
 * @property string $created_by
 * @property string $created_by_alias
 * @property string $modified
 * @property string $modified_by
 * @property string $checked_out
 * @property string $checked_out_time
 * @property string $publish_up
 * @property string $publish_down
 * @property string $images
 * @property string $urls
 * @property string $attribs
 * @property string $version
 * @property string $parentid
 * @property integer $ordering
 * @property string $metakey
 * @property string $metadesc
 * @property string $access
 * @property string $hits
 * @property string $metadata
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Content the static model class
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
		return 'jos_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('introtext, fulltext, images, urls, attribs, metakey, metadesc, metadata', 'required'),
			array('state, ordering', 'numerical', 'integerOnly'=>true),
			array('title, alias, title_alias, created_by_alias', 'length', 'max'=>255),
			array('sectionid, mask, catid, created_by, modified_by, checked_out, version, parentid, access, hits', 'length', 'max'=>11),
			array('created, modified, checked_out_time, publish_up, publish_down', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, title_alias, introtext, fulltext, state, sectionid, mask, catid, created, created_by, created_by_alias, modified, modified_by, checked_out, checked_out_time, publish_up, publish_down, images, urls, attribs, version, parentid, ordering, metakey, metadesc, access, hits, metadata', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'alias' => 'Alias',
			'title_alias' => 'Title Alias',
			'introtext' => 'Introtext',
			'fulltext' => 'Fulltext',
			'state' => 'State',
			'sectionid' => 'Sectionid',
			'mask' => 'Mask',
			'catid' => 'Catid',
			'created' => 'Created',
			'created_by' => 'Created By',
			'created_by_alias' => 'Created By Alias',
			'modified' => 'Modified',
			'modified_by' => 'Modified By',
			'checked_out' => 'Checked Out',
			'checked_out_time' => 'Checked Out Time',
			'publish_up' => 'Publish Up',
			'publish_down' => 'Publish Down',
			'images' => 'Images',
			'urls' => 'Urls',
			'attribs' => 'Attribs',
			'version' => 'Version',
			'parentid' => 'Parentid',
			'ordering' => 'Ordering',
			'metakey' => 'Metakey',
			'metadesc' => 'Metadesc',
			'access' => 'Access',
			'hits' => 'Hits',
			'metadata' => 'Metadata',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('title_alias',$this->title_alias,true);
		$criteria->compare('introtext',$this->introtext,true);
		$criteria->compare('fulltext',$this->fulltext,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('sectionid',$this->sectionid,true);
		$criteria->compare('mask',$this->mask,true);
		$criteria->compare('catid',$this->catid,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_by_alias',$this->created_by_alias,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('modified_by',$this->modified_by,true);
		$criteria->compare('checked_out',$this->checked_out,true);
		$criteria->compare('checked_out_time',$this->checked_out_time,true);
		$criteria->compare('publish_up',$this->publish_up,true);
		$criteria->compare('publish_down',$this->publish_down,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('urls',$this->urls,true);
		$criteria->compare('attribs',$this->attribs,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('parentid',$this->parentid,true);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('metakey',$this->metakey,true);
		$criteria->compare('metadesc',$this->metadesc,true);
		$criteria->compare('access',$this->access,true);
		$criteria->compare('hits',$this->hits,true);
		$criteria->compare('metadata',$this->metadata,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param Vsebine $vsebineModel
	 */
	public function mapVsebine(&$vsebineModel){
		$this->title = $vsebineModel->title;
		$this->alias = str_replace(array('.',' ', 'š','č','ž','đ','ć','Š','Č','Ž','Đ','Ć'), 
								   array('-','-','s','c','z','dz','c','s','c','z','dz','c'), 
								   strtolower(trim($vsebineModel->title)));
		$this->title_alias = '';
		$this->introtext = CHtml::image($vsebineModel->slika, $vsebineModel->slika, array('style'=>'margin:5px;float:left;width:150px')).$vsebineModel->introtext;
		//slike
		$slike_html=CHtml::openTag('div', array('class'=>'prispevek-slike', 'style'=>'float:right;'));
		foreach ($vsebineModel->slvs as $slvs){
			$slike_html.=CHtml::openTag('a', array('href'=>'$slvs->slika->url', 'rel'=>'lightbox'));
				$slike_html.= CHtml::image(
					$slvs->slika->url2,     //src
					$slvs->slika->ime_slike,  //alt
					array(
						'style'=>'margin:5px;width:250px;', 
					)
				);
			$slike_html.=CHtml::closeTag('a');
		}
		$slike_html.=CHtml::closeTag('div');
		
		$this->fulltext = $slike_html.$vsebineModel->fulltext;
		$this->state = 1; // 1 - published
		$this->sectionid = $vsebineModel->sectionid;
		$this->mask = 0;
		$this->catid = $vsebineModel->catid;
		$this->created = ZDate::dbModify($vsebineModel->publish_up, '- 2 hours');
		$this->created_by = Yii::app()->user->id;
		$this->created_by_alias = $vsebineModel->author_alias;
		$this->modified = ZDate::dbNow(); // zdaj
		$this->modified_by = Yii::app()->user->id;
		$this->checked_out = 0;
		$this->checked_out_time = '000-00-00 00:00:00';
		$this->publish_up = ZDate::dbModify($vsebineModel->publish_up, '- 2 hours');
		$this->publish_down = ZDate::dbModify($vsebineModel->publish_down, '- 2 hours');
		$this->images = '';
		$this->urls = '';
		$this->attribs = "show_intro=0\n"; //$vsebineModel->params;
		$this->version = 1;
		$this->parentid = 0;
		$this->ordering = 0;
		$this->metakey = $vsebineModel->tags;
		$this->metadesc = '';
		$this->access = 0; //0 - public;
		$this->hits = 0;
		$this->metadata = '';		
	}
	
}