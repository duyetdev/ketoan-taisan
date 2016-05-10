<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = 'Update Phieu Mua Ts: ' . $model->so_pm;
$this->params['breadcrumbs'][] = ['label' => 'Phieu Mua Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->so_pm, 'url' => ['view', 'id' => $model->so_pm]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phieu-mua-ts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
