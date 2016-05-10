<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaiSan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tai-san-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_ts')->textInput() ?>

    <?= $form->field($model, 'ten_ts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dvt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nguyen_gia')->textInput() ?>

    <?= $form->field($model, 'so_nam_khau_hao')->textInput() ?>

    <?= $form->field($model, 'ma_lts')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
