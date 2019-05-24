<?php
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \denchotsanov\rbac\models\search\AssignmentSearch|object */
/* @var $gridViewColumns array */

$this->title = Yii::t('denchotsanov.rbac', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="assignment-index">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php Pjax::begin(['timeout' => 5000]); ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => ArrayHelper::merge($gridViewColumns, [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ]),
    ]); ?>
    <?php Pjax::end(); ?>
</div>