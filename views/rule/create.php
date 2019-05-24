<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \denchotsanov\rbac\models\BizRuleModel */

$this->title = Yii::t('denchotsanov.rbac', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('denchotsanov.rbac', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="rule-item-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>