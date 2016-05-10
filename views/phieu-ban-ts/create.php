<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhieuBanTs */

$this->title = 'Create Phieu Ban Ts';
$this->params['breadcrumbs'][] = ['label' => 'Phieu Ban Ts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phieu-ban-ts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
