<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DarbuotojaiForm */

$this->title = 'Update Darbuotojai Form: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Darbuotojai Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="darbuotojai-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'data' => $data,
    ]) ?>

</div>
