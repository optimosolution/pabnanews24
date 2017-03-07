<?php
$this->pageTitle = $model->title . '-' . Yii::app()->name;
$this->breadcrumbs = array(
    //$this->get_category_name($model->catid) => array('/content/index', 'id' => $model->catid),
    $model->title,
);
//print date("Y-m-d, G:i:s");
?>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=252780244860590";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
    <a class="addthis_button_preferred_1"></a>
    <a class="addthis_button_preferred_2"></a>
    <a class="addthis_button_preferred_3"></a>
    <a class="addthis_button_preferred_4"></a>
    <a class="addthis_button_compact"></a>
    <a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar": true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51c72b3b6653178f"></script>
<!-- AddThis Button END -->
<h2><?php echo $model->title; ?></h2>
<p>
<?php //echo date("F j, Y, g:i A", strtotime($model->created));  ?>
    <?php echo Content::get_date_time($model->created); ?>
</p>
<p>
<?php echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $model->profile_picture, $model->title, array('title' => $model->title, 'alt' => $model->title)); ?>
</p>
<p><?php echo $model->introtext; ?></p>
<p><?php echo $model->fulltext; ?></p>
<p>
<div class="fb-comments" data-href="<?php echo 'http://www.pabnanews24.com/' . Yii::app()->request->url; ?>" data-width="850" data-num-posts="10"></div>
</p>
