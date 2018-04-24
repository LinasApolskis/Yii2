<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* * *ext** */
use leandrogehlen\treegrid\TreeGrid;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Darbuotojais */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Paieska', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Prideti darbuotoja', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Komisinis', ['komisinis'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vaizdavimas', ['vaizdavimas'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'keyColumnName' => 'id',
        'showOnEmpty' => FALSE,
        'parentColumnName' => 'inviter',
        'columns' => [

            'vardas',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add}',
                'buttons' => [
                    'add' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url);
                    },
                ]
            ]
        ]
    ]);
    ?>

</div>
