<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuBanTs */

$this->title = 'Update Phieu Ban Ts: ' . $model->so_pb;
$this->params['breadcrumbs'][] = ['label' => 'Phieu Ban Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->so_pb, 'url' => ['view', 'id' => $model->so_pb]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phieu-ban-ts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
