<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" rel="stylesheet">
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a>
                    <div class="nav-collapse">

                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array('label' => 'Главная', 'url' => array('/admin'), 'active' => $this->id == 'default'),
                                array('label' => 'Управление производителями', 'url' => $this->createUrl('firm/'), 'active' => $this->id == 'firm'),
                                array('label' => 'Управление товарами', 'url' => $this->createUrl('product/'), 'active' => $this->id == 'product'),
                                array('label' => 'Управление заказами', 'url' => $this->createUrl('order/'), 'active' => $this->id == 'order'),
                                array('label' => 'Статистика', 'url' => $this->createUrl('statistic/'), 'active' => $this->id == 'statistic'),
                                array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'url' => array('/admin/default/logout'), 'visible' => !Yii::app()->user->isGuest)
                            ),
                            'htmlOptions' => array(
                                'class' => 'nav'
                            )
                        ));
                        ?>
                        <p class="navbar-text pull-right">
                            <a href="/">На сайт</a>
                        </p>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'htmlOptions' => array(
                        'class' => 'breadcrumb'
                    ),
                    'homeLink' => false
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
            <div class="subnav">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array(
                        'class' => 'nav nav-pills'
                    )
                ));
                ?>
            </div>
            <?php echo $content; ?>

        </div> <!-- /container -->
        <script type="text/javascript" src="/bootstrap/js/bootstrap-tooltip.js" ></script>
    </body>
</html>
