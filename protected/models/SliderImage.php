<?php

/**
 * This is the model class for table "slider_images".
 *
 * The followings are the available columns in table 'slider_images':
 * @property string $id
 * @property string $extension
 * @property integer $is_active
 * @property $file
 */
class SliderImage extends CActiveRecord {

    public $file;

    protected function beforeDelete() {
        if(parent::beforeDelete()) {
            if(is_file(Yii::app()->params['SLIDER_IMAGE_FOLDER'] . '/' . $this->id . '.' . $this->extension)) {
                unlink(Yii::app()->params['SLIDER_IMAGE_FOLDER'] . '/' . $this->id . '.' . $this->extension);
            }
            
            return true;
        }
    }


    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'slider_images';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('is_active', 'numerical', 'integerOnly' => true),
            array('extension', 'length', 'max' => 64),
            array(
                'file', 'file',
                'types' => 'jpg, jpeg, png, gif',
                'maxSize' => 1024 * 1024 * 5,
                'tooLarge' => 'вы загрузили слишком большой файл. Загрузите файл менее 5 Мб',
                'allowEmpty' => !$this->isNewRecord,
                'wrongType' => 'Файл {file} не может быть загружен. Загрузить можно файл формата {extensions}',
                'message' => "Выберите {attribute}"),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, extension, is_active, file', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'extension' => 'Extension',
            'is_active' => 'Is Active',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('extension', $this->extension, true);
        $criteria->compare('is_active', $this->is_active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SliderImage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
