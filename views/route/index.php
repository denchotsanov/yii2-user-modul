<?php

use yii\helpers\Html;
use yii\helpers\Json;
use denchotsanov\yii2rbac\RbacRouteAsset;
RbacRouteAsset::register($this);

/* @var $this yii\web\View */
/* @var $routes array */

$this->title = Yii::t('denchotsanov.rbac', 'Routes');
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
    <h1><?php echo Html::encode($this->title); ?></h1>
<?php echo Html::a(Yii::t('denchotsanov.rbac', 'Refresh'), ['refresh'], [
    'class' => 'btn btn-primary',
    'id' => 'btn-refresh',
]); ?>
<?php echo $this->render('../_dualListBox', [
    'opts' => Json::htmlEncode([
        'items' => $routes,
    ]),
    'assignUrl' => ['assign'],
    'removeUrl' => ['remove'],
]); ?>