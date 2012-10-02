<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $title
 * @property string $country
 * @property string $description
 * @property boolean $in_menu
 *
 * The followings are the available model relations:
 * @property words[] $categoryWords
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, country', 'required'),
			array('title', 'length', 'max'=>128),
			array('country', 'length', 'max'=>2),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, country, description, in_menu', 'safe'),
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
			'words' => array(self::HAS_MANY, 'CategoryWords', 'category_id'),
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
			'country' => 'Country',
			'description' => 'Description',
            'in_menu' => 'In Top Menu?',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('country',Country::getCurrent(null, true));
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function active()
	{
		$criteria=new CDbCriteria;
		//$criteria->join = 'LEFT JOIN category_map cm ON cm.category_id = t.category_id';
		$criteria->compare('title',$this->title,true);
		$criteria->order = 'title';
		$criteria->compare('country',Country::getCurrent(null, true));

		return new CActiveDataProvider('Category', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>40),
		));
	}
}
