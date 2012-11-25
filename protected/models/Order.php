<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property string $id
 * @property string $name
 * @property string $telephone
 * @property string $email
 * @property string $comment
 * @property string $status
 *
 * The followings are the available model relations:
 * @property OrdersProducts[] $ordersProducts
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, telephone', 'required'),
			array('name, email', 'length', 'max'=>255),
			array('telephone', 'length', 'max'=>25),
			array('status', 'length', 'max'=>8),
			array('comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, telephone, email, comment, status', 'safe', 'on'=>'search'),
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
			'ordersProducts' => array(self::HAS_MANY, 'OrderProduct', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '№',
			'name' => 'Имя',
			'telephone' => 'Телефон',
			'email' => 'Email',
			'comment' => 'Комментарий',
			'status' => 'Статус',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getProductList($use_html = true) {
            $orders_list = $this->ordersProducts;
            if(!count($orders_list))
                return 'Нет выбраных товаров';
            $output = '<ol>';
            $res_array = array();
            foreach ($orders_list as $order) {
                $tmp = array(
                    'count' => $order->count,
                    'product' => $order->product,
                    'price' => $order->price
                );
                $res_array[] = $tmp;
                $output.='<li>'.$order->product->title.' ('.$order->count.' шт)'.'</li>';
            }
            $output.='</ol>';
            return $use_html?$output:$res_array;
        }
}