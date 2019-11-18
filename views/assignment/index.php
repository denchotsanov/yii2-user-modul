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
                        'columns' => ArrayHelper::merge($gridViewColumns, [
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view}',
                                'buttons' => [
                                    'view' => function ($url, $model, $key) {
                                        return Html::a('<span class="fas fa-pen"></span> ' . Yii::t('denchotsanov.rbac',
                                                'View'),
                                            $url, ['class' => 'btn btn-info btn-sm']);
                                    },

                                ]
                            ]
                        ])
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card card-lime card-outline card-tabs">
                <div class="card-body">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
