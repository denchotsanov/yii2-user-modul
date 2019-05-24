<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $model \denchotsanov\rbac\models\BizRuleModel */
?>
<div class="rule-item-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 64]); ?>
    <?php echo $form->field($model, 'className')->textInput(); ?>
    <div class="form-group">
        <?php echo Html::submitButton(
            $model->getIsNewRecord() ? Yii::t('denchotsanov.rbac', 'Create') : Yii::t('denchotsanov.rbac', 'Update'),
            [
                'class' => $model->getIsNewRecord() ? 'btn btn-success' : 'btn btn-primary',
            ]
        ); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
