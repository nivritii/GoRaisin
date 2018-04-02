<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    
//    'preload' => array(
//        'booster'
//    ),
    
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            //'class' => 'frontend\components\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'cherry@webpuppies.com.sg',
                'password' => 'cherrynus123',
                'port' => '465',
                'encryption' => 'ssl',
                'streamOptions' => [
                    'ssl' => [ 'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['cherry@webpuppies.com.sg'=>'GoRaisin']
            ],
        ],

        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '1794027837316015',
                    'clientSecret' => '8c4ac8d55a129a1a5282f79b4976bcd2',
                    'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],
            ],
        ],

        'assetManager' => [
            'bundles' => [
                // we will use bootstrap css from our theme
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [], // do not use yii default one
                ],
                 // use bootstrap js from CDN
                 'yii\bootstrap\BootstrapPluginAsset' => [
                     'sourcePath' => null,   // do not use file from our server
                     'js' => [
                         'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js']
                 ],
                 // use jquery from CDN
                 'yii\web\JqueryAsset' => [
                     'sourcePath' => null,   // do not use file from our server
                     'js' => [
                         'ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',
                     ]
                 ],
            ],
        ],
    ],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => 'uploads/campaign/image',
            'uploadUrl' => 'uplaods/campaign/image',
            'imageAllowExtensions'=>['jpg','png','gif','jpeg']
        ],

        'social' => [
            // the module class
            'class' => 'kartik\social\Module',

            // the global settings for the google-analytics widget
            'google-analytics' => [
                'id' => 'UA-115738204-1',
                'domain' => 'localhost'
            ],
        ],
    ],


    'params' => $params,
];
