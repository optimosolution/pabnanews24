<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $userData;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'application.views.layouts.column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init() {
        /*
          //if you want to use reflection
          $reflection = new ReflectionClass('scholarshipController');
          $methods = $reflection->getMethods();
          //uncomment this if you want to get the class methods with more details
          print "<pre>";
          print_r($methods);
          print "</pre>";
          //uncomment this if you want to get the class methods
          //print_r(get_class_methods($class));

         */
//Yii::app()->theme = Yii::app()->user->getCurrentTheme();
//Yii::app()->theme = 'teacher';
//parent::init();
    }

    public function firstNwords($str, $n) {
        return preg_replace('/((\b\w+\b.*?){' . $n . '}).*$/s', '$1', $str);
    }

    public function get_static_content($content_id) {
        $value = Yii::app()->db->createCommand()
                ->select('introtext')
                ->from('{{content}}')
                ->where('id=' . $content_id)
                ->queryScalar();
        return $value;
    }

    public function get_category_name($id) {
        $value = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{content_category}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function featured_news_home() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('featured=1 AND state=1')
                ->limit('2')
                ->order('created DESC, id DESC')
                ->queryAll();
        $oDbConnection = Yii::app()->db;
        $oCommand = $oDbConnection->createCommand('SELECT id, title FROM {{content}} WHERE featured=1 AND state = 1 ORDER BY created DESC, id DESC LIMIT 2,3');
        $oCDbDataReader = $oCommand->queryAll();

        foreach ($array as $key => $values) {
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<span style="float:left; margin:5px;">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 80, "height" => 70, 'title' => $values['title'])) . '</span>';
            echo '<span>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($values["introtext"]))), 400) . '</span>';
        }

        echo '<ul>';
        foreach ($oCDbDataReader as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function latest_news_home() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('state=1')
                ->limit('2')
                ->order('created DESC, id DESC')
                ->queryAll();
        $oDbConnection = Yii::app()->db;
        $oCommand = $oDbConnection->createCommand('SELECT id, title FROM {{content}} WHERE state = 1 ORDER BY created DESC, id DESC LIMIT 2,3');
        $oCDbDataReader = $oCommand->queryAll();

        foreach ($array as $key => $values) {
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<span style="float:left; margin:5px;">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 80, "height" => 70, 'title' => $values['title'])) . '</span>';
            echo '<span>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($values["introtext"]))), 400) . '</span>';
        }

        echo '<ul>';
        foreach ($oCDbDataReader as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function get_categories($parent_id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content_category}}')
                ->where('parent_id=' . $parent_id . ' AND published=1 ')
                ->order('title ASC')
                ->queryAll();
        echo '<table class="table table-bordered table-striped table-hover">';
        echo '<tbody>';
        foreach ($rValue as $key => $values) {
            echo '<tr>';
            echo '<td>';
            echo CHtml::link($values["title"], array('content/category', 'id' => $values["id"]), array());
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    public function strip_html_tags($text) {
        $text = preg_replace(
                array(
            // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
            // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
                ), array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
                ), $text);
        return strip_tags($text);
    }

    public function text_cut($text, $length = 200, $dots = true) {
        $text = trim(preg_replace('#[\s\n\r\t]{2,}#', ' ', $text));
        $text_temp = $text;
        while (substr($text, $length, 1) != " ") {
            $length++;
            if ($length > strlen($text)) {
                break;
            }
        }
        $text = substr($text, 0, $length);
        return $text . ( ( $dots == true && $text != '' && strlen($text_temp) > $length ) ? '...' : '');
    }

    public function get_news_by_category_home($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('catid=' . $catid . ' AND state=1 ')
                ->limit('1')
                ->order('created DESC, id DESC')
                ->queryAll();

        $oDbConnection = Yii::app()->db;
        $oCommand = $oDbConnection->createCommand('SELECT id, title FROM {{content}} WHERE state = 1 AND catid=' . $catid . ' ORDER BY created DESC, id DESC LIMIT 1,10');
        $oCDbDataReader = $oCommand->queryAll();

        echo '<h3 style="border-bottom:2px solid #999;">' . CHtml::link($this->get_category_name($catid), array('content/index', 'id' => $catid), array('class' => '', 'target' => '_blank')) . '</h3>';

        foreach ($array as $key => $values) {
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<p><span style="float:left; margin:5px;">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 80, "height" => 70, 'title' => $values['title'])) . '</span>';
            echo '<span>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($values["introtext"]))), 400) . '</span></p>';
        }

        echo '<ul>';
        foreach ($oCDbDataReader as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function getCategoryNewsImage($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('catid=' . $catid . ' AND state=1')
                ->limit('5')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="category_news">' . CHtml::link($this->get_category_name($catid), array('/content/index', 'id' => $catid), array('class' => '', 'target' => '_blank')) . '</h3>';
        foreach ($array as $key => $values) {
            echo '<div style="clear:both;">' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<p><span style="float:left; margin:5px;">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 80, "height" => 70, 'title' => $values['title'])) . '...</span>';
            echo '<span>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($values["introtext"]))), 600) . '...</span></p>';
        }
    }

    public function getCategoryNews($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('catid=' . $catid . ' AND state=1')
                ->limit('3')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="category_news">' . CHtml::link($this->get_category_name($catid), array('/content/index', 'id' => $catid), array('class' => '', 'target' => '_blank')) . '</h3>';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function getPressNews($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('catid=' . $catid . ' AND state=1')
                ->limit('15')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="category_news">' . CHtml::link($this->get_category_name($catid), array('/content/index', 'id' => $catid), array('class' => '', 'target' => '_blank')) . '</h3>';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function getCategoryNewsList($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('catid=' . $catid . ' AND state=1')
                ->limit('5')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function get_advertisement($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{advertisement}}')
                ->where('category_id=' . $catid)
                //->limit('1')
                ->order('ordering ASC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            echo CHtml::image(Yii::app()->baseUrl . '/uploads/advertisement/' . $values['picture'], $values['title'], array("width" => 870, 'title' => $values['title']));
            echo '</div>';
        }
    }

    public function get_advertisement_right($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{advertisement}}')
                ->where('category_id=' . $catid)
                //->limit('1')
                ->order('ordering ASC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            echo CHtml::image(Yii::app()->baseUrl . '/uploads/advertisement/' . $values['picture'], $values['title'], array("width" => 270, 'title' => $values['title']));
            echo '</div>';
        }
    }

    public function get_latest_news_home() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('state=1 AND catid!=1')
                ->limit('10')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank'));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_latest_news() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('state=1 AND catid!=1')
                ->limit('10')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="local_main_news">' . $this->get_menu_name(31) . '</h3>';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank'));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function top_hits_news_home_top() {
        $date = new DateTime('7 days ago');
        $pre_sev = $date->format('Y-m-d');

        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('created >=' . $pre_sev . ' AND state=1')
                ->limit('10')
                ->order('hits DESC, id DESC')
                ->queryAll();
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'home_news', 'target' => '_blank'));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_menu_name($id) {
        $value = Yii::app()->db->createCommand()
                ->select('nemu_name')
                ->from('{{menu}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function get_max_hits_news() {
        $date = new DateTime('7 days ago');
        $pre_sev = $date->format('Y-m-d');

        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('created >=' . $pre_sev . ' AND state=1 AND catid IN (25,27,28,31,32,34,35,36,37,38,40,41,42,43,44,46,52,56,58,67,71,73,85)')
                ->limit('15')
                ->order('hits DESC, id DESC')
                ->queryAll();
        echo '<ul class="nav nav-tabs nav-stacked">';
        echo '<li style="font-size:20px; line-height:40px;">' . $this->get_menu_name(47) . '</li>';
        foreach ($array as $key => $values) {
            echo '<li>';
            echo CHtml::link($values['title'], array('/content/view', 'id' => $values['id']));
            echo '</li>';
        }
        echo '</ul>';
    }

    public function local_main_news() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('state=1 AND catid=2')
                ->limit('1')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="local_main_news">' . CHtml::link($this->get_category_name(2), array('/content/index', 'id' => 2), array('style' => 'color:#000;font-size:32px;text-decoration:none;', 'target' => '_blank')) . '</h3>';
        foreach ($array as $key => $values) {
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news', 'target' => '_blank')) . '</div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<div class="row-fluid">';
            echo '<div class="span6">';
            echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 415, 'title' => $values['title'])) . '</div>';
            echo '</div>';
            echo '<div class="span6">';
            echo '<span>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($values["introtext"]))), 2000) . '</span>';
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => $this->get_menu_name(58),
                'type' => 'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'mini', // null, 'large', 'small' or 'mini'
                'buttonType' => 'link',
                'icon' => 'icon-share-alt',
                'url' => array('/content/view', 'id' => $values['id']),
                'htmlOptions' => array('style' => 'margin:10px 0px 0px 350px;'),
            ));
            echo '</div>';
            echo '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news1() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 1,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news2() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 2,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news3() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 3,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news4() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 4,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news5() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 5,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news6() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 6,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</span></div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news44() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 7,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</span></div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news55() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 8,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</span></div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news66() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 9,1')->queryAll();
        foreach ($array as $key => $values) {
            if (empty($values["profile_picture"])) {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.png', $values['title'], array("width" => 260, 'title' => $values['title'])) . '</div>';
            } else {
                echo '<div class="thumbnail">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 260, 'title' => $values['title'])) . '</span></div>';
            }
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news2', 'target' => '_blank')) . '</div>';
        }
        echo '<div style="line-height:10px;">&nbsp;</div>';
    }

    public function local_main_news7() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 10,5')->queryAll();
        print '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</li>';
        }
        print '</ul>';
    }

    public function local_main_news8() {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=2 ORDER BY created DESC, id DESC LIMIT 15,5')->queryAll();
        print '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</li>';
        }
        print '</ul>';
    }

    public function get_interviews($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid)
                ->limit('1')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="category_news">' . CHtml::link($this->get_category_name($catid), array('/content/index', 'id' => $catid), array('class' => '', 'target' => '_blank')) . '</h3>';
        foreach ($array as $key => $values) {
            echo '<div class="thumbnail"><span style="margin:5px;">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 370, 'title' => $values['title'])) . '</span></div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news', 'target' => '_blank')) . '</div>';
            //echo '<div><span>' . $this->text_cut(htmlspecialchars_decode(CHtml::encode($this->strip_html_tags($values["introtext"]))), 1500) . '</span></div>';
        }
    }

    public function get_interviews_title($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid)
                ->limit('1')
                ->order('created DESC, id DESC')
                ->queryAll();
        echo '<h3 class="category_news">' . CHtml::link($this->get_category_name($catid), array('/content/index', 'id' => $catid), array('class' => '', 'target' => '_blank')) . '</h3>';
        foreach ($array as $key => $values) {
            echo '<div class="thumbnail"><span style="margin:5px;">' . CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values["profile_picture"], $values['title'], array("width" => 270, 'title' => $values['title'])) . '</span></div>';
            echo '<div class="hr_border">&nbsp;</div>';
            echo '<div>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'local_news', 'target' => '_blank')) . '</div>';
        }
    }

    public function get_interviews_list($catid) {
        $array = Yii::app()->db->createCommand('SELECT id,title,profile_picture,introtext FROM {{content}} WHERE state=1 AND catid=' . $catid . ' ORDER BY created DESC, id DESC LIMIT 1,3')->queryAll();
        print '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], array('content/view', 'id' => $values['id']), array('class' => 'home_top_news', 'target' => '_blank')) . '</li>';
        }
        print '</ul>';
    }

    public function get_advertisement_long($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{advertisement}}')
                ->where('category_id=' . $catid)
                //->limit('1')
                ->order('ordering ASC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            echo CHtml::image(Yii::app()->baseUrl . '/uploads/advertisement/' . $values['picture'], $values['title'], array("width" => 870, 'title' => $values['title']));
            echo '</div>';
        }
    }

    public function get_marquee_news() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title')
                ->from('{{content}}')
                ->where('state=1 AND catid=31')
                ->limit('20')
                ->order('created DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo '<span>';
            echo CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'home_marquee_news', 'target' => '_blank'));
            echo '</span>';
            echo '<span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>';
        }
    }

    public function get_web_links() {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{weblink}}')
                ->where('published=1')
                ->limit('10')
                ->order('rand()')
                ->queryAll();
        echo'<div class="chobirsongbad">' . $this->get_menu_name(38) . '</div>';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], $values['click_url'], array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

    public function get_poll_title() {
        $value = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{poll}}')
                ->where('published=1')
                ->order('created_on DESC')
                ->limit('1')
                ->queryScalar();
        echo '<p style="font-size:18px;">' . $value . '</p>';
    }

    public function get_poll_id() {
        $value = Yii::app()->db->createCommand()
                ->select('id')
                ->from('{{poll}}')
                ->where('published=1')
                ->order('created_on DESC')
                ->limit('1')
                ->queryScalar();
        return $value;
    }

    public function get_newslink_category($id) {
        $value = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{news_link_category}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function getNewsLink($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{news_link}}')
                ->where('category_id=' . $catid . ' AND published=1')
                ->limit('5')
                ->order('created_on DESC, id DESC')
                ->queryAll();
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li>' . CHtml::link($values['title'], $values['link'], array('class' => 'home_news', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
    }

}