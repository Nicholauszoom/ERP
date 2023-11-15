<?php

use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

 $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  

    <?php $this->head();
      echo Html::cssFile('@web/vendors/bootstrap/dist/css/bootstrap.min.css');
      echo Html::cssFile('@web/vendors/font-awesome/css/font-awesome.min.css');
      echo Html::cssFile('@web/vendors/nprogress/nprogress.css');
      echo Html::cssFile('@web/vendors/iCheck/skins/flat/green.css');
      echo Html::cssFile('@web/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css');
      echo Html::cssFile('@web/vendors/jqvmap/dist/jqvmap.min.css');
      echo Html::cssFile('@web/vendors/bootstrap-daterangepicker/daterangepicker.css');
      echo Html::cssFile('@web/build/css/custom.min.css');
      echo Html::cssFile('href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"');
      // echo Html::cssFile('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.3/font/bootstrap-icons.css');
      echo Html::cssFile('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');

      $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
      // $this->registerJsFile('https://code.jquery.com/ui/1.12.1/jquery-ui.js');



      // echo Html::img('@web/images/favicon.png', ['alt' => 'Image'ng">


    
  $this->registerJsFile('@web/vendors/jquery/dist/jquery.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/bootstrap/dist/js/bootstrap.bundle.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/fastclick/lib/fastclick.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/nprogress/nprogress.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/Chart.js/dist/Chart.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/gauge.js/dist/gauge.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/iCheck/icheck.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/skycons/skycons.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/Flot/jquery.flot.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/Flot/jquery.flot.pie.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/Flot/jquery.flot.time.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/Flot/jquery.flot.resize.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/flot.orderbars/js/jquery.flot.orderBars.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/flot-spline/js/jquery.flot.spline.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/flot.curvedlines/curvedLines.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/DateJS/build/date.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/jqvmap/dist/jquery.vmap.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/jqvmap/dist/maps/jquery.vmap.world.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/vendors/bootstrap-daterangepicker/daterangepicker.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('@web/build/js/custom.min.js', ['depends' => 'yii\web\YiiAsset']);
  $this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js');
  $this->registerJsFile('@web/js/dashjs.js', ['depends' => 'yii\web\YiiAsset']);
  // $this->registerJsFile('@web/select2/dist/js/select2.min.js', ['depends' => 'yii\web\YiiAsset']);

 

    ?>
<style>

.loading-bar-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.loading-bar {
  position: relative;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 4px solid #f3f3f3;
  border-top: 4px solid #3498db;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.progresses{
    display: flex;
        align-items: center;
   }

   .line{

        width: 120px;
    height: 6px;
    background: #63d19e;
   }
   .no_line{


    width: 120px;
    height: 6px;
    background: #ccc;
   }

   
   .steps{

    display: flex;
    background-color: #63d19e;
    color: #fff;
    font-size: 14px;
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    border-radius: 50%;

   }

  .completed{

display: flex;
background-color: #ccc;
color: #fff;
font-size: 14px;
width: 40px;
height: 40px;
align-items: button_viewcenter;
justify-content: center;
border-radius: 50%;

}


#counter {
    font-family: "Times New Roman", Times, serif;
    font-size: 15px;
    text-align: center;
    margin: 15px;
    background-color:slategray;
    color: #fff;
    padding: 8px;
    border-radius: 50% 50% 10% 10%;
}


.avatar{
width:200px;
height:200px;
}	

.notification-items {
    max-height: 200px;
    overflow-y: auto;
}

.notification-items .link {
    display: block;
    padding: 10px;
    color: #333;
    text-decoration: none;
}

.notification-items .link:hover {
    background-color: #f5f5f5;
}

.notification-items .link .btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notification-items .link .mail-desc {
    font-size: 14px;
}

.notification-items .link h5 {
    font-size: 16px;
    margin-bottom: 5px;
}

.animated-badge {
    animation: badge-animation 1s infinite;
}

@keyframes badge-animation {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.5);
    }
    100% {
        transform: scale(1);
    }
}

.truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 100%; /* Adjust this width to match the container width */
  }
</style>

   
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
