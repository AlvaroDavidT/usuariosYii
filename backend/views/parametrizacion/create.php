<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Parametrizacion */

$this->title = 'Create Parametrizacion';
$this->params['breadcrumbs'][] = ['label' => 'Parametrizacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
