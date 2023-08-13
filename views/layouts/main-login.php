<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
    <link rel="icon" type="image/x-icon" href="image/galaxy_icon.png">
    <style>
        .login-page{
            /*background-image: url(template/assets/images/galaxy.jpg);*/
            /*background-size: cover;*/
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }
        #panorama-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: -1; /* Move the panorama to the background */
        }
        .login-logo b {
            color: #cccccc;
        }
    </style>
</head>
<body class="hold-transition login-page">
<?php  $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?=Yii::$app->homeUrl?>"><b>Đăng nhập</b></a>
    </div>
    <!-- /.login-logo -->

    <?= $content ?>
</div>
<div id="panorama-container"></div>
<!-- /.login-box -->

<?php $this->endBody() ?>
<script>
    pannellum.viewer('panorama-container', {
        type: 'equirectangular',
        panorama: 'template/assets/images/galaxy.jpg',
        "autoLoad": true,
        autoRotate: 2,
        autoRotateInactivityDelay: 1000,
        autoRotateStopDelay: 5000,
        showZoomCtrl: false,
        showFullscreenCtrl: false,
    });
</script>
</body>
</html>

<?php $this->endPage() ?>