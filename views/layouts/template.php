<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this \yii\web\View */
/* @var $content string */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Cyborg - Awesome HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="template/assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="template/assets/css/owl.css">
    <link rel="stylesheet" href="template/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <!--

    TemplateMo 579 Cyborg Gaming

    https://templatemo.com/tm-579-cyborg-gaming

    -->
</head>
<body>
<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Search End ***** -->
<!--                    <div class="search-input">-->
<!--                        -->
                    use yii\helpers\Url;<?php
//
//                        use yii\widgets\ActiveForm;
//
//                        $form = ActiveForm::begin([
//                            'method' => 'get',
//                            'action' => ['site/home'],
//                        ]); ?>
<!--                        --><?php //= $form->field($searchModel, 'name')->input('text',['placeholder'=>'Search', 'id'=>'searchText', 'onkeypress'=>'handle', 'style' => 'background-color: #27292a; color: #ffffff;']) ?><!---->
<!--                        --><?php //ActiveForm::end();
//                        ?>
<!--                    </div>-->
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="<?= Url::to(['site/home']) ?>" class="active">Home</a></li>
                        <!--                        <li><a href="browse.html">Browse</a></li>-->
                        <li><a href="">Danh mục</a></li>
                        <li><a href="<?= Url::to(['user/favorite']) ?>">Favorites</a></li>
                        <?php if(!Yii::$app->user->isGuest){ ?>
                            <li><a href="<?= Url::to(['site/index']) ?>">Manager</a></li>
                        <?php }?>
                        <!--                        <li><a href="profile.html">Profile <img src="assets/images/profile-header.jpg" alt=""></a></li>-->
                        <li class="user">
                            <?php if(Yii::$app->user->isGuest){ ?>
                                <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user white"></i> Login</a>
                            <?php } else { ?>
                                <i class="fa fa-user"></i> <span><?= Yii::$app->user->identity->username ?></span>
                                <ul class="sub-user">
                                    <a href="#">
                                        <i><?=\app\models\UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]) !== null? Html::a('Profile', ['user-profile/profile', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></i>
                                        <i>
                                            <?php
                                            ActiveForm::begin();
                                            echo Html::a('Sign out', ['site/logout'],
                                                ['class' => 'dropdown-item',
                                                    'data' => [
                                                        'method' => 'post',
                                                    ],
                                                ]);
                                            ActiveForm::end();
                                            ?>
                                        </i>
                                        <i><?= Html::a('Change Password', ['user/change-pass/', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item'])?></i>

                                </ul>
                            <?php } ?>
                            </a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->



<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved.

                    <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
            </div>
        </div>
    </div>
</footer>

<div class="container">
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
</div>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="template/vendor/jquery/jquery.min.js"></script>
<script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="template/assets/js/isotope.min.js"></script>
<script src="template/assets/js/owl-carousel.js"></script>
<script src="template/assets/js/tabs.js"></script>
<!--<script src="template/assets/js/popup.js"></script>-->
<script src="template/assets/js/custom.js"></script>
</body>