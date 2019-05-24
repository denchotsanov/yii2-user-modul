<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this \yii\web\View */
/* @var $model \denchotsanov\rbac\models\BizRuleModel */

$this->title = Yii::t('denchotsanov.rbac', 'Rule : {0}', $model->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('denchotsanov.rbac', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
$this->render('/layouts/_sidebar');
?>
<div class="rule-item-view">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']); ?>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('denchotsanov.rbac', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>
    </p>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'className',
        ],
    ]); ?>
</div>