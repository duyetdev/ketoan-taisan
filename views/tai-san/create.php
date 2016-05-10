<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaiSan */

$this->title = 'Create Tai San';
$this->params['breadcrumbs'][] = ['label' => 'Tai Sans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tai-san-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
