<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=\yii\helpers\Url::to(['site/home'])?>" class="nav-link">Home</a>
        </li>



    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="media">
                    <img src="image/default.png" alt="User Avatar" class="img-size-32 img-circle mr-3">
                    <div class="media-body">
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header"><?=!Yii::$app->user->isGuest? Yii::$app->user->identity->username:""?></span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i><?= !Yii::$app->user->isGuest && \app\models\UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]) !== null? Html::a('Profile', ['user-profile/update/', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></i>
                        <i><?= !Yii::$app->user->isGuest? Html::a('Sign out', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) : Html::a('Login', ['site/login']) ?></i>
                        <i><?= !Yii::$app->user->isGuest? Html::a('Change Password', ['user/change-pass/', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item']) : "" ?></i>
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                </div>
            </a>
        </li>
    </ul>
    </ul>
</nav>
<!-- /.navbar -->