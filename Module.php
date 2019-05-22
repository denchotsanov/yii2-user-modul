<?php

namespace denchotsanov\yii2usermodule;

/**
 *
 * Use [[\yii\base\Module::$controllerMap]] to change property of controller.
 *
 * ```php
 * 'controllerMap' => [
 *     'assignment' => [
 *         'class' => '',
 *         'userIdentityClass' => 'app\models\User',
 *         'searchClass' => [
 *              'class' => '',
 *              'pageSize' => 10,
 *         ],
 *         'idField' => 'id',
 *         'usernameField' => 'username'
 *         'gridViewColumns' => [
 *              'id',
 *              'username',
 *              'email'
 *         ],
 *     ],
 * ],
 */
class Module extends \yii\base\Module
{
    /**
     * @var string the default route of this module. Defaults to 'default'
     */
    public $defaultRoute = 'user';
    /**
     * @var string the namespace that controller classes are in
     */
    public $controllerNamespace = 'denchotsanov\yii2usermodule\controllers';

}