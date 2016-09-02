<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companias;
use backend\models\Sucursales;


/* @var $this yii\web\View */
/* @var $model backend\models\Departamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamentos-form">

    <?php $form = ActiveForm::begin(); ?>
  
<!--select dependiente compania existe muchas sucursales -->
     <?= $form->field($model, 'companias_compania_id')->dropDownList(
        ArrayHelper::map(Companias::find()->all(),'compania_id','compania_nombre'),
            [
                'prompt'=>'seleccione compania',
                 'onchange'=>'
                    $.post("index.php?r=sucursales/lists&id='.'"+$(this).val(), function(data){
                        $["select#models-contact").html(data);
                 });'
            ] );
    ?>
    <?= $form->field($model, 'sucursales_sucursal_id')->textInput(); ?>

     <?= $form->field($model, 'departamento_nombre')->textInput(['maxlength' => true]) ?>
      
    <?= $form->field($model, 'deparamento_estado')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
