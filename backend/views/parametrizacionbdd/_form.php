<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 

<div class="parametrizacionbdd-form">
    <?php
    
    $form = ActiveForm::begin([
                'id' => 'parametrizacionbdd-form',
                'enableAjaxValidation' => true,
                'enableClientScript' => true,
                'enableClientValidation' => true,  
    ]);
    ?>  
    <?=$form->field($model, 'BDD')->textInput(['maxlength' => true])?>
    <?= $form->field($model, 'StringBDD')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'SchemaBDD')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'UserBDD')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'PasswordBDD')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs('

    // obtener la id del formulario y establecer el manejador de eventos
        $("form#parametrizacionbdd-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#Parr-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.defaultPrevented();
            e.stopImmediatePropagation();
            return false;
        });
    ');
    ?>
</div>