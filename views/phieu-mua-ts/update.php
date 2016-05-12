<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = 'Cập nhật #' . $model->so_pm;
$this->params['breadcrumbs'][] = ['label' => 'Phiếu mua TS', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Phiếu #' . $model->so_pm, 'url' => ['view', 'id' => $model->so_pm]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="phieu-mua-ts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
