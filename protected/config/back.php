<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
            // Put back-end settings there.
            'modules' => array(
                // uncomment the following to enable the Gii tool
                'gii' => array(
                    'generatorPaths' => array(
                        'bootstrap.gii',
                    ),
                ),
            ),
            /*
              'components' => array(
              'urlManager' => array(
              'urlFormat' => 'path',
              'showScriptName' => true,
              'urlSuffix' => '.html',
              'rules' => array(
              '<action>' => 'site/<action>',
              '<controller:\w+>/<id:\d+>' => '<controller>/view',
              '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
              '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
              ),
              ),
              ),
             */
            'theme' => 'admin',
            'language' => 'en',
            'name' => 'Pabna News 24',
                )
);
