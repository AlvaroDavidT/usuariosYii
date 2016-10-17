<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;



$this->title = 'Resultados de Retenciones subidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable text-center">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="glyphicon glyphicon-check"></i>Datos procesados!</h4>
    </div>
<?php endif; ?>
<div class="auth-assignment-index">
    <div class="well well-sm text-right">
         <?= Html::a('   <span class="glyphicon glyphicon-open"></span> Enviar Datos', ['envia-retenciones'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="jumbotron">
     <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
          // 'htmlOptions'=>array('width'=>'40'),
       // 'layout'=>"{summary}\n{items}\n{pager}",
        'columns' => [
            
            ['class' => 'yii\grid\SerialColumn'],
            'secuencial',
            'razonSocial',
            'ruc',
            'fechaEmision',
          //  'ImporteTotal',
          //  'NombreComercial',
                        'Estado:boolean',
            
        //['class' => 'yii\grid\ActionColumn'],
  
        ],
        'headerRowOptions' =>[
         'class' => 'success',
    ],
                  'rowOptions' => function ($model, $index, $widget, $grid){

      if($model->Estado== 'Si'){
        return ['class' => 'danger'];
      }else{
        return ['class' => ''];
      }
    },
                //       'tableOptions' =>['class' => 'table table-condensed'],
    
    ]);
    ?>
    </div>
    <div class="page-header">
       
    </div>
     </div>
