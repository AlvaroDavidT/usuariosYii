<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Companias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'compania_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compania_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compania_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compania_estado')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
