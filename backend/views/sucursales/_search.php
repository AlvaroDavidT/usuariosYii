<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SucursalessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sucursales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sucursal_id') ?>

    <?= $form->field($model, 'companias_compania_id') ?>

    <?= $form->field($model, 'sucursal_nombre') ?>

    <?= $form->field($model, 'sucursal_direccion') ?>

    <?= $form->field($model, 'sucursal_creado_fecha') ?>

    <?php // echo $form->field($model, 'sucursal_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
