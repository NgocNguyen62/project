<?php

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var app\models\base\Rate $rate */

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

    <title>Product 360 - Chi tiết sản phẩm</title>
      <link rel="icon" type="image/x-icon" href="image/galaxy_icon.png">


      <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="template/assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="template/assets/css/owl.css">
    <link rel="stylesheet" href="template/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
      <link rel="stylesheet" href="css/details.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                          <li><a href="<?= Url::to(['user/favorite']) ?>"> Yêu thích </a></li>
                          <?php if (!Yii::$app->user->isGuest) { ?>
                              <li><a href="<?= Url::to(['site/index']) ?>">Quản lý </a></li>
                          <?php } ?>
                          <!--                        <li><a href="profile.html">Profile <img src="assets/images/profile-header.jpg" alt=""></a></li>-->
                          <ul class="user">
                              <?php if (Yii::$app->user->isGuest) { ?>
                                  <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user white"></i> Đăng nhập </a>
                              <?php } else { ?>
                                  <img src="<?= !file_exists(Yii::$app->user->identity->getUserProfiles()->avatar)? "image/default.png":Yii::$app->user->identity->getUserProfiles()->avatar?>" alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px; margin-left: 40px; margin-bottom: 5px">
                                  <span><?= Yii::$app->user->identity->username ?></span>
                                  <ul class="sub-user">
                                      <!--                                    <a href="#">-->
                                      <li></li>
                                      <li><?= \app\models\UserProfile::findOne(['user_id' => Yii::$app->user->identity->id]) !== null ? Html::a('Thông tin', ['user-profile/update/', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></li>
                                      <li><?= Html::a('Đổi mật khẩu', ['user/change-pass/', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item']) ?></li>
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
                      </ul>]
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
<!--                      <a href="--><?php //= Url::to(['view360', 'id'=>$model->id]) ?><!--" target="_blank"><i class="fa fa-play"></i></a>-->
                        <!-- Trigger/Open The Modal -->
                        <button id="myBtn" data-url="<?= Url::to(['view360', 'id'=>$model->id]) ?>"><i class="fa fa-play"></i> </button>

                        <!-- The Modal -->
                        <div id="myModal" class="modal">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div class="modal-body"></div>
                            </div>

                        </div>

                        <?php

                        Modal::begin([
                            'toggleButton' => [

                                'label' => ' <i class="fa fa-play"> </i>',

                                'class' => "btn btn-link openRateModal",
                                'data-url' => Url::to(['products/view360', 'id' => $model->id]),

                            ],

                            'closeButton' => [

                                'label' => 'Close',

                                'class' => 'btn btn-danger btn-sm pull-right',
                                'id' => 'modal-button-close'

                            ],

                            'size' => 'modal-lg',
//                                                                'options' => [
//                                                                    'id' => 'rateModal_' . $product->id
//                                                                ],
                            'id' => 'rateModalContent',


                        ]);
                        echo "<div id='rateModalContent'></div>";
                        Modal::end();

                        ?>


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
<!--                            <h4><a href="--><?php //= Url::to(['products/rate', 'id'=>$model->id]) ?><!--">Đánh giá</a></h4>-->
                        </div>
                        <ul>

<!--                            <li><a href="--><?php //= Url::to(['products/rate', 'id'=>$model->id]) ?><!--">Rate</a></li>-->
                            <?php if($model->getQrcodes() !== null){ ?>
                                <li><img src="<?= $model->getQrcodes()->qr ?>" alt="qr" style="height: 80px; width: 80px" class="qr-code"></li>
                            <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="left-info">
                          <div class="left">
                              <ul>
                              <li>Lượt xem: <?= $model->getViews() ?> <i class="fa fa-eye"></i></li>
                              </ul>
                          </div>
                            <li></li>
                          <ul>
                            <li>
                                <div class="stars">
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
                                </div>
                                <span><?= $model->getRate() ?>/5</span>
                                <span>(<?= $model->countRate() ?> lượt đánh giá)</span>
                            </li>
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
                          <div class="tab">
                              <button class="tablinks" onclick="openCity(event, 'London')">Mô tả</button>
                              <button class="tablinks" onclick="openCity(event, 'Rating')">Đánh giá</button>
                          </div>

                          <div id="London" class="tabcontent">
                              <p>
                                  <?= $model->description ?>
                              </p>
                          </div>

                          <div id="Rating" class="tabcontent">
                              <?php if(Yii::$app->user->isGuest){?>
                                  <h4>Cần đăng nhập để đánh giá!</h4>
                                  <a href="<?= Url::to(['site/login']) ?>"> Đăng nhập </a>
                                  <br>
                                  <br>
                              <?php } else{ ?>
                              <div class="rate-form">
                                  <?php $form = ActiveForm::begin(['options'=>['id'=>'rate-product']]); ?>
                                  <?php
                                  $value = \app\models\base\Rate::findOne(['product_id'=>$model->id, 'user_id'=>Yii::$app->user->identity->id]);
                                  echo StarRating::widget([
                                      'name' => 'Rate[rate]',
                                      'model' => $rate,
                                      'attribute' => 'rate',
                                      'value'=> $value == null? 0 : $value->rate,
                                      'pluginOptions' => [
                                          'stars' => 5,
                                          'min' => 0,
                                          'max' => 5,
                                          'step' => 1,
                                          'symbol' => html_entity_decode('&#xe005;', ENT_QUOTES, "utf-8"),
                                          'defaultCaption' => '{rating} sao',
                                          'starCaptions'=>[],
                                          'starCaptionsCallback' => new yii\web\JsExpression('function(rating, index) {
                                                                                                    return index;
                                                                                                }'),
                                          'starClickedCallback' => new yii\web\JsExpression('function(rating, index) {
                                                $("#rating-input").val(rating);
                                            }'),
                                      ],
                                      'options' => ['class' => 'form-control']
                                  ]);
                                  ?>
                                <br>
                              <div class="form-group">
                                      <?= Html::submitButton('Lưu', ['class' => 'myBtn']) ?>
                                  </div>

                                  <?php ActiveForm::end(); ?>

                              </div>
                              <?php }  ?>
                              <?php for($i = 5; $i >= 1; $i--){ ?>
                              <div class="chart">
                                  <div class="side">
                                      <div><?= $i ?> star</div>
                                  </div>
                                  <div class="middle">
                                      <div class="bar-container">
                                          <div class="bar"></div>
                                      </div>
                                  </div>
                                  <div class="side right"  id = 'chart-data' data-data = '<?= json_encode($model->countRate()!=0?$model->getEachRate($i)/$model->countRate()*100:0) ?>'>
                                      <div><?= $model->getEachRate($i) ?> lượt</div>
                                  </div>
                              </div>
                              <?php } ?>

                          </div>
                      </div>

                    <div class="col-lg-12">
                      <div class="main-border-button">
                          <?php
                          ActiveForm::begin();
                          if(!Yii::$app->user->isGuest && $model->isFavorite()){
                              echo Html::a('Loại khỏi danh sách yêu thích',
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
                              echo Html::a('Thêm vào danh sách yêu thích', ['favorite/create', 'product_id' => $model->id]);
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
                  <h4>Sản phẩm liên quan </h4>
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
  <script src="js/popup.js"></script>
<!--  <script src="js/modal.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/rating.js"></script>
  <script>
      function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }
  </script>
  </body>

</html>
