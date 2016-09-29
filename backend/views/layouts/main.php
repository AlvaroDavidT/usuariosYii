<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
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
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
   
    if (Yii::$app->user->isGuest) {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Login', 'url' => ['/site/login']],
        
    ];
    } else {
         $menuItems= 
            [
                 ['label' => 'Parametrizacion','items' => 
                    [
                     ['label' => 'Base de datos','url' => ['/parametrizacionbdd/index']],
                  //   ['label' => 'Tag Xml','url' => ['/paramxml/index']],
                     ['label' => 'Envio Datos','url' => ['/parametrizacion-datos-envio/index']],
                    ]
                ],                 
               
                ['label' => 'Archivos', 'items' => 
                    [
                     ['label' => 'Subir Archivos','url' => ['/subir/subirxml']],
                     ['label' => 'Procesar Archivos','url' => ['/subidos/index']],
                     ['label' => 'Datos de archivos','url' => ['/subidos/datosxml']],
                    ]
                ],
                 ['label' => 'Documentos Pago','items' => 
                    [
                     ['label' => 'Pagos','url' => ['/documentospago/index']],
                    ]
                ],
               
                ['label' => 'Usuarios','items' => 
                    [
                     ['label' => 'Lista de usuario','url' => ['/user/index']],
                     ['label' => 'Asignacion Permisos','url' => ['/AuthAssignment/index']],
                     ['label' => '','url' => ['/user/index']],
                    ]
                ]
            ];     
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
        
    }
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right',

	                    'id'=>'navbar-id',

	                    'style'=>'font-size: 12px;',

	                    'data-tag'=>'yii2-menu',],
        'items' => $menuItems,
    ]);
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
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
