<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'bootstrap';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */

    public function init() {
        Yii::app()->clientScript->registerScriptFile('/js/tiny_mce/tiny_mce.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile('/js/texteditor.js', CClientScript::POS_HEAD);
    }


}