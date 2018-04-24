<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Darbuotojais */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Darbuotojai Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darbuotojai-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Paieska', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Prideti darbuotoja', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Komisinis', ['komisinis'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vaizdavimas', ['vaizdavimas'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'vardas',
            'pavarde',
            'pareigos',
            //'telefonas',
            //'email:email',
            //'stazas',
            //'lygis',
            //'inviter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
