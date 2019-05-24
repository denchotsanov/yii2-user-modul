<?php
/* @var $this \yii\web\View */

$this->params['sidebar'] = [
    [
        'label' => Yii::t('denchotsanov.rbac', 'Assignments'),
        'url' => ['assignment/index'],
    ],
    [
        'label' => Yii::t('denchotsanov.rbac', 'Roles'),
        'url' => ['role/index'],
    ],
    [
        'label' => Yii::t('denchotsanov.rbac', 'Permissions'),
        'url' => ['permission/index'],
    ],
    [
        'label' => Yii::t('denchotsanov.rbac', 'Routes'),
        'url' => ['route/index'],
    ],
    [
        'label' => Yii::t('denchotsanov.rbac', 'Rules'),
        'url' => ['rule/index'],
    ],
];