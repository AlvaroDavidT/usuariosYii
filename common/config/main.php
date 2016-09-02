<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
         'auth' => [
             'class' => 'common\modules\auth\Module',
         ],
     ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
       
         /*
        Lineas para  la creacion de Rbac 
         *          */
        'authManager'=>[
            'class'=>'yii\rbac\DbManager',
            'defaultRoles'=>['guest'],
        ],
    ],
];
