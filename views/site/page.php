<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="dashboard/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="dashboard/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quản lý</title>-
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--    <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />-->
<!--    <link href="dashboard/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />-->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    </div>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
<!--                    <div class="description">-->
<!--                        <h4>Tổng số sản phẩm: --><?php //= Yii::$app->user->identity->countProducts() ?><!--</h4>-->
<!--                    </div>-->
                        <div class="col-md-7">
                            <div class="card-header ">
                                <h4>Lượt xem theo phân loại</h4>

                            </div>
                            <div class="card-body">
                                <?= $this->render('chart'); ?>
                            </div>
                        </div>
                    <div class="col-md-5">
                        <br>
                        <ul>
                            <li>Tổng số sản phẩm: <?= Yii::$app->user->identity->countProducts() ?></li>
                            <li>Tổng lượt xem:<?= \app\models\View::getTotalView() ?></li>
                        </ul>
                    </div>
                </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Top 10 lượt xem</h4>
                            </div>
                            <div class="card-body ">
                                <?= $this->render('top-view'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Top đánh giá</h4>
                            </div>
                            <div class="card-body ">
                                <?= $this->render('top-rate'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



</body>


</html>
