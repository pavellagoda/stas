<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'main';
    public $breadcrumbs = array();

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    public function init()
    {
        Yii::app()->clientScript->registerCssFile('/bootstrap/css/bootstrap.css', 'screen, projection');
        $cartCount = Cart::getCountElements();
        $this->menu = array(
            array('label' => 'Главная', 'url' => $this->createUrl('/')),
            array('label' => 'О нас', 'url' => $this->createUrl('/about')),
            array('label' => 'Контакты', 'url' => $this->createUrl('/contatcs')),
            array('label' => 'Корзина('.$cartCount.')', 'url' => $this->createUrl('/cart'), 'itemOptions' => array('class' => 'cart')),
        );
    }

}