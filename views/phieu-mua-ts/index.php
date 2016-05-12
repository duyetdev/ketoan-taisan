<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PhieuMuaTsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phiếu mua tài sản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-mua-ts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'so_phieu',
            [
              'attribute'=>'ma_kh',
              'value'=> function($model) { return $model->getMaKh()->one()->ten_kh; },
            ],
            [
              'attribute'=>'ma_tk_chinh',
              'value'=> function($model) { return $model->getMaTkChinh()->one()->ten_tk; },
            ],
            [
              'attribute'=>'ma_kho',
              'value'=> function($model) { return $model->getMaKho()->one()->ten_kho; },
            ],
            [
              'attribute'=>'ma_nvc',
              'value'=> function($model) { return $model->getMaNvc()->one()->ten_kh; },
            ],
            'so_hoa_son',
            'ngay_phat_hanh_hd',
            'loai_hoa_don',
            [
              'attribute'=>'thue_suat',
              'value'=> function($model) { return $model->thue_suat ? $model->thue_suat . '%' : ''; },
            ],
            //'ngay_lap',
            //'ngay_su_dung',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
