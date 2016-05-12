<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kho */

$this->title = $model->ma_kho . " - " . $model->ten_kho;
$this->params['breadcrumbs'][] = ['label' => 'Kho', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ma_kho], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ma_kho], [
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
            'ma_kho',
            'ten_kho',
            'dia_chi',
            'sdt',
        ],
    ]) ?>

</div>
