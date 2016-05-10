<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaiSanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tai Sans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tai-san-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tai San', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ma_ts',
            'ten_ts',
            'dvt',
            'nguyen_gia',
            'so_nam_khau_hao',
            // 'ma_lts',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
