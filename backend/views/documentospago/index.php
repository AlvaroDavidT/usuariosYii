<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;



$this->title = 'Tabla de documentos pago';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">


    <h4><?= Html::encode($this->title) ?></h4>
    <hr>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            'DCPG_FOL_DOCTO',
            'PRSH_CDG_PERS',
            'DCPG_FCH_PAGO',
           'DCPG_VLR_AFECTO',
        ],
    ]);

    ?>
    
</div>
