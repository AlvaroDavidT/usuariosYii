<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable text-center">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="glyphicon glyphicon-check"></i>Datos Enviados!</h4>
    </div>
<?php endif; ?>

<h3>Subir archivos</h3>
<?php
$form = ActiveForm::begin([
            "method" => "post",
            "enableClientValidation" => true,
            "options" => ["enctype" => "multipart/form-data"],
        ]);
?>
<?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>
<?= Html::submitButton("Subir", ["class" => "btn btn-primary"]) ?>
<?php $form->end() ?>

