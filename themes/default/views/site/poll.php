<?php

$this->pageTitle = Yii::app()->name . ' - Poll';
$this->breadcrumbs = array(
    'Poll',
);

function get_total_vote($id) {
    $value = Yii::app()->db->createCommand()
            ->select('(yes+no+no_comments) AS total')
            ->from('{{poll}}')
            ->where('id=' . $id)
            ->queryScalar();
    return $value;
}

function get_percentage_yes($id) {
    $total = get_total_vote($id);
    $value = Yii::app()->db->createCommand()
            ->select('yes')
            ->from('{{poll}}')
            ->where('id=' . $id)
            ->queryScalar();
    $get_per = ($value / $total * 100);
    return $get_per;
}

function get_percentage_no($id) {
    $total = get_total_vote($id);
    $value = Yii::app()->db->createCommand()
            ->select('no')
            ->from('{{poll}}')
            ->where('id=' . $id)
            ->queryScalar();
    $get_per = ($value / $total * 100);
    return $get_per;
}

function get_percentage_nocomments($id) {
    $total = get_total_vote($id);
    $value = Yii::app()->db->createCommand()
            ->select('no_comments')
            ->from('{{poll}}')
            ->where('id=' . $id)
            ->queryScalar();
    $get_per = ($value / $total * 100);
    return $get_per;
}

$array = Yii::app()->db->createCommand()
        ->select('*')
        ->from('{{poll}}')
        //->where('published=1')
        ->limit('20')
        ->order('created_on DESC, id DESC')
        ->queryAll();
foreach ($array as $key => $values) {
    echo '<h2>' . $values['title'] . '</h2>';
    echo '<ul>';
    echo '<li style="line-height:35px;"><span style="margin-right:20px;padding:5px;background-color:green;height:30px;width:' . get_percentage_yes($values['id']) . 'px">' . round(get_percentage_yes($values['id']),2) . '%</span>' . $this->get_menu_name(51) . ' ' . $values['yes'] . '</li>';
    echo '<li style="line-height:35px;"><span style="margin-right:20px;padding:5px;background-color:red;height:30px;width:' . get_percentage_no($values['id']) . 'px">'.round(get_percentage_no($values['id']),2).'%</span>' . $this->get_menu_name(52) . ' ' . $values['no'] . '</li>';
    echo '<li style="line-height:35px;"><span style="margin-right:20px;padding:5px;background-color:#555555;height:30px;width:' . get_percentage_nocomments($values['id']) . 'px">'.round(get_percentage_nocomments($values['id']),2).'%</span>' . $this->get_menu_name(53) . ' ' . $values['no_comments'] . '</li>';
    echo '</ul>';
}
?>