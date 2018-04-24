<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

$this->title = 'Create';
$this->params['breadcrumbs'][] = $this->title;

$pareigos=array();
foreach($data as $key => $value){
    foreach($value as $key1 => $value1) {
        if(!in_array($value1, $pareigos))
        $pareigos[] = $value1;
    }
}
/* @var $this yii\web\View */
/* @var $model app\models\DarbuotojaiForm */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="darbuotojai-form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vardas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pavarde')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pareigos')->widget(\yii\jui\AutoComplete::classname(), [
        'clientOptions' => [
            'source' => $pareigos,
        ],
    ]) ?>

    <?= $form->field($model, 'telefonas')->widget(PhoneInput::className()); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stazas')->textInput() ?>

    <?= $form->field($model, 'lygis')->textInput() ?>

    <?= $form->field($model, 'inviter')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
