<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'language' => 'ru-RU',
    'modules' => [
        'gii' => ['class' => 'yii\gii\Module'],
        'admin' => ['class' => 'app\modules\admin\Module'],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lNJy4SfravpusBwTbb8xBcdCTcHej2D0',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['admin/default/login'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'login' => 'admin/default/login',
                'about' => 'site/about',
                'show-message-form' => 'site/show-message-form',
                'submit-message' => 'site/submit-message',
                'captcha' => 'site/captcha',
                '<controller:\w+>/<id>' => '<controller>/view'
            ],
        ],
        'authManager' => [
        'class' => 'yii\rbac\PhpManager',
        'defaultRoles' => ['admin'], // Здесь нет роли "guest", т.к. эта роль виртуальная и не присутствует в модели UserExt
    ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
