<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $image_extension
 * @property string $price
 * @property string $firm_id
 *
 * The followings are the available model relations:
 * @property Firms $firm
 */
class Product extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'products';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, description, price, firm_id', 'required', 'message' => "заполните поле {attribute}"),
            array('title', 'length', 'max' => 128),
            array('price', 'length', 'max' => 8),
            array('firm_id', 'length', 'max' => 11),
            array(
                'image_extension', 'file',
                'types' => 'jpg, jpeg, png, gif',
                'maxSize' => 1024 * 1024 * 5,
                'tooLarge' => 'вы загрузили слишком большой файл. Загрузите файл менее 5 Мб',
                'allowEmpty' => !$this->isNewRecord,
                'wrongType' => 'Файл {file} не может быть загружен. Загрузить можно файл формата {extensions}',
                'message' => "Выберите {attribute}"),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, image_extension, price, firm_id', 'safe', 'on' => 'search'),
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
            'firm' => array(self::BELONGS_TO, 'Firm', 'firm_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'image_extension' => 'Изображение',
            'price' => 'Цена',
            'firm_id' => 'Производитель',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($perPage = 20)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image_extension', $this->image_extension, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('firm_id', $this->firm_id, true);
        $criteria->with = array('firm');

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => $perPage,
                    ),
                ));
    }

}