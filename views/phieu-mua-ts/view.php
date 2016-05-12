<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = 'Phiếu mua #' . $model->so_pm;
$this->params['breadcrumbs'][] = ['label' => 'Phiếu mua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$ct_phieumua = \app\models\ChiTietPhieuMua::find()->where(['so_pm' => $model->so_pm])->with('taiSan')->all();

?>
<div class="phieu-mua-ts-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

            [
              'attribute'=>'ma_kh',
              'value'=> $model->getMaKh()->one()->ten_kh,
            ],
            [
              'attribute'=>'ma_tk_chinh',
              'value'=> $model->getMaTkChinh()->one()->ten_tk,
            ],
            [
              'attribute'=>'ma_kho',
              'value'=> $model->getMaKho()->one()->ten_kho,
            ],
            [
              'attribute'=>'ma_nvc',
              'value'=> $model->getMaNvc()->one()->ten_kh,
            ],
        ],
    ]) ?>


    <table class="table">
    
        <thead>
            <th>#</th>
            <th>Mã TS</th>
            <th>Tên TS</th>
            <th>DVT</th>
            <th>Nguyên giá</th>
            <th>Số năm khấu hao</th>
            <th>Mã loại tài sản</th>
        </thead>

    <?php 
    $i = 1;
    foreach ($ct_phieumua as $key => $item) {
        ?>

        <tr>
            <td><?= $i++ ?></td>
            <td><?= $item->ma_ts ?></td>
            <td><?= $item->taiSan->ten_ts ?></td>
            <td><?= $item->taiSan->dvt ?></td>
            <td><?= $item->taiSan->nguyen_gia ?></td>
            <td><?= $item->taiSan->so_nam_khau_hao ?></td>
            <td><?= $item->taiSan->ma_lts ?></td>
        </tr>

        <?php 
    }

    ?>
    </table>

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

</div>
