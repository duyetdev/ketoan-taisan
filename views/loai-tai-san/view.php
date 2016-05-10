<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LoaiTaiSan */

$this->title = $model->ma_lts;
$this->params['breadcrumbs'][] = ['label' => 'Loai Tai Sans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loai-tai-san-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ma_lts], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ma_lts], [
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
            'ma_lts',
            'ten_loai',
        ],
    ]) ?>

</div>
