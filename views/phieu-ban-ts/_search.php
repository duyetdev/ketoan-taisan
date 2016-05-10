<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuBanTsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phieu-ban-ts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'so_pb') ?>

    <?= $form->field($model, 'ngay_ban') ?>

    <?= $form->field($model, 'so_hoa_don') ?>

    <?= $form->field($model, 'ngay_hoa_don') ?>

    <?= $form->field($model, 'loai_hoa_don') ?>

    <?php // echo $form->field($model, 'thue_suat') ?>

    <?php // echo $form->field($model, 'ma_kh') ?>

    <?php // echo $form->field($model, 'ma_tk') ?>

    <?php // echo $form->field($model, 'ma_kho') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
