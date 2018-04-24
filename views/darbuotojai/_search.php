<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Darbuotojais */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="darbuotojai-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vardas') ?>

    <?= $form->field($model, 'pavarde') ?>

    <?= $form->field($model, 'pareigos') ?>

    <?= $form->field($model, 'telefonas') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'stazas') ?>

    <?php // echo $form->field($model, 'lygis') ?>

    <?php // echo $form->field($model, 'inviter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
