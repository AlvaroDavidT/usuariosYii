<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\auth\models\AuthItem;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\modules\auth\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(
            ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'),
            ['prompt' => 'Selecccione el parent']
    )
            
    ?>
    

    <?= $form->field($model, 'child')->radioList(
    ArrayHelper::map(AuthItem::find()->all(), 'name', 'name' )) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
