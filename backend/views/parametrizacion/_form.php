<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Parametrizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametrizacion-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'nombre_parametrizacion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'path_parametrizacion')->textInput(['maxlength' => true]) ?>
     <?= Html::a('seleccionar Path', '#', [
            'id' => 'pathA',
            'class' => 'btn btn-primary',               
        ]); ?>
    <br>
    <hr>
    <br>
    <div class="form-group">
       
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


 
<?php
$script = <<<JS
$('#pathA').click(function ()
        {
        
            alert("hola");
        }
 );
        
        
JS;
$this->registerJs($script);
?>