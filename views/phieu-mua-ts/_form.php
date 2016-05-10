<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phieu-mua-ts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'so_pm')->textInput() ?>

    <?= $form->field($model, 'ngay_lap')->textInput() ?>

    <?= $form->field($model, 'ngay_su_dung')->textInput() ?>

    <?= $form->field($model, 'so_hoa_son')->textInput() ?>

    <?= $form->field($model, 'ngay_phat_hanh_hd')->textInput() ?>

    <?= $form->field($model, 'loai_hoa_don')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thue_suat')->textInput() ?>

    <?= $form->field($model, 'ma_kh')->textInput() ?>

    <?= $form->field($model, 'ma_tk_chinh')->textInput() ?>

    <?= $form->field($model, 'ma_kho')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
