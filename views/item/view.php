<?php
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;
use denchotsanov\yii2rbac\RbacAssest;
RbacAsset::register($this);

/* @var $this \yii\web\View */
/* @var $model \denchotsanov\yii2rbac\models\AuthItemModel */

$labels = $this->context->getLabels();
$this->title = Yii::t('denchotsanov.rbac', $labels['Item'] . ' : {0}', $model->name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('denchotsanov.rbac', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
$this->render('/layouts/_sidebar');
?>
<div class="auth-item-view">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']); ?>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('denchotsanov.rbac', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Create'), ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <div class="row">
        <div class="col-sm-12">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'description:ntext',
                    'ruleName',
                    'data:ntext',
                ],
            ]); ?>
        </div>
    </div>
    <?php echo $this->render('../_dualListBox', [
        'opts' => Json::htmlEncode([
            'items' => $model->getItems(),
        ]),
        'assignUrl' => ['assign', 'id' => $model->name],
        'removeUrl' => ['remove', 'id' => $model->name],
    ]); ?>
</div>