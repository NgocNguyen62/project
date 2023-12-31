<?php

/** @var yii\web\View $this */
///** @var app\models\User $model */
/** @var app\models\search\ProductsSearch $searchModel */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$favorites = Yii::$app->user->identity->getFavorite();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Product 360 - Yêu thích</title>
      <link rel="icon" type="image/x-icon" href="image/galaxy_icon.png">


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
                      <div class="search-input">
                          <?php
                          $form = ActiveForm::begin([
                              'method' => 'get',
                              'action' => ['site/favorite'],
                          ]); ?>
                          <?= $form->field($searchModel, 'name')->input('text',['placeholder'=>'Tìm kiếm', 'id'=>'searchText', 'onkeypress'=>'handle', 'style' => 'background-color: #27292a; color: #ffffff;']) ?>
                          <?php ActiveForm::end();
                          ?>
                      </div>
                      <!-- ***** Search End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="<?= Url::to(['site/home']) ?>">Trang chủ</a></li>
                          <!--                        <li><a href="browse.html">Browse</a></li>-->
                          <li><a href="<?= Url::to(['site/categories']) ?>">Danh mục</a></li>
                          <li><a href="<?= Url::to(['user/favorite']) ?>" class="active"> Yêu thích </a></li>
                          <?php if(!Yii::$app->user->isGuest){ ?>
                              <li><a href="<?= Url::to(['site/index']) ?>">Quản lý </a></li>
                          <?php }?>
                          <!--                        <li><a href="profile.html">Profile <img src="assets/images/profile-header.jpg" alt=""></a></li>-->
                          <ul class="user">
                              <?php if(Yii::$app->user->isGuest){ ?>
                                  <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user white"></i> Đăng nhập </a>
                              <?php } else { ?>
                                  <img src="<?= !file_exists(Yii::$app->user->identity->getUserProfiles()->avatar)? "image/default.png":Yii::$app->user->identity->getUserProfiles()->avatar?>" alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px; margin-left: 40px; margin-bottom: 5px">
                                  <span><?= Yii::$app->user->identity->username ?></span>
                                  <ul class="sub-user">
                                      <!--                                    <a href="#">-->
                                      <li></li>
                                      <li><?=\app\models\UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]) !== null? Html::a('Thông tin', ['user-profile/update/', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></li>
                                      <li><?= Html::a('Đổi mật khẩu', ['user/change-pass/', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item'])?></li>
                                      <li>
                                          <?php
                                          ActiveForm::begin();
                                          echo Html::a('Đăng xuất ', ['site/logout'],
                                              ['class' => 'dropdown-item',
                                                  'data' => [
                                                      'method' => 'post',
                                                  ],
                                              ]);
                                          ActiveForm::end();
                                          ?>
                                      </li>
                                      <li></li>
                                  </ul>
                              <?php } ?>
                              </a></ul>
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

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

            <div class="most-popular">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4>Sản phẩm yêu thích</h4>
                        </div>
                        <div class="row">
                            <?php foreach ($favorites as $product) { ?>
                                <div class="col-lg-3 col-sm-6">
                                    <a href="<?= Url::to(['products/details', 'id' => $product->id]) ?>">
                                        <div class="item">

                                            <img src="<?= $product->avatar ?>" alt="">
                                            <h4><?= $product->name ?><br><span><?= $product->getCategory()?></span></h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i> <?= $product->getRate()?></li>
                                                <li><i class="fa fa-eye"></i> <?= $product->getViews() ?></li>
<!--                                                <li><a href="--><?php //= Url::to(['products/rate', 'id'=>$product->id]) ?><!--">Rate</a></li>-->
                                            </ul>
                                            <?php
                                            ActiveForm::begin();
                                            echo Html::a(' Xóa',
                                                ['favorite/delete', 'id' => \app\models\base\Favorite::findOne(['product_id'=>$product->id])->id],
                                                [
                                                    'class' => 'delete-item',
                                                    'data' => [
                                                        'method' => 'post', // Set the method to POST
                                                        'confirm' => 'Are you sure you want to remove this product from favorites?',
                                                    ],

                                                ]
                                            );
                                            ActiveForm::end();
                                            ?>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
<!--                            <div class="main-button">-->
<!--                                <a href="#">Discover Popular</a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>

          <!-- ***** Gaming Library Start ***** -->

          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
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


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="template/assets/js/isotope.min.js"></script>
  <script src="template/assets/js/owl-carousel.js"></script>
  <script src="template/assets/js/tabs.js"></script>
  <script src="template/assets/js/popup.js"></script>
  <script src="template/assets/js/custom.js"></script>


  </body>

</html>
