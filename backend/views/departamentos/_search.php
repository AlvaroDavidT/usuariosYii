<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DepartamentosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'departamento_id') ?>

    <?= $form->field($model, 'sucursales_sucursal_id') ?>

    <?= $form->field($model, 'departamento_nombre') ?>

    <?= $form->field($model, 'companias_compania_id') ?>

    <?= $form->field($model, 'departamento_creado_fecha') ?>

    <?php // echo $form->field($model, 'deparamento_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
