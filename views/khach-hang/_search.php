<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KhachHangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khach-hang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ma_kh') ?>

    <?= $form->field($model, 'ten_kh') ?>

    <?= $form->field($model, 'dia_chi') ?>

    <?= $form->field($model, 'ma_so_thue') ?>

    <?= $form->field($model, 'so_tai_khoan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
