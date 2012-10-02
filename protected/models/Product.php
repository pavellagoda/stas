<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $title
 * @property double $price
 * @property string $currency
 * @property string $description
 * @property string $link
 * @property string $image_url
 * @property string $product_site_id
 * @property string $add_date
 * @property string $visits
 * @property string $category_term
 */
class Product extends CActiveRecord
{
    public $aCurrency = array(
       'Euro'=>'&euro;',
       'EUR'=>'&euro;',
       'GBP'=>'&pound;',
    );
    
	/**
	 * Returns the static model of the specified AR class.
	 * @return Product the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, link, product_site_id, country', 'required'),
			array('category_id, brand_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('title', 'length', 'max'=>255),
			array('currency', 'length', 'max'=>8),
			array('link, image_url', 'length', 'max'=>300),
			array('product_site_id', 'length', 'max'=>35),
			array('visits', 'length', 'max'=>11),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, brand_id, title, price, currency, description, link, image_url, product_site_id, add_date, visits, country, category_term, file_id', 'safe'),
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
            'category'=>array(self::BELONGS_TO, 'Category', 'category_id'),
            'brand'=>array(self::BELONGS_TO, 'Brand', 'brand_id'),
            'map'=>array(self::HAS_MANY, 'ProductMap', 'product_id', 'order'=>'priority'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'brand_id' => 'Brand',
			'title' => 'Title',
			'price' => 'Price',
			'currency' => 'Currency',
			'description' => 'Description',
			'link' => 'Link',
			'image_url' => 'Image Url',
			'product_site_id' => 'Product Site',
			'add_date' => 'Add Date',
			'visits' => 'Visits',
		);
	}
    
    public function scopes() {
        return array(
            'country'=>array(
                'condition'=>'t.country = :code',
                'params'=>array(':code'=>Country::getCurrent(NULL, false)),
            )
        );
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
        $criteria->with = array('category','brand');

		$criteria->compare('id',$this->id);
		$criteria->compare('category.title',$this->category_id, true);
		$criteria->compare('brand.title',$this->brand_id, true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('price',$this->price);
        $criteria->compare('t.country',Country::getCurrent(NULL, false));
		$criteria->compare('visits',$this->visits,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function category()
    {
        $criteria=new CDbCriteria;
        //$criteria->with = array(/*'map'*/  'map.category');
        $criteria->condition = 't.category_id IS NULL';
        $criteria->compare('t.country',Country::getCurrent());
        //$criteria->addInCondition('t.product_id', array())

        return new CActiveDataProvider('Product', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>yii::app()->request->getParam('pSize', 30),
            ),
             
        ));
    }
    
    /**
     * Get currency sign
     */
    public function getSign(){
        return $this->aCurrency[!empty($this->currency) ? $this->currency : 'EUR'];
    }
    
    public function addVisit($id = null){
        if (empty($id))
            $id = $this->id;
            
        $model = $this->id ? $this : self::model()->findByPk($id);
        if ($model){
            $model->saveCounters(array('visits'=>1));
            return true;
        }
        
        return false;
    }
    
    /**
     * Redirect logic
     * Defining the top product to redirect
     * @param array $aMagicP list of magic parameters, 1 feed + 1 advertiser/brand
     * @return bool|string - url
     */
    public function getForwardUrl(array $aMagicP){
        if (empty($aMagicP)) return false;
        
        $criteria = new CDbCriteria;
        $criteria->addInCondition('name',$aMagicP);
        $mp = new MagicP;
        $params = $mp->findAll($criteria);
        if ($params){
            $params = CHtml::listData($params,'type','entity_id');          
            if (isset($params['brand'])){
                $where = isset($params['feed']) ? array(':feed_id'=>$params['feed']) : array();
                $oBrand = Brand::model()->findByPk($params['brand']);
                $where[':brand_id'] = $oBrand->id;
                
                # log visitor count
                $session = Yii::app()->session;
                $aRedirectIds = $session['aRedirectIdsBrands'];
                if (!in_array($oBrand->id,(array)$aRedirectIds)){
                    $aRedirectIds[] = $oBrand->id;
                    $session['aRedirectIdsBrands'] = $aRedirectIds;
                    $oBrand->addVisit();
                }
                
                if ($oBrand->is_special){
                    # get banner link
                    $row = Yii::app()->db->createCommand("SELECT * FROM banner WHERE brand_id = :id ORDER BY RAND()")->queryRow(true, array(':id'=>$oBrand->id));
                    return array('url'=>$row['link'],'oBrand'=>$oBrand, 'product_id'=>0);
                } else {
                    # get product
                    $max = Yii::app()->db->createCommand("SELECT MAX(visits) FROM product WHERE brand_id = :brand_id")->queryScalar($where);                

                    if ($max){
                        $koef = $max/yii::app()->params['redirectK'];
                        $where[':koef'] = $koef;
                        
                        $aProducts = Yii::app()->db->createCommand("SELECT id, CEIL(IF(visits>0,visits,1)/:koef) as pop FROM product WHERE brand_id = :brand_id")->queryAll(true,$where);
                        if (!empty($aProducts)){
                            $product_id = $this->calculateTop($aProducts);
                            
                            $model = Product::model()->findByPk($product_id);
                            if (!isset($_GET['w']))
                                $model->addVisit();
                            
                            $url = $model->link;
                            return array('url'=>$url,'oBrand'=>$oBrand, 'product_id'=>$product_id);
                        }
                    } else {
                        // get random product with selected brand
                        //$row = Yii::app()->db->createCommand($sql = "SELECT product_id, link FROM product WHERE brand_id = :brand_id ORDER BY RAND() LIMIT 1")->queryRow(true,$where);
                        $cr = new CDbCriteria();
                        $cr->compare('brand_id', $oBrand->id);
                        $cr->order = 'RAND()';
                        
                        $model = Product::model()->find($cr);
                        if ($model){
                            if (!isset($_GET['w']))
                                $model->addVisit();
                            return array('url'=>$model->link,'oBrand'=>$oBrand, 'product_id'=>$model->id);
                        }
                    }
                }
            }
        }
        
        return false;
    }
    
    public function getRandomProduct(){
        $cnt = Product::model()->count('brand_id <> 0 AND category_id IS NOT NULL');
        
        $position = rand(1, $cnt-1);
        $row = Yii::app()->db->createCommand("SELECT product_id, link, brand_id FROM product WHERE brand_id <> 0 AND category_id IS NOT NULL LIMIT 1 OFFSET ".((int)$position))->queryRow(true);
        
        if ($row){
            $oBrand = Brand::model()->findByPk($row['brand_id']);
            if (!isset($_GET['w'])){
                Product::increasePop($row['product_id']);
            }

            return array('url'=>$row['link'],'oBrand'=>$oBrand, 'product_id'=>$row['product_id']);
        }
        
        return false;       
    }
    
    private function calculateTop(array $ids){
        $db = yii::app()->db;
        $db->createCommand('DROP TEMPORARY TABLE IF EXISTS `tmp_top`')->execute();
        $db->createCommand('CREATE TEMPORARY TABLE `tmp_top` (
                              `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
                              `product_id` INTEGER(11) NOT NULL,
                              PRIMARY KEY (`id`))ENGINE=MyISAM')->execute();
        $vals = array();
        foreach($ids as $id){
            if ($id['pop'] > 1){
                for($i=0;$i<$id['pop'];$i++){
                    $vals[] = "({$id['id']})";
                }
            } else {
                $vals[] = "({$id['id']})";
            }
            
            if (count($vals) > 1000){
                $db->createCommand("INSERT INTO tmp_top (product_id) VALUES ".implode(',',$vals))->execute();
                $vals = array();
            }
        }

        if ($vals)
            $db->createCommand("INSERT INTO tmp_top (product_id) VALUES ".implode(',',$vals))->execute();
            
        $idx = array_rand($ids);
        $product_id = $db->createCommand("SELECT product_id FROM tmp_top LIMIT {$idx},1")->queryScalar();
        
        return $product_id;
    }
    
    public function assign2Category($what, $to){
        $assignSql = 'UPDATE product SET category_id = :category_id WHERE id';
        $deleteSql = 'DELETE FROM product_map WHERE product_id';
        if (is_array($what)){
           foreach($what as $k=>$v) if ($v == 'undefined') unset($what[$k]);
           $assignSql .= ' IN ('.implode(',',$what).')';
           $deleteSql .= ' IN ('.implode(',',$what).')';
        }else{
           $assignSql .= " = ".((int)$what);
           $deleteSql .= " = ".((int)$what);
        }
        
        Yii::app()->db->createCommand($assignSql)->execute(array(':category_id'=>$to));
        Yii::app()->db->createCommand($deleteSql)->execute();
        return true;
    }
}
