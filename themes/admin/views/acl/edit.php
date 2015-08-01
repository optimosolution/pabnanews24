<?php
$this->breadcrumbs = array(
    'Set Access',
);

$this->menu = array(
    array('label' => 'User Groups', 'url' => array('userGroup/admin'), 'active' => true, 'icon' => 'icon-home'),
);

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acl-forms',
    'enableAjaxValidation' => false,
        ));
$getGroup = $_GET['id'];
?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Update Access',
        'size' => 'large', // null, 'large', 'small' or 'mini'
    ));
    ?>
</div>
<?php
$acl_controller = Yii::app()->db->createCommand()
        ->select('*')
        ->from('{{acl_controller}}')
        ->order('controller ASC')
        ->queryAll();
foreach ($acl_controller as $key => $values) {
    print '<div style="font-size:18px;">' . $values["controller"] . '</div>';
    //print '<div class="btn-group" data-toggle="buttons-checkbox" style="padding-bottom:20px;">';
    print '<div style="padding-bottom:20px;">';
    $acl = Yii::app()->db->createCommand()
            ->select('*')
            ->from('{{acl}}')
            ->where('group_id=' . $getGroup . ' AND controller="' . $values["controller"] . '"')
            ->order('controller, actions ASC')
            ->queryAll();
    foreach ($acl as $keys => $valuess) {
        if ($valuess["access"] == 1) {
            //print '<button type="button" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" class="btn btn-primary active">' . $valuess["actions"] . '</button>';
            //print '<input type="hidden" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">';
            print '<span style="padding:0px 10px 0px 10px;"><input type="checkbox" checked="checked" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">&nbsp;' . $valuess["actions"] . '</span>';
        } else {
            //print '<button type="button" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" class="btn btn-primary">' . $valuess["actions"] . '</button>';
            //print '<input type="hidden" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="0">';
            print '<span style="padding:0px 10px 0px 10px;"><input type="checkbox" name="' . $valuess["controller"] . '||' . $valuess["actions"] . '" value="1">&nbsp;' . $valuess["actions"] . '</span>';
        }
    }
    print '</div>';
}
print '<input type="hidden" name="usergroup" value="' . $getGroup . '">';
?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Update Access',
        'size' => 'large', // null, 'large', 'small' or 'mini'
    ));
    ?>
</div>
<?php $this->endWidget(); ?>