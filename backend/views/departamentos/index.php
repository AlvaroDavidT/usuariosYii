<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartamentosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departamentos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departamentos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'departamento_id',
            'departamento_nombre',
            'sucursalesSucursal.sucursal_nombre',
            'companiasCompania.compania_nombre',
            'departamento_creado_fecha',
            // 'deparamento_estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
