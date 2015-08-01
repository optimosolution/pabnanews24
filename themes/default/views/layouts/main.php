<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta name="author" content="S.M. Saidur Rahman">
        <meta name="generator" content="Optimo Solution" />
        <?php Yii::app()->bootstrap->register(); ?>
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/unicorn.main.css" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title> 
        <?php //$this->widget('ext.widgets.googleAnalytics.EGoogleAnalyticsWidget', array('account' => 'WW-DDDDDDD-DD', 'domainName' => '.example.com')); ?>
    </head>
    <body>                
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <?php echo $content; ?>
                </div>
            </div> 
        </div>
        <div class="container" style="padding: 0px;">
            <div class="row-fluid">
                <div class="span12">
                    <div class="hrline_top">&nbsp;</div>
                    <div class="hrline">&nbsp;</div>
                    <?php
                    $this->widget('bootstrap.widgets.TbMenu', array(
                        'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
                        'stacked' => false, // whether this is a stacked menu
                        'items' => array(
                            array('label' => $this->get_menu_name(35), 'url' => array('content/view', 'id' => 141)),
                            //array('label' => $this->get_menu_name(36), 'url' => array('content/view', 'id' => 144)),
                            //array('label' => $this->get_menu_name(37), 'url' => array('content/view', 'id' => 145)),
                            //array('label' => $this->get_menu_name(39), 'url' => array('')),
                            //array('label' => $this->get_menu_name(38), 'url' => array('/weblink/index')),
                            array('label' => $this->get_menu_name(44), 'url' => array('content/view', 'id' => 148)),
                            array('label' => $this->get_menu_name(43), 'url' => array('content/view', 'id' => 147)),
                            array('label' => $this->get_menu_name(40), 'url' => array('content/view', 'id' => 146)),
                            array('label' => $this->get_menu_name(45), 'url' => array('/site/contact')),
                        //array('label' => $this->get_menu_name(46), 'url' => array('content/view', 'id' => 149)),
                        ),
                        'htmlOptions' => array('style' => 'font-size:18px;height:20px;margin-left:245px'),
                    ));
                    ?>
                    <div class="hrline">&nbsp;</div>
                    <div class="row-fluid">
                        <div class="span12" style="font-size:16px;line-height:25px;text-align:center;margin-bottom:10px;">
                            <?php echo $this->get_menu_name(42); ?>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="copyright_text">Publication: HeyDay Creative Group, Bangladesh. &nbsp;&nbsp;Developed by: <a href="http://www.optimosolution.com" target="_blank">Optimo Solution</a>, Bangladesh.</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>