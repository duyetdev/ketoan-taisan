<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaiKhoan */

$this->title = 'Update Tai Khoan: ' . $model->ma_tk;
$this->params['breadcrumbs'][] = ['label' => 'Tai Khoans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma_tk, 'url' => ['view', 'id' => $model->ma_tk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tai-khoan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
