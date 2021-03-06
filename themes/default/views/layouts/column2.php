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
            'items' => array(//4 5 6 7 8 9 10 11
                array('label' => $this->get_menu_name(1), 'url' => array('/site/index')),
                array('label' => ContentCategory::getCategoryName(4), 'url' => array('content/index', 'id' => 4)),
                array('label' => ContentCategory::getCategoryName(5), 'url' => array('content/index', 'id' => 5)),
                array('label' => ContentCategory::getCategoryName(35), 'url' => array('content/index', 'id' => 35)),
                array('label' => ContentCategory::getCategoryName(6), 'url' => array('content/index', 'id' => 6)),
                array('label' => ContentCategory::getCategoryName(36), 'url' => array('content/index', 'id' => 36)),
                array('label' => ContentCategory::getCategoryName(37), 'url' => array('content/index', 'id' => 37)),
                array('label' => ContentCategory::getCategoryName(7), 'url' => array('content/index', 'id' => 7)),
                array('label' => ContentCategory::getCategoryName(8), 'url' => array('content/index', 'id' => 8)),
                array('label' => ContentCategory::getCategoryName(38), 'url' => array('content/index', 'id' => 38)),
                array('label' => ContentCategory::getCategoryName(39), 'url' => array('content/index', 'id' => 39)),
                array('label' => ContentCategory::getCategoryName(9), 'url' => array('content/index', 'id' => 9)),
                array('label' => ContentCategory::getCategoryName(40), 'url' => array('content/index', 'id' => 40)),
                array('label' => ContentCategory::getCategoryName(41), 'url' => array('content/index', 'id' => 41)),
                array('label' => ContentCategory::getCategoryName(10), 'url' => array('content/index', 'id' => 10)),
                array('label' => ContentCategory::getCategoryName(11), 'url' => array('content/index', 'id' => 11)),
                array('label' => ContentCategory::getCategoryName(53), 'url' => array('content/index', 'id' => 53)),
                array('label' => ContentCategory::getCategoryName(54), 'url' => array('content/index', 'id' => 54)),
                array('label' => ContentCategory::getCategoryName(55), 'url' => array('content/index', 'id' => 55)),
                array('label' => ContentCategory::getCategoryName(56), 'url' => array('content/index', 'id' => 56)),
                array('label' => ContentCategory::getCategoryName(57), 'url' => array('content/index', 'id' => 57)),
                array('label' => ContentCategory::getCategoryName(58), 'url' => array('content/index', 'id' => 58)),
                array('label' => ContentCategory::getCategoryName(59), 'url' => array('content/index', 'id' => 59)),
                array('label' => ContentCategory::getCategoryName(60), 'url' => array('content/index', 'id' => 60)),
                array('label' => ContentCategory::getCategoryName(61), 'url' => array('content/index', 'id' => 61)),
                array('label' => ContentCategory::getCategoryName(62), 'url' => array('content/index', 'id' => 62)),
                array('label' => ContentCategory::getCategoryName(63), 'url' => array('content/index', 'id' => 63)),
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
    </div>
</div>
<div class="row-fluid">
    <div class="span3">        
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_latest_news(); ?>   
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fmypabna.com.bd%3Fref%3Dhl&amp;width=270&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:290px;" allowTransparency="true"></iframe>
            </div>
        </div>
    </div>
    <div class="span9">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>