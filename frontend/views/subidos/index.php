<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;



$this->title = 'Procesar archivos subidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable text-center">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="glyphicon glyphicon-check"></i>Datos Procesados!</h4>
    </div>
<?php elseif (Yii::$app->session->hasFlash('Info')): 
        
    ?>
<div class="alert alert-danger alert-dismissable text-center">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="glyphicon glyphicon-remove"></i>No existe archivos Pendiente de procesar!</h4>
    </div>
<?php endif; ?>
<div class="auth-assignment-index">
    
        <div class="well well-sm text-right">
            <?=
            Html::a('<span class="glyphicon glyphicon-cog"></span> Procesar', ['procesar'], ['class' => 'btn btn-primary']);
            ?>

        </div>    
   

    <div class="jumbotron">
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
        ],
        
        //'Autorizacion_Numero',
       'PathXml',
        'Estado',
    ],
    'options'=>['class'=>'grid-view gridview-newclass'],
    'headerRowOptions' =>[
         'class' => 'success',
    ],
    'rowOptions' => function ($model){

      if($model->Estado== 'Procesado'){
        return ['class' => ''];
      }else{
        return ['class' => 'danger'];
    }
    
      },
]);
?>
    </div>


</div>
