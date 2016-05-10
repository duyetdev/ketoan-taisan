<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuBanTs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phieu-ban-ts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'so_pb')->textInput() ?>

    <?= $form->field($model, 'ngay_ban')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_hoa_don')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_hoa_don')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loai_hoa_don')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thue_suat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_kh')->textInput() ?>

    <?= $form->field($model, 'ma_tk')->textInput() ?>

    <?= $form->field($model, 'ma_kho')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
