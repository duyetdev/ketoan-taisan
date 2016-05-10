<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KhachHang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khach-hang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_kh')->textInput() ?>

    <?= $form->field($model, 'ten_kh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_so_thue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_tai_khoan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
