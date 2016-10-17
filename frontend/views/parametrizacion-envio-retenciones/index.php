<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParametrizacionDatosEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametrizacion Datos Retenciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrizacion-datos-envio-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
<div class="well well-sm text-right">
  
        <?=
        Html::a('Nuevo', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-primary',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]);
        ?>
   
</div>
    <?php Pjax::begin() ?>
    <div class="jumbotron">
    <?=
    GridView::widget([
        'id' => 'Par-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
      //  'showFooter' => true,
       // 'emptyCell' => '.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Nombre',
            'Campo',
            [
                'label' => 'Tipo',
                'value' => function($model) {
                    return $model->Tipo == 0 ? 'Fijo' : 'Variable';
                },
            ],
  
            'Valor',
            ['class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '', 'label' => 'Action'],
                'template' => '{update}{delete}',
                'buttons' => ['update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'id' => 'activity-index-link',
                                    'title' => Yii::t('app', 'Update'),
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modal',
                                    'data-url' => Url::to(['update', 'id' => $model->id]),
                                    'data-pjax' => '0',
                        ]);
                    },
                        ]
                    ],
                ],
                            'headerRowOptions' =>[
         'class' => 'success',
    ],
                                                    'rowOptions' => function ($model){

      if($model->Tipo== 'Fijo'){
        return ['class' => ''];
      }else{
        return ['class' => 'danger'];
    }
    
      },
            ]);
            ?>
    </div>
            <?php Pjax::end() ?>
            <?php
            $this->registerJs(
                    "$(document).on('click', '#activity-index-link', (function() {
                $.get(
                    $(this).data('url'),
                    function (data) {
                        $('.modal-body').html(data);
                        $('#modal').modal();           
                    }
                );
            }));"
            );
            ?>


            <?php
            Modal::begin([
                'id' => 'modal',
                'header' => '<h5 class="modal-title">Complete los campos</h5>',
                // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
                'size' => 'modal-sm',
                'options' => [
                    'title' => 'crear registro',
                ]
            ]);
            
            Modal::end();
            ?>


</div>
