<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="dashboard/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="dashboard/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
<!--    <link href="dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />-->
<!--    <link href="dashboard/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />-->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="css/dashboard.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Lượt xem theo phân loại</h4>

                            </div>
                            <div class="card-body ">
                                <?= $this->render('chart'); ?>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
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
