<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?= $msg ?>

<h3>Subir archivos</h3>
<?php
$form = ActiveForm::begin([
            "method" => "post",
            "enableClientValidation" => true,
            "options" => ["enctype" => "multipart/form-data"],
        ]);
?>
<?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>
<?= Html::submitButton("subir", ["class" => "btn btn-primary"]) ?>
<?php $form->end() ?>
