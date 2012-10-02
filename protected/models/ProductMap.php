<?php

/**
 * This is the model class for table "product_map".
 *
 * The followings are the available columns in table 'product_map':
 * @property integer $category_id
 * @property integer $product_id
 * @property integer $priority
 */
class ProductMap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductMap the static model class
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
		return 'product_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, product_id', 'required'),
			array('category_id, product_id, priority', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, product_id, priority', 'safe'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'Category',
			'product_id' => 'Product',
			'priority' => 'Priority',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('priority',$this->priority);

		return new CActiveDataProvider('ProductMap', array(
			'criteria'=>$criteria,
		));
	}
	
	public function processMapping(){
		$productsLimit = 500;
		
		$db = Yii::app()->db;
		$aCategories = Category::model()->findAll('scan_time IS NULL');
		if ($aCategories){
			# scan products
			
			foreach ($aCategories as $num=>$category) {
				echo (count($aCategories)-$num)."\t".date('Y-m-d H:i:s')."\t".$category->title.PHP_EOL;
				$aWords = $category->words;
				if ($aWords){
					$aWhere = $aWhere1 = $aWhere2 = $aWhere3 = array();
					$words = CHtml::listData($aWords, 'id', 'word');
					foreach ($words as $word){
                        if (strpos($word, '+') !== false){
                            $word = preg_replace('/[\s]*\+[\s]*/i', ' y ', $word);
                        }
                        
                        $aWhere[$category->id.'_'.$category->country][1][] = 'category_term like "%'.str_replace(array(' ','-'), '%', $word).'%"';
                        $aWhere[$category->id.'_'.$category->country][2][] = sprintf('title rlike "([a-zA-Z0-9]+)[-]{0,1}%s([ ,]+|$)"',$word);
                        $aWhere[$category->id.'_'.$category->country][2][] = sprintf('title rlike "([ ]+|^)%s([ ]+)(mit|with)[ ]+"',$word);
                        $aWhere[$category->id.'_'.$category->country][2][] = sprintf('title rlike "([a-zA-Z0-9]+)-%s-Set([ ,]+|$)"',$word);
                        $aWhere[$category->id.'_'.$category->country][2][] = sprintf('title rlike "([ ]+|^)%s-Set([ ,]+|$)"',$word);
                        
                        $aWhere[$category->id.'_'.$category->country][3][] = sprintf('title rlike "([ ]+|^)%s([,]+|$)"',$word);
						$aWhere[$category->id.'_'.$category->country][3][] = sprintf('title rlike "([ ]+|^)%s([ ]+|$)"',$word);
                        
//                        $aWhere1 = 'category_term like "%'.str_replace(array(' ','-'), '%', $word).'%"';
//                        $aWhere2[] = sprintf('title rlike "([a-zA-Z0-9]+)[-]{0,1}%s([ ,]+|$)"',$word);
//                        $aWhere2[] = sprintf('title rlike "([ ]+|^)%s([ ]+)(mit|with)[ ]+"',$word);
//                        $aWhere2[] = sprintf('title rlike "([a-zA-Z0-9]+)-%s-Set([ ,]+|$)"',$word);
//                        $aWhere2[] = sprintf('title rlike "([ ]+|^)%s-Set([ ,]+|$)"',$word);
//						$aWhere3[] = sprintf('title rlike "([ ]+|^)%s([,]+|$)"',$word);
//						$aWhere3[] = sprintf('title rlike "([ ]+|^)%s([ ]+|$)"',$word);

					}
                    
                    
                    
                    $totalProducts = Product::model()->count();
                    $blockSize = 5000;
                    $pages = $totalProducts > $blockSize ? ceil($totalProducts/$blockSize) : 1;
                    $db->createCommand('CREATE TABLE IF NOT EXISTS product_temp LIKE product')->execute();
                    
                    for($i=0; $i<$pages; $i++){
                        $db->createCommand('TRUNCATE product_temp')->execute();
                        $db->createCommand('INSERT INTO product_temp (SELECT * FROM product LIMIT '.$blockSize.' OFFSET '.($i*$blockSize).')')->execute();
                        
                        foreach($aWhere as $key=>$aPriorities){
                            list($cid, $geo) = explode('_', $key);
                            foreach($aPriorities as $p=>$where){
                                $validRowsCnt = $db->createCommand('SELECT COUNT(*) FROM product_temp WHERE category_id IS NULL')->queryScalar();
                                echo '$validRowsCnt:'.$validRowsCnt.PHP_EOL;
                                
                                if (empty($validRowsCnt))
                                    break 2;
                                
                                $chunks = array_chunk($where, 10);
                                foreach($chunks as $wordsConditions){
                                    while(true){
                                        if (in_array($geo, array('uk','us', 'en'))){
                                            $sql = 'SELECT id FROM product_temp WHERE country IN ("uk","us") AND category_id IS NULL AND ( '.implode(' OR ', $wordsConditions).') LIMIT '.$productsLimit;
                                            $IDs = $db->createCommand($sql)->queryColumn();
                                        } else{
                                            $sql = 'SELECT id FROM product_temp WHERE country = :geo AND category_id IS NULL AND ( '.implode(' OR ', $wordsConditions).') LIMIT '.$productsLimit;
                                            $IDs = $db->createCommand($sql)->queryColumn(array(':geo'=>$geo));
                                        }
                                        if ($category->id == 4){
                                            echo $sql.PHP_EOL;
                                            echo $geo.PHP_EOL;
                                            echo count($IDs).PHP_EOL;
                                        }
                                        //echo $sql.PHP_EOL;
                                        //echo $geo.PHP_EOL;
                                        //echo count($IDs).PHP_EOL;
                                        if ($IDs){
                                            $aParam = array(':category_id'=>$cid);
                                            $aVal = array();
                                            foreach ($IDs as $k=>$id){
                                                $aParam[":id$k"]=$id;
                                                $aVal[] = "(:category_id, :id$k, {$p})";
                                            }
                                            if ($aVal){
                                                $db->createCommand("INSERT IGNORE INTO product_map VALUES ".implode(',', $aVal))->execute($aParam);
                                                $db->createCommand("UPDATE product_temp SET category_id = 0 WHERE id IN (".implode(',',$IDs).")")->execute();
                                            }
                                        } else break;
                                    }
                                    
                                }
                                
                            }
                        }
                        
                        //if ($category->id == 4) exit;
                    }
                    
                    $db->createCommand('DROP TABLE product_temp')->execute();
                    
					//$db->createCommand("UPDATE product SET category_id = NULL WHERE category_id = 0")->execute();
                    $category->scan_time = new CDbExpression('NOW()');
					//$category->update(array('scan_time'));
				}
			}
			
			$this->assignProducts();
		} else {
			# if we have all categories with filled scan time, it means that the products were scaned for all categories
			$this->assignProducts(); 
		}
	}
	
	public function assignProducts(){
		dump('assignProducts execution');
		$db = Yii::app()->db;
		if (self::model()->count()){
			# assign all procts with single mapped category_id
			$db->createCommand("
				UPDATE product p
			    INNER JOIN (SELECT * FROM product_map GROUP BY product_id HAVING COUNT(product_id) = 1) as pm
				    ON pm.product_id = p.id
				SET p.category_id = pm.category_id 
			")->execute();
			
			# remove updated ids from map products
			$db->createCommand('CREATE TEMPORARY TABLE IF NOT EXISTS tmp_product_map like product_map;')->execute();
			$db->createCommand("insert into tmp_product_map select * from product_map pm group by pm.product_id having count(pm.product_id) = 1")->execute();
			
			$cnt = $db->createCommand("SELECT COUNT(*) from tmp_product_map")->queryScalar();
			dump($cnt);
			if ($cnt){
				$limit = 1000;
				$repeats = $cnt > $limit ? ceil($cnt / $limit) : 1;
				for($i=0;$i<$repeats;$i++){
					$offset = $i * $limit;
					$ids = $db->createCommand("select product_id from tmp_product_map LIMIT $limit OFFSET $offset")->queryColumn();
					if ($ids)
					   $db->createCommand("DELETE from product_map where product_id in (".implode(',',$ids).")")->execute();					
				}
			}
			$db->createCommand('DROP TEMPORARY TABLE IF EXISTS tmp_product_map;')->execute();

			# find all duplicated products and define if we have only one category with priority = 1 (this means that this category is a major)
			$cntMap = $db->createCommand("SELECT COUNT(*) from product_map")->queryScalar();
			if ($cntMap){
				$limit = 2000;
				$repeats = $cntMap > $limit ? ceil($cntMap / $limit) : 1;
				$pIds = $idsToUpdate = array();
				dump($repeats);
			    for($i=0;$i<$repeats;$i++){
                    $offset = $i * $limit;
                    $aProducts = $db->createCommand("SELECT * from product_map ORDER BY product_id, priority LIMIT $limit OFFSET $offset")->queryAll();
                    if ($aProducts){
                    	foreach($aProducts as $product){
                    		$pIds[$product['product_id']][$product['priority']] = $product['category_id'];
                    	}
                    } else break;
                }
                
                if ($pIds){
                	foreach($pIds as $pid=>$aCats){
                		if (isset($aCats['1']) && count($aCats['1']) == 1){
                			$cid = $aCats['1'][0];
                			$idsToUpdate[$cid][] = $pid;
                		} else if (isset($aCats['2']) && count($aCats['2']) == 1){
                            $cid = $aCats['2'][0];
                			$idsToUpdate[$cid][] = $pid;
                        }
                	}
                	
                	if ($idsToUpdate){
                		foreach($idsToUpdate as $cid => $pids){
                			$db->createCommand("UPDATE product SET category_id = {$cid} WHERE id IN (".implode(',',$pids).")")->execute();
                			dump($db->createCommand("DELETE FROM product_map WHERE product_id IN (".implode(',',$pids).")")->execute());
                		}
                	}
                }
			}
			echo date('Y-m-d H:i:s');
			
			#$db->createCommand()->execute();
		}
	}
	
	
}
