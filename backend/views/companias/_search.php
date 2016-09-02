<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompaniasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'compania_id') ?>

    <?= $form->field($model, 'compania_nombre') ?>

    <?= $form->field($model, 'compania_email') ?>

    <?= $form->field($model, 'compania_direccion') ?>

    <?= $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'compania_inicio_fecha') ?>

    <?php // echo $form->field($model, 'compania_creado_fecha') ?>

    <?php // echo $form->field($model, 'compania_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
