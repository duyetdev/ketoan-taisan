<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhieuMuaTs */

$this->title = 'Tạo phiếu mua';
$this->params['breadcrumbs'][] = ['label' => 'Phiếu mua tài sản', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-mua-ts-create">


    <?= $this->render('_form', [
        'model' => $model,
        'kho' => $kho,
    ]) ?>

</div>
