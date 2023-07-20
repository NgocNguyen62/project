<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$products = $dataProvider->getModels();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Client Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
    </div>
    <div class="humberger__menu__widget">

        <div class="header__top__right__auth">
<!--            --><?php
//                if(Yii::$app->user->isGuest) {
//                    echo Html::a('Login', ['site/login']);
//                } else{
//                    echo "đ";
//                }
//                    ?>
            <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
<!--    <div class="humberger__menu__contact">-->
<!--        <ul>-->
<!--            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>-->
<!--            <li>Free Shipping for all Order of $99</li>-->
<!--        </ul>-->
<!--    </div>-->
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
<!--                        <ul>-->
<!--                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>-->
<!--                            <li>Free Shipping for all Order of $99</li>-->
<!--                        </ul>-->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>

                        <div class="header__top__right__auth">
                            <?php if(Yii::$app->user->isGuest){ ?>
                            <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user"></i> Login</a>
                            <?php } else { ?>
                                <li><i class="fa fa-user"></i> <?= Yii::$app->user->identity->username ?></li>
                                <ul class="sub-user">
                                    <a href="#">
                                        <i><?=\app\models\UserProfile::findOne(['user_id'=>Yii::$app->user->identity->id]) !== null? Html::a('Profile', ['user-profile/update/', 'id' => Yii::$app->user->identity->getProfileId()], ['class' => 'dropdown-item']) : "" ?></i>
                                        <i><?= Html::a('Sign out', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?></i>
                                        <i><?= Html::a('Change Password', ['user/change-pass/', 'id' => Yii::$app->user->identity->getId()], ['class' => 'dropdown-item'])?></i>
                                    </a>
                                </ul>
                            <?php } ?>
                        </div>
                        <div class="header__top__right__manager">
                            <a href="<?= Url::to(['site/index']) ?>">Manager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li><a href="./index.html">Home</a></li>
                        <li class="active"><a href="./shop-grid.html">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
<!--                <div class="hero__categories">-->
<!--                    <div class="hero__categories__all">-->
<!--                        <i class="fa fa-bars"></i>-->
<!--                        <span>All departments</span>-->
<!--                    </div>-->
<!--                    <ul>-->
<!--                        <li><a href="#">Fresh Meat</a></li>-->
<!--                        <li><a href="#">Vegetables</a></li>-->
<!--                        <li><a href="#">Fruit & Nut Gifts</a></li>-->
<!--                        <li><a href="#">Fresh Berries</a></li>-->
<!--                        <li><a href="#">Ocean Foods</a></li>-->
<!--                        <li><a href="#">Butter & Eggs</a></li>-->
<!--                        <li><a href="#">Fastfood</a></li>-->
<!--                        <li><a href="#">Fresh Onion</a></li>-->
<!--                        <li><a href="#">Papayaya & Crisps</a></li>-->
<!--                        <li><a href="#">Oatmeal</a></li>-->
<!--                        <li><a href="#">Fresh Bananas</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <?php
                        $form = ActiveForm::begin([
                            'method' => 'get',
                            'action' => ['site/home'],
                        ]); ?>
                        <?= $form->field($searchModel, 'name') ?>
                        <div class="form-group">
                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Categories</h4>
                        <div class="cate__filter">
                            <?php
                            $form = ActiveForm::begin([
                                'method' => 'get',
                                'action' => ['site/home'],
                            ]); ?>
                            <?= $form->field($searchModel, 'category_id')->dropDownList(
                                \app\models\Products::getCate(), ['prompt' => 'All']
                            ) ?>
                            <div class="form-group">
                                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end();
                            ?>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Views</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Top Views</h4>
                            <?php
                                $top = \app\models\View::getTop();
                                $count = count($top);
                                $top1 = array_slice($top, 0, $count/2);
                                $top2 = array_slice($top, $count/2, $count/2);
                            ?>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($top1 as $item) { ?>
                                        <a href="<?= Url::to(['products/details', 'id' => $item->id]) ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?=$item->avatar ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6> <?= $item->name ?> </h6>
                                                <span> <?= $item->getViews() ?> <i class="fa fa-eye"></i> </span>
                                            </div>
                                        </a>

                                    <?php } ?>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($top2 as $item) { ?>
                                        <a href="<?= Url::to(['products/details', 'id' => $item->id]) ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?=$item->avatar ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6> <?= $item->name ?> </h6>
                                                <span> <?= $item->getViews() ?> <i class="fa fa-eye"></i> </span>
                                            </div>
                                        </a>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
<!--                <div class="product__discount">-->
<!--                    <div class="section-title product__discount__title">-->
<!--                        <h2>Sale Off</h2>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="product__discount__slider owl-carousel">-->
<!--                            <div class="col-lg-4">-->
<!--                                <div class="product__discount__item">-->
<!--                                    <div class="product__discount__item__pic set-bg"-->
<!--                                         data-setbg="img/product/discount/pd-1.jpg">-->
<!--                                        <div class="product__discount__percent">-20%</div>-->
<!--                                        <ul class="product__item__pic__hover">-->
<!--                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="product__discount__item__text">-->
<!--                                        <span>Dried Fruit</span>-->
<!--                                        <h5><a href="#">Raisin’n’nuts</a></h5>-->
<!--                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4">-->
<!--                                <div class="product__discount__item">-->
<!--                                    <div class="product__discount__item__pic set-bg"-->
<!--                                         data-setbg="img/product/discount/pd-2.jpg">-->
<!--                                        <div class="product__discount__percent">-20%</div>-->
<!--                                        <ul class="product__item__pic__hover">-->
<!--                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="product__discount__item__text">-->
<!--                                        <span>Vegetables</span>-->
<!--                                        <h5><a href="#">Vegetables’package</a></h5>-->
<!--                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4">-->
<!--                                <div class="product__discount__item">-->
<!--                                    <div class="product__discount__item__pic set-bg"-->
<!--                                         data-setbg="img/product/discount/pd-3.jpg">-->
<!--                                        <div class="product__discount__percent">-20%</div>-->
<!--                                        <ul class="product__item__pic__hover">-->
<!--                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="product__discount__item__text">-->
<!--                                        <span>Dried Fruit</span>-->
<!--                                        <h5><a href="#">Mixed Fruitss</a></h5>-->
<!--                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4">-->
<!--                                <div class="product__discount__item">-->
<!--                                    <div class="product__discount__item__pic set-bg"-->
<!--                                         data-setbg="img/product/discount/pd-4.jpg">-->
<!--                                        <div class="product__discount__percent">-20%</div>-->
<!--                                        <ul class="product__item__pic__hover">-->
<!--                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="product__discount__item__text">-->
<!--                                        <span>Dried Fruit</span>-->
<!--                                        <h5><a href="#">Raisin’n’nuts</a></h5>-->
<!--                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4">-->
<!--                                <div class="product__discount__item">-->
<!--                                    <div class="product__discount__item__pic set-bg"-->
<!--                                         data-setbg="img/product/discount/pd-5.jpg">-->
<!--                                        <div class="product__discount__percent">-20%</div>-->
<!--                                        <ul class="product__item__pic__hover">-->
<!--                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="product__discount__item__text">-->
<!--                                        <span>Dried Fruit</span>-->
<!--                                        <h5><a href="#">Raisin’n’nuts</a></h5>-->
<!--                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4">-->
<!--                                <div class="product__discount__item">-->
<!--                                    <div class="product__discount__item__pic set-bg"-->
<!--                                         data-setbg="img/product/discount/pd-6.jpg">-->
<!--                                        <div class="product__discount__percent">-20%</div>-->
<!--                                        <ul class="product__item__pic__hover">-->
<!--                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                    <div class="product__discount__item__text">-->
<!--                                        <span>Dried Fruit</span>-->
<!--                                        <h5><a href="#">Raisin’n’nuts</a></h5>-->
<!--                                        <div class="product__item__price">$30.00 <span>$36.00</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">View</option>
                                    <option value="0">Rate</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <?php foreach ($products as $product) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?= $product->avatar ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="<?= Url::to(['products/view', 'id' => $product->id]) ?>"><i class="fa fa-eye"></i></a></li>

                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="<?= Url::to(['products/view', 'id' => $product->id]) ?>"><?= $product->name ?></a></h6>
                                <?php
                                    $view = \app\models\View::findOne(['product_id'=> $product->id]);
                                    $count = 0;
                                    if($view!== null){
                                        $count = $view->count;
                                    }
                                ?>
                                <h5><?= 'Lượt xem: '. $count ?> </h5>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>



</body>

</html>