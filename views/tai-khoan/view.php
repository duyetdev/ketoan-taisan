<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaiKhoan */

$this->title = $model->ma_tk;
$this->params['breadcrumbs'][] = ['label' => 'Tai Khoans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tai-khoan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ma_tk], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ma_tk], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ma_tk',
            'ten_tk',
        ],
    ]) ?>

</div>
