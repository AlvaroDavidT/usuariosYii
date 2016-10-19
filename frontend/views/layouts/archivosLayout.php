<?php
/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppArchivos;
use yii\bootstrap\Collapse;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\BaseHtml;
use yii\helpers\Url;

AppArchivos::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
      
            NavBar::begin([
                'brandLabel'=>'My App',
               // 'brandLabel' => Html::img('@web/images/maxresdefault.jpg', ['alt'=>Yii::$app->name,'style'=>'width:100px;']),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                    
                ],
            ]);

            if (Yii::$app->user->isGuest) {
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'Signup', 'url' => ['/site/signup']],
                    ['label' => 'Login', 'url' => ['/site/login']],
                ];
            } else {
                $menuItems = [
                ];
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                '<span class="glyphicon glyphicon-log-out"></span> Logout(' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link',
                                ]
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
        
                <div class="row">
                    <div class="col-sm-3 ">

                        <div class="panel panel-danger">
                            <div class="panel-heading text-center"><h4>Menu Principal</h4></div>
                            <div class="panel-body">
                                <?= 
              Html::img('@web/images/maxresdefault.jpg', ['alt'=>Yii::$app->name,'style'=>'width:200px;']);
                                      
            ?>
                                         
                                <hr>
                                <?=
                                Collapse::widget([
                                    'items' => [
                                        
                                        
                                        // equivalent to the above
                                        [
                                            'label' => 'Acciones con archivos',
                                            'content' => [
                                                BaseHtml::a('<span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Subir Archivos', Url::to(['/subir/subirxml']), ['class' => 'list-group-item']),
                                                BaseHtml::a('<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Archivos Subidos ', Url::to(['/subidos/index']), ['class' => 'list-group-item']),
                                                BaseHtml::a('<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Facturas ', Url::to(['/subidos/facturas']), ['class' => 'list-group-item']),
                                                BaseHtml::a('<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Retenciones ', Url::to(['/subidos/retenciones']), ['class' => 'list-group-item'])
                                        
                                                ],
                                            // open its content by default
                                            'contentOptions' => ['class' => 'in']
                                        ],
                                        // another group item
                                        [
                                            'label' => 'Parametrizaciones',
                                            'content' =>
                                            [
                                                BaseHtml::a('<span class="glyphicon glyphicon-wrench"></span> Base de Datos', Url::to(['/parametrizacionbdd/index']), ['class' => 'list-group-item']),
                                                BaseHtml::a('<span class="glyphicon glyphicon-random" aria-hidden="true"></span> Datos Facturas', Url::to(['/parametrizacion-datos-envio/index']), ['class' => 'list-group-item']),
                                                BaseHtml::a('<span class="glyphicon glyphicon-random" aria-hidden="true"></span> Datos Retenciones', Url::to(['/parametrizacion-envio-retenciones/index']), ['class' => 'list-group-item'])
                                        
                                                ],
                                            'contentOptions' => ['class' => 'collapsing',],
                                            'options' => ['style' => 'text-color: red'],
                                        ],
                                        // if you want to swap out .panel-body with .list-group, you may use the following
//                                        [
//                                            'label' => 'Permisos a usuarios',
//                                            'content' => [
//                                                 BaseHtml::a('<span class="glyphicon glyphicon-user"></span> Lista Usuarios', Url::to(['/parametrizacionbdd/index']), ['class' => 'list-group-item']),
//                                                 BaseHtml::a('<span class="glyphicon glyphicon-wrench"></span> Base de Datos', Url::to(['/parametrizacionbdd/index']), ['class' => 'list-group-item']),
//                                              
//                                            ],
//                                            'contentOptions' => [],
//                                            'options' => [],
//                                        //'footer' => 'Footer' // the footer label in list-group
                                        //],
                                    ]
                                ]);
                                ?>
                            </div>
                        </div>                 
                    </div>
                    <div class="col-sm-9">
                       
                           <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= $content ?> 
                       
                        
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
