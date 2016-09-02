<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\modules\auth\models\AuthItem
/* @var $this yii\web\View */
/* @var $model common\modules\auth\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'item_name')->dropDownList(
           ArrayHelper::map(AuthItem::find()->all(),'name','name'),['prompt' => 'seleccione usuario']) 
    ?>
    <?= $form->field($model, 'user_id')->dropDownList(
           ArrayHelper::map(User::find()->all(),'id','username'),['prompt' => 'seleccione usuario']) 
    ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
