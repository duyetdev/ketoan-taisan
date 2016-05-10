<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PhieuBanTsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phieu Ban Ts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-ban-ts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Phieu Ban Ts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'so_pb',
            'ngay_ban',
            'so_hoa_don',
            'ngay_hoa_don',
            'loai_hoa_don',
            // 'thue_suat',
            // 'ma_kh',
            // 'ma_tk',
            // 'ma_kho',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
