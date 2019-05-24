<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 RBAC USER Extension</h1>
    <br>
</p>

[![Latest Stable Version](https://poser.pugx.org/denchotsanov/yii2-user-rbac/v/stable)](https://packagist.org/packages/denchotsanov/yii2-user)
[![Total Downloads](https://poser.pugx.org/denchotsanov/yii2-user-rbac/downloads)](https://packagist.org/packages/denchotsanov/yii2-user)
[![Latest Unstable Version](https://poser.pugx.org/denchotsanov/yii2-user-rbac/v/unstable)](https://packagist.org/packages/denchotsanov/yii2-user)
[![License](https://poser.pugx.org/denchotsanov/yii2-user-rbac/license)](https://packagist.org/packages/denchotsanov/yii2-user)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist denchotsanov/yii2-user-rbac "*"
```

or add

```
"denchotsanov/yii2-user-rbac ": "*"
```

to the require section of your composer.json.

Usage
------------
Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'modules' => [
        'rbac' => [
            'class' => 'denchotsanov\rbac\Module',
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
```
After you downloaded and configured Yii2-rbac, the last thing you need to do is updating your database schema by 
applying the migration:
 
```bash
$ php yii migrate/up --migrationPath=@yii/rbac/migrations
```
or add in console config file
```
'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                ...
                '@yii/rbac/migrations',
                ...
            ],
        ],
    ],
```
You can then access Auth manager through the following URL:

```
[SERVER]/rbac/
[SERVER]/rbac/route
[SERVER]/rbac/permission
[SERVER]/rbac/role
[SERVER]/rbac/assignment
```

**Applying rules:**

1) For applying rules only for `controller` add the following code:
```php
use denchotsanov\rbac\filters\AccessControl;

class ExampleController extends Controller 
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'allowActions' => [
                    'index',
                    // The actions listed here will be allowed to everyone including guests.
                ]
            ],
        ];
    }
}
```
2) For applying rules for `module` add the following code:
```php

use Yii;
use denchotsanov\rbac\filters\AccessControl;

/**
 * Class Module
 */
class Module extends \yii\base\Module
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            AccessControl::class
        ];
    }
}
```
3) Also you can apply rules via main configuration:
```php
// apply for single module

'modules' => [
    'rbac' => [
        'class' => 'denchotsanov\rbac\Module',
        'as access' => [
            'class' => denchotsanov\rbac\filters\AccessControl::class
        ],
    ]
]

// or apply globally for whole application

'modules' => [
    ...
],
'components' => [
    ...
],
'as access' => [
    'class' => denchotsanov\rbac\filters\AccessControl::class,
    'allowActions' => [
        'site/*',
        'admin/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
    ]
 ],

```
