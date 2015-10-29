<div class="row-fluid">
    <div class="span9">
        <div class="row-fluid">
            <div class="span8" style="margin-top: 15px;">
                <div class="chobirsongbad"><?php echo $this->get_menu_name(49); ?></div>
                <?php
//                 $this->widget('bootstrap.widgets.TbCarousel', array(
//                     'displayPrevAndNext' => true,
//                     'items' => array(
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(27), 'label' => Advertisement::getAddTitle(27), 'caption' => Advertisement::getAddDesc(27)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(28), 'label' => Advertisement::getAddTitle(28), 'caption' => Advertisement::getAddDesc(28)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(29), 'label' => Advertisement::getAddTitle(29), 'caption' => Advertisement::getAddDesc(29)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(30), 'label' => Advertisement::getAddTitle(30), 'caption' => Advertisement::getAddDesc(30)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(31), 'label' => Advertisement::getAddTitle(31), 'caption' => Advertisement::getAddDesc(31)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(32), 'label' => Advertisement::getAddTitle(32), 'caption' => Advertisement::getAddDesc(32)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(33), 'label' => Advertisement::getAddTitle(33), 'caption' => Advertisement::getAddDesc(33)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(34), 'label' => Advertisement::getAddTitle(34), 'caption' => Advertisement::getAddDesc(34)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(35), 'label' => Advertisement::getAddTitle(35), 'caption' => Advertisement::getAddDesc(35)),
//                         array('image' => Yii::app()->baseUrl . '/uploads/advertisement/' . Advertisement::getAddImage(36), 'label' => Advertisement::getAddTitle(36), 'caption' => Advertisement::getAddDesc(36)),
//                     ),
//                     'htmlOptions' => array('style' => 'width:570px;'),
//                 ));
                ?>
                <iframe width="570" height="380" src="https://www.youtube.com/embed/W_b6S0Q-sos" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="span4">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1"><?php echo $this->get_menu_name(31); ?></a></li>
                                    <li><a data-toggle="tab" href="#tab2"><?php echo $this->get_menu_name(32); ?></a></li>
                                    <li><a data-toggle="tab" href="#tab3"><?php echo $this->get_category_name(3); ?></a></li>
                                </ul>
                            </div>
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active new_tab_schrol"><?php $this->get_latest_news_home(); ?></div>
                                <div id="tab2" class="tab-pane new_tab_schrol"><?php $this->top_hits_news_home_top(); ?></div>
                                <div id="tab3" class="tab-pane new_tab_schrol"><?php $this->getCategoryNewsList(3); ?></div>
                            </div>                            
                        </div>     
                    </div>
                </div>                
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement(29); ?>
            </div>
        </div>
        <!--        Main New -->
        <div class="row-fluid">
            <div class="span12">
                <?php $this->local_main_news(); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <?php $this->local_main_news1(); ?>
            </div>
            <div class="span4">
                <?php $this->local_main_news2(); ?>
            </div>
            <div class="span4">
                <?php $this->local_main_news3(); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <?php $this->local_main_news4(); ?>
            </div>
            <div class="span4">
                <?php $this->local_main_news5(); ?>
            </div>
            <div class="span4">
                <?php $this->local_main_news6(); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <?php $this->local_main_news44(); ?>
            </div>
            <div class="span4">
                <?php $this->local_main_news55(); ?>
            </div>
            <div class="span4">
                <?php $this->local_main_news66(); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php //$this->local_main_news7(); ?>
            </div>
            <div class="span6">
                <?php //$this->local_main_news8(); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement(2); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <?php $this->get_interviews(20); ?>
                <?php $this->get_interviews_list(20); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(21); ?>
                <?php $this->get_interviews_list(21); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(22); ?>
                <?php $this->get_interviews_list(22); ?>
            </div>
        </div>
        <div class="row-fluid">            
            <div class="span4">
                <?php $this->get_interviews(23); ?>
                <?php $this->get_interviews_list(23); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(24); ?>
                <?php $this->get_interviews_list(24); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(25); ?>
                <?php $this->get_interviews_list(25); ?>
            </div>
        </div>  
        <div class="row-fluid">
            <div class="span4">
                <?php $this->get_interviews(26); ?>
                <?php $this->get_interviews_list(26); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(27); ?>
                <?php $this->get_interviews_list(27); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(28); ?>
                <?php $this->get_interviews_list(28); ?>
            </div>
        </div>  
        <div class="row-fluid">            
            <div class="span4">
                <?php $this->get_interviews(30); ?>
                <?php $this->get_interviews_list(30); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews(33); ?>
                <?php $this->get_interviews_list(33); ?>
            </div>
			<div class="span4">
                <?php $this->get_interviews(34); ?>
                <?php $this->get_interviews_list(34); ?>
            </div>
        </div>   
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement(3); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php $this->get_interviews(15); ?>
                <?php $this->get_interviews_list(15); ?>
            </div>
            <div class="span6">
                <?php $this->get_interviews(16); ?>
                <?php $this->get_interviews_list(16); ?>
            </div>
        </div>        
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement(4); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <?php $this->get_interviews_title(12); ?>
                <?php $this->get_interviews_list(12); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews_title(13); ?>
                <?php $this->get_interviews_list(13); ?>
            </div>
            <div class="span4">
                <?php $this->get_interviews_title(14); ?>
                <?php $this->get_interviews_list(14); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement(5); ?>
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab5"><?php echo $this->get_category_name(17); ?></a></li>
                            <li><a data-toggle="tab" href="#tab6"><?php echo $this->get_category_name(18); ?></a></li>                            
                            <li><a data-toggle="tab" href="#tab16"><?php echo $this->get_category_name(19); ?></a></li>
                        </ul>
                    </div>
                    <div class="widget-content tab-content">
                        <div id="tab5" class="tab-pane active"><?php $this->getCategoryNewsList(17); ?></div>
                        <div id="tab6" class="tab-pane"><?php $this->getCategoryNewsList(18); ?></div> 
                        <div id="tab16" class="tab-pane"><?php $this->getCategoryNewsList(19); ?></div>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(6); ?>
            </div>
        </div>        
        <div class="row-fluid">
            <div class="span12">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fmypabna.com.bd%3Fref%3Dhl&amp;width=270&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:290px;" allowTransparency="true"></iframe>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(32); ?>
            </div>
        </div>
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'poll-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="chobirsongbad"><?php echo $this->get_menu_name(50); ?></div>
                <?php $this->get_poll_title(); ?>                
                <?php echo $form->radioButtonListRow($model, 'poll', array('1' => $this->get_menu_name(51), '2' => $this->get_menu_name(52), '3' => $this->get_menu_name(53)), array('label' => false, 'separator' => '')); ?>                                                               
                <?php echo $form->hiddenField($model, 'poll_id', array('value' => $this->get_poll_id())); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'label' => $this->get_menu_name(54),
                    'type' => '',
                    'htmlOptions' => array('class' => 'span12', 'tabindex' => '1')));
                ?>
            </div>
            <div class="span6">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'link',
                    'label' => $this->get_menu_name(55),
                    'type' => '',
                    'url' => array('/site/poll'),
                    'htmlOptions' => array('class' => 'span12', 'tabindex' => '2')
                ));
                ?>                
            </div>
        </div>
        <?php $this->endWidget(); ?>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(33); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab55"><?php echo $this->get_newslink_category(5); ?></a></li>
                            <li><a data-toggle="tab" href="#tab66"><?php echo $this->get_newslink_category(6); ?></a></li>
                        </ul>
                    </div>
                    <div class="widget-content tab-content">
                        <div id="tab55" class="tab-pane active"><?php $this->getNewsLink(5); ?></div>
                        <div id="tab66" class="tab-pane"><?php $this->getNewsLink(6); ?></div>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(9); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab17"><?php echo $this->get_newslink_category(4); ?></a></li>                            
                            <li><a data-toggle="tab" href="#tab21"><?php echo $this->get_newslink_category(1); ?></a></li>
                            <li><a data-toggle="tab" href="#tab22"><?php echo $this->get_newslink_category(2); ?></a></li>
                        </ul>
                    </div>
                    <div class="widget-content tab-content">
                        <div id="tab17" class="tab-pane active"><?php $this->getNewsLink(4); ?></div> 
                        <div id="tab21" class="tab-pane"><?php $this->getNewsLink(1); ?></div>
                        <div id="tab22" class="tab-pane"><?php $this->getNewsLink(2); ?></div>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(31); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab7"><?php echo $this->get_newslink_category(7); ?></a></li>
                            <li><a data-toggle="tab" href="#tab8"><?php echo $this->get_newslink_category(8); ?></a></li>
                            <li><a data-toggle="tab" href="#tab9"><?php echo $this->get_newslink_category(9); ?></a></li>
                        </ul>
                    </div>
                    <div class="widget-content tab-content">
                        <div id="tab7" class="tab-pane active"><?php $this->getNewsLink(7); ?></div>
                        <div id="tab8" class="tab-pane"><?php $this->getNewsLink(8); ?></div>
                        <div id="tab9" class="tab-pane"><?php $this->getNewsLink(9); ?></div>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(10); ?>
            </div>
        </div>        
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_web_links(); ?>         
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_right(34); ?>
            </div>
        </div>
    </div>
</div>