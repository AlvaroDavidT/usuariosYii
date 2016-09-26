<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Subir archivos xml';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
            "method" => "post",
            "enableClientValidation" => true,
            "options" => ["enctype" => "multipart/form-data"],
        ]);
?>
<?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>
<?= Html::submitButton("Subir archivo", ["class" => "btn btn-primary"]) ?>
<?php $form->end() ?>
