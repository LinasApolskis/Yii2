<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DarbuotojaiForm */

$this->title = 'Create Darbuotojai Form';
$this->params['breadcrumbs'][] = ['label' => 'Darbuotojai Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darbuotojai-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'data' => $data,
    ]) ?>

</div>
