<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MDxAFCVHh8dfRfkSLtVDcjUCOIYa0CXV',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'enableSession' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin', 'user'],
//            'itemFile' => '@app/rbac/items.php',
//            'assignmentFile' => '@app/rbac/assignments.php',
//            'ruleFile' => '@app/rbac/UserGroupRule.php',
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => [
                'lifetime' => 60*60*60,
            ],
        ],

        'qr' => [
            'class' => '\Da\QrCode\Component\QrCodeComponent',
            'label' => '2amigos consulting group llc',
            'size' => 500,
        ],
    ],
    'params' => $params,

    'as globalAccess' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'actions' => ['error'],
                'allow' => true,
                'roles' => ["?","@"],
            ],
            [
                'allow' => true,
                'controllers' => ['site'],
                'actions' => ['login', 'logout', 'home','categories','category-details'],
                'roles' => ['?', '@'],
            ],
            [
                'allow' => true,
                'controllers' => ['site'],
                'actions' => ['about', 'index'],
                'roles' => ['@'],
            ],

            [
                'allow' => true,
                'controllers' => ['site'],
                'actions' => ['page','site'],
                'roles' => ['@'],
            ],
//
            [
                'allow' => true,
                'controllers' => ['user'],
                'actions' => ['create', 'index'],
                'roles' => ['admin'],
//                'denyCallback' => function ($rule, $action) {
//                    throw new \Exception('You are not allowed to access this page');
//                },
            ],
            [
                'allow' => true,
                'controllers' => ['user'],
                'actions' => ['change-pass', 'profile','favorite', 'update', 'view'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'controllers' => ['user-profile'],
                'actions' => ['view', 'update'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'controllers' => ['products'],
                'actions' => ['view', 'details', 'view360'],
                'roles' => ['?', '@'],
            ],
//            [
//                'allow'=>true,
//                'actions'=>['view'],
//            ],
            [
                'allow' => true,
                'controllers' => ['products'],
                'actions' => ['rate', 'index', 'view', 'create'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'controllers' => ['categories'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'controllers'=>['favorite'],
                'roles' => ['@'],
            ],
            [
                'allow' => true,
                'roles' => ['admin'],
            ],
        ],

    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    // configuration adjustments for 'dev' environment
    // requires version `2.1.21` of yii2-debug module
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}


return $config;
