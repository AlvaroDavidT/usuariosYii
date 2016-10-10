<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;



$this->title = 'Resultados de Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
          // 'htmlOptions'=>array('width'=>'40'),
        'columns' => [
            
            ['class' => 'yii\grid\SerialColumn'],
//            [
//                'attribute' => 'an_attributeid',
//                'label' => 'Union',
//                'value' => function($model) {
//                    return $model->Establecimiento . '-' . $model->PuntoEmision . '-' . $model->Secuencial;
//                },
//            ],
            'RazonSocial',
            'ruc',
            'FechaEmision',
            'ImporteTotal',
            'NombreComercial',
                        'Estado'
            
        //['class' => 'yii\grid\ActionColumn'],
        ],
    
    ]);
    ?>
</div>
