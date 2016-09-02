<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SucursalessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sucursales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sucursales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sucursales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                ['attribute'=> 'companias_compania_id',
                 'value'=> 'companiasCompania.compania_nombre',
                    
                    
                ],
           // 'sucursal_id',
           
            'sucursal_nombre',
            'sucursal_direccion',
            'sucursal_creado_fecha',
            // 'sucursal_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
