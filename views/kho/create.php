<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kho */

$this->title = 'Thêm kho';
$this->params['breadcrumbs'][] = ['label' => 'Kho', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
