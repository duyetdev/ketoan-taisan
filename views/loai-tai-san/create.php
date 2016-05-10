<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LoaiTaiSan */

$this->title = 'Create Loai Tai San';
$this->params['breadcrumbs'][] = ['label' => 'Loai Tai Sans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loai-tai-san-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
