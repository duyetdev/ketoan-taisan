<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KhachHang */

$this->title = 'Update Khach Hang: ' . $model->ma_kh;
$this->params['breadcrumbs'][] = ['label' => 'Khach Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma_kh, 'url' => ['view', 'id' => $model->ma_kh]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="khach-hang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
