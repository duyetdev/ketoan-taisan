<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaiSan */

$this->title = 'Update Tai San: ' . $model->ma_ts;
$this->params['breadcrumbs'][] = ['label' => 'Tai Sans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma_ts, 'url' => ['view', 'id' => $model->ma_ts]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tai-san-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
