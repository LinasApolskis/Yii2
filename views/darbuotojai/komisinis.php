<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Darbuotojais */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komisinis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darbuotojai-form-komisinis">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Paieska', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Prideti darbuotoja', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Komisinis', ['komisinis'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vaizdavimas', ['vaizdavimas'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'suma')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Skaičiuoti komisini!', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if($data != null) {
        echo "Komisinius gaus: </br>";
        echo "User id: $data[0] -> ";
        echo "$data[1] </br>";
        if ($data[2] != null) {
            echo "User id: $data[2] -> ";
            echo "$data[3] </br>";
        }
        if ($data[4] != null) {
            echo "User id: $data[4] -> ";
            echo "$data[5]";
        }
    }
    ?>

</div>