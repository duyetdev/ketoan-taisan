<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoaiTaiSan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loai-tai-san-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_lts')->textInput() ?>

    <?= $form->field($model, 'ten_loai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
