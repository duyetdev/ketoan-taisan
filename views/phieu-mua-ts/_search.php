<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phieu-mua-ts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'so_pm') ?>

    <?= $form->field($model, 'ngay_lap') ?>

    <?= $form->field($model, 'ngay_su_dung') ?>

    <?= $form->field($model, 'so_hoa_son') ?>

    <?= $form->field($model, 'ngay_phat_hanh_hd') ?>

    <?php // echo $form->field($model, 'loai_hoa_don') ?>

    <?php // echo $form->field($model, 'thue_suat') ?>

    <?php // echo $form->field($model, 'ma_kh') ?>

    <?php // echo $form->field($model, 'ma_tk_chinh') ?>

    <?php // echo $form->field($model, 'ma_kho') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
