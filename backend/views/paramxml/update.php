<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Paramxml */

$this->title = 'Update Paramxml: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paramxmls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paramxml-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
