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

            'so_pm',
            'ma_kh',
            'ma_tk_chinh',
            'ma_kho',
            'ma_nvc',
            'so_hoa_son',
            'ngay_phat_hanh_hd',
            'loai_hoa_don',
            'thue_suat',
            'ngay_lap',
            'ngay_su_dung',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
