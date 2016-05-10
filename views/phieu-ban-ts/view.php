<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuBanTs */

$this->title = $model->so_pb;
$this->params['breadcrumbs'][] = ['label' => 'Phieu Ban Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-ban-ts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->so_pb], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->so_pb], [
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
            'so_pb',
            'ngay_ban',
            'so_hoa_don',
            'ngay_hoa_don',
            'loai_hoa_don',
            'thue_suat',
            'ma_kh',
            'ma_tk',
            'ma_kho',
        ],
    ]) ?>

</div>
