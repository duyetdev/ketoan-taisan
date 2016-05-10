<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoaiTaiSan */

$this->title = 'Update Loai Tai San: ' . $model->ma_lts;
$this->params['breadcrumbs'][] = ['label' => 'Loai Tai Sans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma_lts, 'url' => ['view', 'id' => $model->ma_lts]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loai-tai-san-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
