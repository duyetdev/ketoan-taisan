<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KhachHangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DS Khách Hàng';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
  <div class="col-md-9">
        <div class="khach-hang-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Khach Hang', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php Pjax::begin(); ?>    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'ma_kh',
                    'ten_kh',
                    'dia_chi',
                    'ma_so_thue',
                    'so_tai_khoan',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?></div>
    </div>
    <div class="col-md-3">

        <h1>Thêm mới</h1>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
  </div>
