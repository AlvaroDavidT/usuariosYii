<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\ParametrizacionDatosEnvio */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="parametrizacion-datos-envio-form">
    <?php
    
    $form = ActiveForm::begin([
                'id' => 'parametrizaciondatosenvio-form',
                'enableAjaxValidation' => true,
                'enableClientScript' => true,
                'enableClientValidation' => true,  
    ]);
    ?>  
    <?=$form->field($model, 'Tipo')->dropDownList(
            ['1' => 'Variable', '0' => 'Fijo'],
            ['prompt'=>'Seleccione una opcion','style'=>'width:100%',
             'onChange'=>'muestra();',
            ]
            );
    ?>
     <?= $form->field($model, 'DatoXml')->textInput(['maxlength' => true]) ?>
    <p class="text-warning text-center " id="Nota" style='display:none;'><strong>NOTA: !!Seleccionaste variable completar con nombres de Tagxml!!</strong></p>
  <!--
     $form->field($model, 'DatoXml')->dropDownList($var,['id'=>'ver1'],
            ['prompt'=>'Seleccione una opcion'])*/ -->
   
    <?= $form->field($model, 'Tabla')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Campo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs('

    // obtener la id del formulario y establecer el manejador de eventos
        $("form#parametrizaciondatosenvio-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#Par-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.defaultPrevented();
            e.stopImmediatePropagation();
            return false;
        });
    ');
    ?>
  <script>
     function muestra(){      
         var $v_datoSelected = $("#parametrizaciondatosenvio-tipo :selected").val();    
             if ($v_datoSelected == "1"){
                 $("#Nota").show()  ;                
             }     
         else
         {
             if ($v_datoSelected == "0"){
                 $("#Nota").hide();
             }
         }              
     }
  </script>
</div>
