<?php

/**
 * This is the model class for table "brand".
 *
 * The followings are the available columns in table 'brand':
 * @property integer $id
 * @property string $title
 * @property string $country
 * @property string $logo
 * @property string $description
 * @property integer $is_special
 * @property string $term
 * @property integer $visits
 * @property bool $is_manual
 * @property string $url
 * @property string $is_featured_today
 * 
 * @property Product[] $topProducts
 */
class Brand extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Brand the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'brand';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, country', 'required'),
            array('is_special', 'numerical', 'integerOnly' => true),
            array('is_shown', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 128),
            array('country', 'length', 'max' => 2),
            array('logo', 'length', 'max' => 255),
            array('url', 'length', 'max' => 64),
            array('logo', 'file', 'types' => 'jpg, jpeg, gif, png', 'allowEmpty' => true),
            array('id, title, country, logo, description, is_special, is_shown, term, is_manual, url', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'mp' => array(self::HAS_ONE, 'MagicP', 'entity_id', 'on' => 'type = "brand"'),
            'image' => array(self::HAS_ONE, 'BrandImage', 'brand_id', 'order' => 'RAND()'),
            'images_list' => array(self::HAS_MANY, 'BrandImage', 'brand_id'),
            'images' => array(self::STAT, 'BrandImage', 'brand_id'),
            'banner' => array(self::HAS_MANY, 'Banner', 'brand_id'),
            'topProducts' => array(self::HAS_MANY, 'Product', 'brand_id',
                'limit' => 3,
                'order' => 'topProducts.visits DESC',
                'condition' => 'topProducts.country = :code',
                'params' => array(':code' => Country::getCurrent()),
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'country' => 'Country',
            'logo' => 'Logo',
            'description' => 'Description',
            'is_special' => 'Is Special',
            'is_shown' => 'Leftside Bar',
        );
    }

    public function scopes() {
        return array(
            'country' => array(
                'condition' => 'country = :code',
                'params' => array(':code' => Country::getCurrent()),
            )
        );
    }

    public function beforeSave() {
        if ($this->isNewRecord)
            $this->is_manual = 1;

        return parent::beforeSave();
    }

    public function afterDelete() {
        if (!empty($this->image_url) && strpos($this->image_url, 'http') === false) {
            //$filename = substr($this->image_url, strrpos($this->image_url,'/'));
            unlink(YiiBase::getPathOfAlias('webroot.images.media.brands') . DIRECTORY_SEPARATOR . $this->getImageName($this->logo));
        }

        MagicP::model()->deleteAll('type="brand" AND entity_id = :id', array(':id' => $this->id));
        Product::model()->deleteAll('brand_id = :id', array(':id' => $this->id));
    }

    public function getImageName($url) {
        return substr($url, strrpos($url, '/'));
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('country', Country::getCurrent());
        $criteria->compare('description', $this->description, true);
        $criteria->compare('is_special', $this->is_special);
        $criteria->compare('is_shown', $this->is_shown);
        $criteria->compare('url', $this->url);

        switch ($this->logo) {
            case 1:
                #with logo
                $criteria->addCondition('(logo IS NOT NULL AND logo <> "")');
                break;
            case 2:
                #without logo
                $criteria->addCondition('(logo IS NULL OR logo = "")');
                break;
        }

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function banner() {
        $criteria = new CDbCriteria;

        $criteria->compare('title', $this->title, true);
        $criteria->compare('country', Country::getCurrent());
        $criteria->compare('is_special', 1);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function images() {
        $criteria = new CDbCriteria;

        $criteria->compare('brand_id', $this->id, true);

        return new CActiveDataProvider('BrandImage', array(
                    'criteria' => $criteria,
                ));
    }

    public function mp() {
        $session = Yii::app()->session;
        $criteria = new CDbCriteria;

        $criteria->with = array('mp');

        if (!yii::app()->request->isAjaxRequest && $session->contains('filter') && isset($_GET['backfilter'])) {
            $this->title = $session['filter']['title'];
        } elseif (yii::app()->request->isAjaxRequest) {
            $session->add('filter', array('title' => $this->title));
        }

        $criteria->compare('title', $this->title, true);
        $criteria->compare('country', $this->country);
        $criteria->order = 'title';

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => 20,
                    ),
                ));
    }

    public function addVisit($id = null) {
        if (empty($id))
            $id = $this->id;

        $model = $this->id ? $this : self::model()->findByPk($id);
        if ($model) {
            $model->saveCounters(array('visits' => 1));
            return true;
        }

        return false;
    }

    public function getInlineShown() {
        $cs = Yii::app()->getClientScript();
        $cs->registerScript('cardInlineControls', '

            $(".leftsideBar").live("change", function(){
                id = $(this).val();
                val = $(this).attr("checked") ? 1 : 0;
                jQuery.ajax({
                    "type":"post",
                    "url":"' . Yii::app()->createUrl('/admin/brand/remote') . '",
                    "data":{id:id, "enableShown":val}

                });
            });
            
            $(".leftsideBarToday").live("change", function(){
                id = $(this).val();
                val = $(this).attr("checked") ? 1 : 0;
                jQuery.ajax({
                    "type":"post",
                    "url":"' . Yii::app()->createUrl('/admin/brand/remote') . '",
                    "data":{id:id, "enableToday":val}

                });
            });

        ', CClientScript::POS_READY);

        echo '<label>', CHtml::checkBox('is_shown[]', $this->is_shown, array('class' => 'leftsideBar', 'value' => $this->id, 'uncheckValue' => null)), ' show', '</label>';
    }
    public function getInlineFeatured() {
        $cs = Yii::app()->getClientScript();
        echo '<label>', CHtml::checkBox('is_featured_today[]', $this->is_featured_today, array('class' => 'leftsideBarToday', 'value' => $this->id, 'uncheckValue' => null)), ' is featured', '</label>';
    }

}