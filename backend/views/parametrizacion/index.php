<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParametrizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametrizacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parametrizacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'parametrizacion_id',
            'nombre_parametrizacion',
            'path_parametrizacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
