<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kho */

$this->title = 'Update Kho: ' . $model->ma_kho;
$this->params['breadcrumbs'][] = ['label' => 'Khos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma_kho, 'url' => ['view', 'id' => $model->ma_kho]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
