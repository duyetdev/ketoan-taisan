<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = $model->so_pm;
$this->params['breadcrumbs'][] = ['label' => 'Phieu Mua Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-mua-ts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->so_pm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->so_pm], [
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
            'so_pm',
            'ngay_lap',
            'ngay_su_dung',
            'so_hoa_son',
            'ngay_phat_hanh_hd',
            'loai_hoa_don',
            'thue_suat',
            'ma_kh',
            'ma_tk_chinh',
            'ma_kho',
            'ma_nvc',
        ],
    ]) ?>

</div>
