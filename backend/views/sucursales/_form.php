<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companias;
/* @var $this yii\web\View */
/* @var $model backend\models\Sucursales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sucursales-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'companias_compania_id')->dropDownList(
            ArrayHelper::map(Companias::find()->all(), 'compania_id', 'compania_nombre'), ['prompt' => 'Selecione la compania']
    )
    ?>

    <?= $form->field($model, 'sucursal_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sucursal_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sucursal_estado')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
