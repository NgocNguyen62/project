<?php

/** @var yii\web\View $this */
/** @var app\models\Products $model */

use kartik\rating\StarRating;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$searchModel = new \app\models\search\ProductsSearch();
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
  <<header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Search End ***** -->
                      <div class="search-input">
                          <?php
                          $form = ActiveForm::begin([
                              'method' => 'get',
                              'action' => ['site/home'],
                          ]); ?>
                          <?= $form->field($searchModel, 'name')->input('text',['placeholder'=>'Search', 'id'=>'searchText', 'onkeypress'=>'handle', 'style' => 'background-color: #27292a; color: #ffffff;']) ?>
                          <?php ActiveForm::end();
                          ?>
                      </div>
                      <!-- ***** Search End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="<?= Url::to(['site/home']) ?>" class="active">Home</a></li>
                          <!--                        <li><a href="browse.html">Browse</a></li>-->
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
                                          <i><?=\app\models\UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]) !== null? Html::a('Profile', ['user-profile/update/', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></i>
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

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Featured Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="feature-banner header-text">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="<?= $model->avatar ?>" alt="" style="border-radius: 23px; height:200px">
                  </div>
                  <div class="col-lg-8">
                    <div class="thumb">
<!--                      <img src="template/assets/images/feature-right.jpg" alt="" style="border-radius: 23px;">-->
                        <?= $this->render('view360', ['model'=>$model]) ?>
                      <a href="<?= Url::to(['view360', 'id'=>$model->id]) ?>" target="_blank"><i class="fa fa-play"></i></a>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Featured End ***** -->

          <!-- ***** Details Start ***** -->
          <div class="game-details">
            <div class="row">
              <div class="col-lg-12">
                <h2><?= $model->name ?></h2>
              </div>
              <div class="col-lg-12">
                <div class="content">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="left-info">
                        <div class="left">
                          <h4><?= $model->name ?></h4>
                          <span><?= $model->getCategory() ?></span>
                            <h4><a href="<?= Url::to(['products/rate', 'id'=>$model->id]) ?>">Rate</a></h4>
                        </div>
                        <ul>
                            <li>
                                <?php
                                $rate = $model->getRate();
                                $fullStars = floor($rate);
                                $hasHalfStar = ($rate - $fullStars) >= 0.5;
                                for($i = 0; $i < $fullStars; $i++){
                                    echo '<i class="fa fa-star"></i>';
                                }
                                if ($hasHalfStar) {
                                    echo '<i class="fa fa-star-half-o"></i>';
                                }

                                for ($i = 0; $i < 5 - $fullStars - ($hasHalfStar ? 1 : 0); $i++) {
                                    echo '<i class="fa fa-star-o"></i>';
                                }
                                ?>
                                <span>(<?= $model->countRate() ?> reviews)</span>
                            </li>
<!--                            <li><a href="--><?php //= Url::to(['products/rate', 'id'=>$model->id]) ?><!--">Rate</a></li>-->
                            <li><i class="fa fa-eye"></i> <?= $model->getViews() ?></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="right-info">
                        <ul>
                            <?php if($model->getQrcodes() !== null){ ?>
                          <li><img src="<?= $model->getQrcodes()->qr ?>" alt="qr" style="height: 80px; width: 80px" class="qr-code"></li>
                            <?php } ?>
                            <li><i class="fa fa-star"></i> 4.8</li>
                            <li><i class="fa fa-server"></i> 36GB</li>
                          <li><i class="fa fa-gamepad"></i> Action</li>
                        </ul>
                      </div>
                    </div>
<!--                    <div class="col-lg-4">-->
<!--                      <img src="template/assets/images/details-01.jpg" alt="" style="border-radius: 23px; margin-bottom: 30px;">-->
<!--                    </div>-->
<!--                    <div class="col-lg-4">-->
<!--                      <img src="template/assets/images/details-02.jpg" alt="" style="border-radius: 23px; margin-bottom: 30px;">-->
<!--                    </div>-->
<!--                    <div class="col-lg-4">-->
<!--                      <img src="template/assets/images/details-03.jpg" alt="" style="border-radius: 23px; margin-bottom: 30px;">-->
<!--                    </div>-->
                    <div class="col-lg-12">
                        <p>
                            <?= $model->description ?>
                        </p>
                    </div>
                    <div class="col-lg-12">
                      <div class="main-border-button">
                          <?php
                          ActiveForm::begin();
                          if(!Yii::$app->user->isGuest && $model->isFavorite()){
                              echo Html::a('Remove from favorite',
                                  ['favorite/delete', 'id' => \app\models\base\Favorite::findOne(['product_id'=>$model->id])->id],
                                  [
                                      'class' => 'btn btn-danger',
                                      'data' => [
                                          'method' => 'post', // Set the method to POST
                                          'confirm' => 'Are you sure you want to remove this product from favorites?',
                                      ],
                                  ]
                                );
                          } else{
                              echo Html::a('Add to favorites', ['favorite/create', 'product_id' => $model->id]);
                          }
                          ActiveForm::end();
                          ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Details End ***** -->

          <!-- ***** Other Start ***** -->
          <div class="other-games">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4>Related</h4>
                </div>
              </div>
                <?php
                $related = $model->getProductOfCate($model->category_id, 4);
                ?>
                <?php foreach ($related as $item){ ?>
                    <div class="col-lg-6">
                        <a href="<?= Url::to(['products/details', 'id' => $item->id]) ?>">
                        <div class="item">
                            <img src="<?= $item->avatar ?>" alt="" class="templatemo-item">
                            <h4><?= $item->name?></h4><span><?= $item->getCategory()?></span>
                            <ul>
                                <li><i class="fa fa-star"></i> <?= $item->getRate()?></li>
                                <li><i class="fa fa-eye"></i> <?= $item->getViews() ?></li>
                            </ul>
                        </div>
                        </a>
                    </div>

                <?php } ?>
            </div>
          </div>
          <!-- ***** Other End ***** -->

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
