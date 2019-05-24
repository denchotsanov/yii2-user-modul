<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $searchModel \denchotsanov\rbac\models\search\BizRuleSearch|object */

$this->title = Yii::t('denchotsanov.rbac', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="role-index">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <p>
        <?php echo Html::a(Yii::t('denchotsanov.rbac', 'Create Rule'), ['create'], ['class' => 'btn btn-success']); ?>
    </p>

    <?php Pjax::begin(['timeout' => 5000]); ?>

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
                'header' => Yii::t('denchotsanov.rbac', 'Action'),
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>
</div>