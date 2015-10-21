<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid date_bg">
    <div class="span3">
<!--        <span class="radio_pabna">Radio Pabna</span>-->
        <!--VosCast.com Flash Player-->
<!--        <script type="text/javascript" src="http://cdn.voscast.com/player/?key=a2ea64246b0d9c9c35508c5bdfdfd644"></script>-->
    </div>
    <div class="span4" style="font-size:14px;">
        <!--VosCast.com SHOUTcast Server Stats-->
<!--        <script type="text/javascript" src="http://cdn.voscast.com/stats/display.js?key=a2ea64246b0d9c9c35508c5bdfdfd644&stats=songtitle"></script>-->
    </div>
    <div class="span5" style="text-align: right; padding-right: 20px; font-size: 20px;">        
        <?php echo date('l jS \of F Y'); ?>, 
        <?php
        $bn = new BanglaDate(time(), 0);
        $bdt = $bn->get_date();
        $text = sprintf('%s', implode(' ', $bdt));
        echo $text;
        ?>       
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php
        $this->widget('bootstrap.widgets.TbCarousel', array(
            'displayPrevAndNext' => false,
            'items' => array(
                array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(45), 'label' => '', 'caption' => ''),
            ),
            'htmlOptions' => array('style' => 'width:1170px;'),
        ));
        ?>
        <?php //echo CHtml::image(Yii::app()->baseUrl . '/images/banner2.jpg', 'Banner', array('title' => 'Banner', 'alt' => 'Banner', 'width' => '1170')); ?>
        <div class="hrline_top" style="margin-bottom: 10px;">&nbsp;</div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div style="float: left; width: 110px;">
            <span class="marquee_news_title"><?php echo $this->get_menu_name(48); ?></span>
        </div>
        <div style="float: left; width: 1030px;">
            <marquee behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()"><?php $this->get_marquee_news(); ?></marquee>
        </div>            
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="hrline_top">&nbsp;</div>
        <div class="hrline">&nbsp;</div>        
        <?php
        $this->widget('bootstrap.widgets.TbMenu', array(
            'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
            'stacked' => false, // whether this is a stacked menu
            'items' => array( //4 5 6 7 8 9 10 11
                array('label' => $this->get_menu_name(1), 'url' => array('/site/index')),
                array('label' => ContentCategory::getCategoryName(4), 'url' => array('content/index', 'id' => 4)),
                array('label' => ContentCategory::getCategoryName(5), 'url' => array('content/index', 'id' => 5)),
                array('label' => ContentCategory::getCategoryName(6), 'url' => array('content/index', 'id' => 6)),
                array('label' => ContentCategory::getCategoryName(7), 'url' => array('content/index', 'id' => 7)),
                array('label' => ContentCategory::getCategoryName(8), 'url' => array('content/index', 'id' => 8)),
                array('label' => ContentCategory::getCategoryName(9), 'url' => array('content/index', 'id' => 9)),
                array('label' => ContentCategory::getCategoryName(10), 'url' => array('content/index', 'id' => 10)),
                array('label' => ContentCategory::getCategoryName(11), 'url' => array('content/index', 'id' => 11)),
            ),
            'htmlOptions' => array('style' => 'font-size:16px;height:20px;'),
        ));
        ?>
        <div class="hrline">&nbsp;</div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
            ?>
        <?php endif ?> 
        <?php
        $this->widget('bootstrap.widgets.TbAlert', array(
            'block' => true,
            'fade' => true,
            'closeText' => '&times;',
        ));
        ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>
