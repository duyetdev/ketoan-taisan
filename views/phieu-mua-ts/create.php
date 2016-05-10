<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = 'Create Phieu Mua Ts';
$this->params['breadcrumbs'][] = ['label' => 'Phieu Mua Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-mua-ts-create">


    <?= $this->render('_form', [
        'model' => $model,
        'kho' => $kho,
    ]) ?>

</div>
