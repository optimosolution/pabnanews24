<?php

class BackEndController extends CController {

    public $userData;
    public $layout = 'application.views.layouts.main';
    public $menu = array();
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
    }

    public function checkAccess($controller, $action) {
        $val = Yii::app()->db->createCommand()
                ->select('access')
                ->from('{{acl}}')
                ->where('LOWER(controller)="' . $controller . '" AND LOWER(actions)="' . $action . '" AND group_id=' . Yii::app()->user->group)
                ->queryScalar();
        return $val;
    }
}