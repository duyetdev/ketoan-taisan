<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaiSanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tai-san-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ma_ts') ?>

    <?= $form->field($model, 'ten_ts') ?>

    <?= $form->field($model, 'dvt') ?>

    <?= $form->field($model, 'nguyen_gia') ?>

    <?= $form->field($model, 'so_nam_khau_hao') ?>

    <?php // echo $form->field($model, 'ma_lts') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
