<?php

use kartik\rating\StarRating;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\bootstrap4\LinkPager;

//use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$products = $dataProvider->getModels();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <title>Product 360 - Home</title>
    <link rel="icon" type="image/x-icon" href="image/galaxy_icon.png">

    <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="template/assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="template/assets/css/owl.css">
    <link rel="stylesheet" href="template/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
                            'action' => ['site/home'],
                        ]); ?>
                        <?= $form->field($searchModel, 'name')->input('text', ['placeholder' => 'Tìm kiếm', 'id' => 'searchText', 'onkeypress' => 'handle', 'style' => 'background-color: #27292a; color: #ffffff;']) ?>
                        <!--                        <div class="form-group">-->
                        <!--                            --><?php //= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                        <!--                        </div>-->

                        <?php ActiveForm::end();
                        ?>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="<?= Url::to(['site/home']) ?>" class="active">Trang chủ</a></li>
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
<!--                                <i class="fa fa-user"></i> <span>--><?php //= Yii::$app->user->identity->username ?><!--</span>-->
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

                <!-- ***** Banner Start ***** -->
                <div class="main-banner">

                </div>
                <!-- ***** Banner End ***** -->

                <!-- ***** Most Popular Start ***** -->
                <div class="most-popular">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4>Sản phẩm</h4>
                            </div>
                            <div class="row">
                                <?php foreach ($products as $product) {
                                    if ($product->status != 0) { ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <a href="<?= Url::to(['products/details', 'id' => $product->id]) ?>">
                                                <div class="item">
                                                    <img src="<?= $product->avatar ?>" alt="">
                                                    <h4><?= $product->name ?>
                                                        <br><span><?= $product->getCategory() ?></span></h4>
                                                    <ul>
                                                        <li><i class="fa fa-star"></i> <?= $product->getRate() ?></li>
                                                        <li><i class="fa fa-eye"></i> <?= $product->getViews() ?></li>
<!--                                                        <li>-->
<!--                                                            <a href="--><?php //= Url::to(['products/rate', 'id' => $product->id])?><!--" class="openRateModal" data-target="#rateModal_--><?php //= $product->id?><!--">Đánh giá</a>-->
<!--                                                        </li>-->
<!--                                                        <div class="modal fade" id="rateModal_--><?php //= $product->id?><!--" tabindex="-1" role="dialog" aria-labelledby="rateModalLabel" aria-hidden="true">-->
<!--                                                                                                        <div class="modal-dialog" role="document">-->
<!--                                                                                                            <div class="modal-content">-->
<!--                                                                                                                <div class="modal-header">-->
<!--                                                                                                                    <h5 class="modal-title" id="rateModalLabel">Rate Product</h5>-->
<!--                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                                                                                                        <span aria-hidden="true">&times;</span>-->
<!--                                                                                                                    </button>-->
<!--                                                                                                                </div>-->
<!--                                                                                                                <div class="modal-body" id="rateModalContent">-->
<!--                                                    Content of rate.php will be loaded here -->
<!--                                                                                                                </div>-->
<!--                                                                                                            </div>-->
<!--                                                                                                        </div>-->
<!--                                                                                                    </div>-->
<!--                                                        <li>-->
<!--                                                            --><?php
//
//                                                            Modal::begin([
//                                                                'toggleButton' => [
//
//                                                                    'label' => 'Đánh giá',
//
//                                                                    'class' => "btn btn-link openRateModal",
//                                                                    'data-url' => Url::to(['products/rate', 'id' => $product->id]),
//
//                                                                ],
//
//                                                                'closeButton' => [
//
//                                                                    'label' => 'Close',
//
//                                                                    'class' => 'btn btn-danger btn-sm pull-right',
//                                                                    'id' => 'modal-button-close'
//
//                                                                ],
//
//                                                                'size' => 'modal-lg',
////                                                                'options' => [
//////                                                                    'id' => 'rateModal_' . $product->id
////                                                                    'data-bs-backdrop' => 'true',
////                                                                ],
//                                                                'id' => 'rateModalContent',
//
//
//                                                            ]);
//                                                            echo "<div id='rateModalContent'></div>";
//                                                            Modal::end();
//
//                                                            ?>
<!--                                                        </li>-->
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    <?php }
                                } ?>

                            </div>
                        </div>
                    </div>
                    <div class="page">
                        <?php
                        echo LinkPager::widget([
                            'pagination' => $dataProvider->pagination,
//                        'options' => ['class' => 'custom-pagination'], // Thêm lớp custom-pagination
                            'options' => ['style' => 'margin: 5px;
                                                   display: flex;
                                                   justify-content: center;'
                            ],
                        ]);
                        ?>
                    </div>
                </div>

                <!-- ***** Most Popular End ***** -->

                <!-- ***** Gaming Library Start ***** -->
                <!--                <div class="gaming-library">-->
                <!--                    <div class="col-lg-12">-->
                <!--                        <div class="heading-section">-->
                <!--                            <h4><em>Your Gaming</em> Library</h4>-->
                <!--                        </div>-->
                <!--                        <div class="item">-->
                <!--                            <ul>-->
                <!--                                <li><img src="assets/images/game-01.jpg" alt="" class="templatemo-item"></li>-->
                <!--                                <li><h4>Dota 2</h4><span>Sandbox</span></li>-->
                <!--                                <li><h4>Date Added</h4><span>24/08/2036</span></li>-->
                <!--                                <li><h4>Hours Played</h4><span>634 H 22 Mins</span></li>-->
                <!--                                <li><h4>Currently</h4><span>Downloaded</span></li>-->
                <!--                                <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>-->
                <!--                            </ul>-->
                <!--                        </div>-->
                <!--                        <div class="item">-->
                <!--                            <ul>-->
                <!--                                <li><img src="assets/images/game-02.jpg" alt="" class="templatemo-item"></li>-->
                <!--                                <li><h4>Fortnite</h4><span>Sandbox</span></li>-->
                <!--                                <li><h4>Date Added</h4><span>22/06/2036</span></li>-->
                <!--                                <li><h4>Hours Played</h4><span>740 H 52 Mins</span></li>-->
                <!--                                <li><h4>Currently</h4><span>Downloaded</span></li>-->
                <!--                                <li><div class="main-border-button"><a href="#">Donwload</a></div></li>-->
                <!--                            </ul>-->
                <!--                        </div>-->
                <!--                        <div class="item last-item">-->
                <!--                            <ul>-->
                <!--                                <li><img src="assets/images/game-03.jpg" alt="" class="templatemo-item"></li>-->
                <!--                                <li><h4>CS-GO</h4><span>Sandbox</span></li>-->
                <!--                                <li><h4>Date Added</h4><span>21/04/2036</span></li>-->
                <!--                                <li><h4>Hours Played</h4><span>892 H 14 Mins</span></li>-->
                <!--                                <li><h4>Currently</h4><span>Downloaded</span></li>-->
                <!--                                <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>-->
                <!--                            </ul>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    <div class="col-lg-12">-->
                <!--                        <div class="main-button">-->
                <!--                            <a href="profile.html">View Your Library</a>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
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

                    <br>Design: <a href="https://templatemo.com" target="_blank"
                                   title="free CSS templates">TemplateMo</a></p>
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<!--<script src="template/vendor/jquery/jquery.min.js"></script>-->
<script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="template/assets/js/isotope.min.js"></script>-->
<script src="template/assets/js/owl-carousel.js"></script>
<script src="template/assets/js/tabs.js"></script>
<!--<script src="template/assets/js/popup.js"></script>-->
<script src="template/assets/js/custom.js"></script>

<script src="js/popup.js"></script>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!--        var url;-->
<!--        // Handle the click event of the "Rate Product" links-->
<!--        $(document).on('click', '.openRateModal', function (e) {-->
<!--            e.preventDefault();-->
<!---->
<!--            // Get the URL of rate.php from the link's href attribute-->
<!--            // var rateUrl = $(this).attr("href");-->
<!--            var rateUrl = $(this).data("url");-->
<!--            url = rateUrl;-->
<!--            // Get the target modal ID from the link's data-target attribute-->
<!--            var modalId = $(this).data("target");-->
<!---->
<!--            // Use AJAX to load the content of rate.php into the modal-->
<!--            $.ajax({-->
<!--                url: rateUrl,-->
<!--                type: "GET",-->
<!--                success: function (response) {-->
<!--                    // Set the loaded content into the modal body-->
<!--                    $(modalId).find(".modal-body").html(response);-->
<!---->
<!--                    // Show the modal-->
<!--                    $('#rateModalContent').modal("show");-->
<!--                },-->
<!--                error: function (xhr, status, error) {-->
<!--                    // Handle the error if needed-->
<!--                    alert("An error occurred. Please try again later.");-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--        $(document).on('click', '#modal-button-close, .modal-backdrop', function(e) {-->
<!--            // Hide the modal when close button is clicked or a button in the footer is clicked-->
<!--            // $(this).closest(".modal").modal("hide");-->
<!--            // $(url).css({-->
<!--            //     'display':'none'-->
<!--            // })-->
<!--            $('#rateModalContent').modal('hide');-->
<!--        });-->
<!--        $(document).on("hidden.bs.modal", function () {-->
<!--            location.reload();-->
<!--            $('body').css('margin', 0);-->
<!--        });-->
<!--    });-->
<!--</script>-->


</body>

</html>
