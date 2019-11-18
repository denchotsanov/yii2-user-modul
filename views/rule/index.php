<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $searchModel \denchotsanov\rbac\models\search\BizRuleSearch|object */

$this->title = Yii::t('denchotsanov.rbac', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="role-index">
    <div class="row">
        <div class="col-9">
            <div class="card card-orange card-outline card-tabs">
                <div class="card-header with-border"></div>
                <div class="card-body table-responsive no-padding">
                    <?php Pjax::begin(['timeout' => 5000]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'layout' => "{items}\n{summary}\n{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                                'label' => Yii::t('denchotsanov.rbac', 'Name'),
                            ],
                            [
                                'header' => Yii::t('denchotsanov.rbac', 'Action'),
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update}{delete}',
                                'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                        return Html::a('<span class="fas fa-pen"></span> ' . Yii::t('denchotsanov.rbac', 'Edit'),
                                            $url, ['class' => 'btn btn-info btn-sm']);
                                    },
                                    'delete' => function ($url, $model, $key) {
                                        return Html::a('<span class="fas fa-trash"></span> ' . Yii::t('denchotsanov.rbac','Delete'), $url, ['class' => 'btn btn-danger btn-sm']);
                                    },
                                ]
                            ]
                        ]
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-lime card-outline card-tabs">
                <div class="card-body">
                    <div class="row">
                        <a href="<?= Url::to(['create']); ?>" class="btn btn-app">
                            <i class="fas fa-eye"></i><?= Yii::t('denchotsanov.rbac', 'Create Rule'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
