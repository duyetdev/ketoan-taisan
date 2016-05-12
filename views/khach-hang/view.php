<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KhachHang */

$this->title = $model->ten_kh . " (Mã KH: ". $model->ma_kh .")";
$this->params['breadcrumbs'][] = ['label' => 'Khách hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="khach-hang-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ma_kh',
            'ten_kh',
            'dia_chi',
            'ma_so_thue',
            'so_tai_khoan',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ma_kh], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ma_kh], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
