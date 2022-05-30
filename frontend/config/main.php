<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/'
        ],
        'user' => [
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
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'blog' => 'site/blog',
                'article' => 'site/article',
            ],
        ],

    ],
    'modules' => [
        // ...
        'custompages' => [
            'class' => 'andrewdanilov\custompages\frontend\Module',
            // optional, path to template Views for pages and categories
            'templatesPath' => '@frontend/views/custompages',
            // optional, path to user translates
//            'translatesPath' => '@common/messages/custompages',
            // optional, page text short version length, default is 50
            'pageShortTextWordsCount' => '100',
            // optional, callable functions to process page and category text,
            // i.e. to replace some shortcodes on it
            'pageTextProcessor' => 'frontend\components\MyPageTextProcessor::replaceShortcodes',
            'categoryTextProcessor' => 'frontend\components\MyCategoryTextProcessor::replaceShortcodes',
        ],
    ],
    'params' => $params,
];
