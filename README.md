<p align="center">
    <h1 align="center">Yii2 RBAC USER Extension</h1>
    <br>
</p>

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist denchotsanov/yii2-user-rbac "*"
```

or add

```
"denchotsanov/yii2-user-rbac ": "*"
```

to the require section of your composer.json.

Configuration
=============
1) If you use this extension, then you need execute migration by the following command:
```
php yii migrate/up --migrationPath=@vendor/denchotsanov/yii2user/migrations
```
or

add in console config file add 
```
'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@app/migrations',
                '@vendor/denchotsanov/yii2-user-rbac/migrations',
                ...
            ],
        ],
    ],
```
2) You need to configure the `params` section in your project configuration:
```php
'params' => [
   'user.passwordResetTokenExpire' => 3600
]
```
3) Your need to create the UserModel class that be extends of [UserModel](https://github.com/yii2mod/yii2-user/blob/master/models/BaseUserModel.php) and configure the property `identityClass` for `user` component in your project configuration, for example:
```php
'user' => [
    'identityClass' => 'yii2mod\user\models\UserModel',
    // for update last login date for user, you can call the `afterLogin` event as follows
    'on afterLogin' => function ($event) {
        $event->identity->updateLastLogin();
    }
],
```

4) For sending emails you need to configure the `mailer` component in the configuration of your project.

5) If you don't have the `passwordResetToken.php` template file in the mail folder of your project, then you need to create it, for example:
```php
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/password-reset', 'token' => $user->password_reset_token]);
?>

Hello <?php echo Html::encode($user->username) ?>,

Follow the link below to reset your password:

<?php echo Html::a(Html::encode($resetLink), $resetLink) ?>

```
> This template used for password reset email.

6) Add to SiteController (or configure via `$route` param in urlManager):
```php
    /**
     * @return array
     */
    public function actions()
    {
        return [
            'login' => [
                'class' => 'yii2mod\user\actions\LoginAction'
            ],
            'logout' => [
                'class' => 'yii2mod\user\actions\LogoutAction'
            ],
            'signup' => [
                'class' => 'yii2mod\user\actions\SignupAction'
            ],
            'request-password-reset' => [
                'class' => 'yii2mod\user\actions\RequestPasswordResetAction'
            ],
            'password-reset' => [
                'class' => 'yii2mod\user\actions\PasswordResetAction'
            ],
        ];
    }
```

You can then access to this actions through the following URL:

1. http://localhost/site/login
2. http://localhost/site/logout
3. http://localhost/site/signup
4. http://localhost/site/request-password-reset
5. http://localhost/site/password-reset

7) Also some actions send flash messages, so you should use an AlertWidget to render flash messages on your site.
