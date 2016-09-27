<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParametrizacionDatosEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametrizacion Datos Envios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrizacion-datos-envio-index">

    <h2><?= Html::encode($this->title) ?></h2>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?=
        Html::a('Crear campo', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-primary',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]);
        ?>
    </p>
    <?php Pjax::begin() ?>
    <?=
    GridView::widget([
        'id' => 'Par-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'DatoXml',
            'Tabla',
            'Campo',
            [
             'label'=>'Tipo',
             'value' => function($model) { return $model->Tipo == 0 ? 'FIJO' : 'VARIABLE';},
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => ['update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'id' => 'activity-index-link',
                                    'title' => Yii::t('app', 'Update'),
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modal',
                                    'data-url' => Url::to(['update', 'id' => $model->id]),
                                    'data-pjax' => '0',
                        ]);
                    },
                        ]
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end() ?>
            <?php
            $this->registerJs(
            "$(document).on('click', '#activity-index-link', (function() {
                $.get(
                    $(this).data('url'),
                    function (data) {
                        $('.modal-body').html(data);
                        $('#modal').modal();
                    }
                );
            }));"
            );
            ?>
    
    
            <?php
            
            Modal::begin([
                        'id' => 'modal',
                        'header' => '<h5 class="modal-title">Complete</h5>',
                        // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
                        'size' => 'modal-sm',
                        'options' => [
                            'title' => 'crear registro',
                            
                        ]
                    ]);
                    echo "<div class='well'></div>";
            Modal::end();
            
            ?>
    
    
</div>
