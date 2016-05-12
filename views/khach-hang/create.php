<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KhachHang */

$this->title = 'Create Khach Hang';
$this->params['breadcrumbs'][] = ['label' => 'Khach Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="khach-hang-create">

    <h1>Khách hàng</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
