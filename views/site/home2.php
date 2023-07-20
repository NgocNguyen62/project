<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$products = $dataProvider->getModels();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width-device-width, initial-scale-1.0">-->
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
<header>
    <div class="title">
        <h1>Home</h1>
    </div>
    <div class="menu">
        <li><a href="">SP1</a></li>
        <li>SP2</li>
    </div>
    <div class="others">
        <li><input placeholder="Tìm kiếm" type="text"><i class="fa fa-search"></i></li>
        <?php

        if (Yii::$app->user->isGuest) {?>
            <li><a href="">Đăng nhập</a> </li>
        <?php } else {?>
            <li><img src="image/default.png" alt="User Avatar" class="img-size-32 img-circle mr-3">
                <ul class="sub-user">
                    <span class="dropdown-header"><?=!Yii::$app->user->isGuest? Yii::$app->user->identity->username:""?></span>
                    <a href="#">
                        <i><?=\app\models\UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]) !== null? Html::a('Profile', ['user-profile/update/', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></i>
                        <i><?= Html::a('Sign out', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?></i>
                        <i><?= Html::a('Change Password', ['user/change-pass/', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item'])?></i>
                    </a>
                </ul>
            </li>
        <?php } ?>
    </div>

</header>

<section class="wrapper">
    <div class="products">
        <ul>
        <?php foreach ($products as $product) { ?>
            <li class="main-product">
                <div class="img-product">
                    <img class="img-prd" src="<?= $product->avatar ?>", alt="">
                </div>
                <div class="content-product">
                    <h3></h3>
                    <div class="content-product-details">
                        <span><?= $product->name ?></span>
                        <span>Lượt xem: </span>
                    </div>
                </div>
            </li>
        <?php } ?>
        </ul>
    </div>
</section>
</body>
</html>