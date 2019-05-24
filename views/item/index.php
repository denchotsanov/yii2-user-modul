<?php
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $searchModel \denchotsanov\rbac\models\search\AuthItemSearch|object */

$labels = $this->context->getLabels();
$this->title = Yii::t('denchotsanov.rbac', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="item-index">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php Pjax::begin(['timeout' => 5000, 'enablePushState' => false]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Yii::t('denchotsanov.rbac', 'Name'),
            ],
            [
                'attribute' => 'ruleName',
                'label' => Yii::t('denchotsanov.rbac', 'Rule Name'),
                'filter' => ArrayHelper::map(Yii::$app->getAuthManager()->getRules(), 'name', 'name'),
                'filterInputOptions' => ['class' => 'form-control', 'prompt' => Yii::t('denchotsanov.rbac', 'Select Rule')],
            ],
            [
                'attribute' => 'description',
                'format' => 'ntext',
                'label' => Yii::t('denchotsanov.rbac', 'Description'),
            ],
            [
                'header' => Yii::t('denchotsanov.rbac', 'Action'),
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>