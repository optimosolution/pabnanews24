<div class="view" style="clear: both;">
    <?php echo '<h2>' . CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)) . '</h2>'; ?>
    <p>
        <?php
        if ($data->profile_picture) {
            echo CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $data->profile_picture, $data->title, array("width" => 150, 'title' => $data->title, 'style' => 'float:left; margin:10px;'));
        }
        echo $this->text_cut(htmlspecialchars_decode(CHtml::encode($data->introtext)), 1500);
        ?>
    </p>
</div>