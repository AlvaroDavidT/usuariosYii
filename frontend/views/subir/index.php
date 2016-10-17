<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Subir archivos xml';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="auth-assignment-index">

   
        <div class="jumbotron">
<?php
$form = ActiveForm::begin([
            "method" => "post",
            "enableClientValidation" => true,
            "options" => ["enctype" => "multipart/form-data"],
        ]);
?>
<?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>
          
        </div>    
  
    <div class="well well-sm text-center">
<?= Html::submitButton("Subir archivos", ["class" => "btn btn-primary"]) ?>
<?php $form->end() ?>
    </div>
 <div class="page-header">
          </div>

</div>