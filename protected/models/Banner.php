<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property integer $brand_id
 * @property string $image_url
 * @property string $description
 * @property string $link
 * @property integer $width
 * @property integer $height
 *
 * The followings are the available model relations:
 * @property Brand $brand
 */
class Banner extends CActiveRecord {

    public $country;


    /**
     * Returns the static model of the specified AR class.
     * @return Banner the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'banner';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('brand_id, image_url, link', 'required'),
            array('brand_id', 'numerical', 'integerOnly' => true),
            array('image_url', 'length', 'max' => 255),
            array('description', 'safe'),
            array('link', 'url', 'pattern'=>"/^(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:\+#]*[\w\-\@?^=%&amp;\+#])?/i"),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, brand_id, image_url, description, link, width, height, country', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'brand' => array(self::BELONGS_TO, 'Brand', 'brand_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'brand_id' => 'Brand',
            'image_url' => 'Image Url',
            'description' => 'Description',
            'link' => 'Link',
        );
    }

    protected function afterSave() {
        if ($this->isNewRecord) {
            Brand::model()->updateByPk($this->brand_id, array('is_special' => 1));
        }
        parent::afterSave();
    }

    protected function afterDelete() {
        $cnt = Banner::model()->count('brand_id = :id', array(':id' => $this->brand_id));
        if (empty($cnt))
            Brand::model()->updateByPk($this->brand_id, array('is_special' => 0));

        $filepath = YiiBase::getPathOfAlias('webroot.images.media.banner') . DIRECTORY_SEPARATOR . $this->getImageName($this->image_url);
        if (file_exists($filepath))
            unlink($filepath);

        parent::afterDelete();
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array(
                    'brand'=>array(
                        'order'=>'title'
                    ));
        //$criteria->with = array('brand');

        $criteria->compare('id', $this->id);
        //$criteria->compare('brand_id', $this->brand_id);
        $criteria->compare('image_url', $this->image_url, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('brand.country', Country::getCurrent(null, false));

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                ));
    }

    public function getImageName($url) {
        return substr($url, strrpos($url, '/'));
    }

    /**
     * Get banner layout position
     * @return string v-vetical, h-horisontal
     */
    public function getType() {
        return $this->width / $this->height >= 0.95 ? 'h' : 'v';
    }

}