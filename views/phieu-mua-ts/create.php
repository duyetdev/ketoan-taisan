<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = 'Create Phieu Mua Ts';
$this->params['breadcrumbs'][] = ['label' => 'Phieu Mua Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-mua-ts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
