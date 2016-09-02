<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompaniasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Companias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'compania_id',
            'compania_nombre',
            'compania_email:email',
            'compania_direccion',
           // 'logo',
            // 'compania_inicio_fecha',
            'compania_creado_fecha',
           'compania_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
