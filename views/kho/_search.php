<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KhoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ma_kho') ?>

    <?= $form->field($model, 'ten_kho') ?>

    <?= $form->field($model, 'dia_chi') ?>

    <?= $form->field($model, 'sdt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
