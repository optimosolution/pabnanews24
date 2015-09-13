<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid date_bg">
    <div class="span3">
<!--        <span class="radio_pabna">Radio Pabna</span>-->
        <!--VosCast.com Flash Player-->
<!--        <script type="text/javascript" src="http://cdn.voscast.com/player/?key=a2ea64246b0d9c9c35508c5bdfdfd644"></script>-->
    </div>
    <div class="span7" style="font-size:14px;">
        <!--VosCast.com SHOUTcast Server Stats-->
<!--        <script type="text/javascript" src="http://cdn.voscast.com/stats/display.js?key=a2ea64246b0d9c9c35508c5bdfdfd644&stats=songtitle"></script>-->
    </div>
    <div class="span2" style="text-align: right; padding-right: 20px; font-size: 20px;">        
        <?php //echo date('l jS \of F Y h:i:s A'); ?> 
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
            'items' => array(
                array('label' => $this->get_menu_name(1), 'url' => array('/site/index')),
                array('label' => $this->get_menu_name(20), 'url' => array('content/index', 'id' => 20)),
                array('label' => $this->get_menu_name(21), 'url' => array('content/index', 'id' => 21)),
                array('label' => $this->get_menu_name(22), 'url' => array('content/index', 'id' => 22)),
                array('label' => $this->get_menu_name(23), 'url' => array('content/index', 'id' => 23)),
                array('label' => $this->get_menu_name(24), 'url' => array('content/index', 'id' => 24)),
                array('label' => $this->get_menu_name(25), 'url' => array('content/index', 'id' => 25)),
                array('label' => $this->get_menu_name(26), 'url' => array('content/index', 'id' => 26)),
                array('label' => $this->get_menu_name(27), 'url' => array('content/index', 'id' => 27)),
                array('label' => $this->get_menu_name(28), 'url' => array('content/index', 'id' => 28)),
                array('label' => $this->get_menu_name(47), 'url' => array('content/index', 'id' => 30)),
                array('label' => $this->get_menu_name(57), 'url' => array('content/index', 'id' => 33)),
                //array('label' => $this->get_menu_name(3), 'url' => array('content/index', 'id' => 29)),
                //array('label' => $this->get_menu_name(11), 'url' => array('content/index', 'id' => 32)),
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
