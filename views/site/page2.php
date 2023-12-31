<?php

/** @var yii\web\View $this */
/** @var app\models\Products $model */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="dashboard/images/logos/favicon.png" />
    <!--  <link rel="stylesheet" href="dashboard/css/styles.min.css" />-->
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-header-position="fixed">

    <!--  Main wrapper -->
    <div class="body-wrapper">
        <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
                <div class="col-lg-8 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Top 10 lượt xem cao nhất</h5>
                                </div>
                                <div>
                                    <select class="form-select">
                                        <option value="1">March 2023</option>
                                        <option value="2">April 2023</option>
                                        <option value="3">May 2023</option>
                                        <option value="4">June 2023</option>
                                    </select>
                                </div>
                            </div>
                            <!--                <div id="chart"></div>-->
                            <div class="top-view-chart">
                                <?= $this->render('top-view'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Yearly Breakup -->
                            <div class="card overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title mb-9 fw-semibold">Lượt xem</h5>
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div class="pie-chart">
                                                <?= $this->render('chart'); ?>
                                            </div>
                                            <!--                        <div class="d-flex justify-content-center">-->
                                            <!--                          <div id="breakup"></div>-->
                                            <!--                        </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!-- Monthly Earnings -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row alig n-items-start">
                                        <div class="col-8">
                                            <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                                            <h4 class="fw-semibold mb-3">$6,820</h4>
                                            <div class="d-flex align-items-center pb-1">
                          <span
                                  class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                          </span>
                                                <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                <p class="fs-3 mb-0">last year</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end">
                                                <div
                                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-currency-dollar fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="earning"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!----------------------------------------->
                <div class="col-lg-8 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Top 10 đánh giá cao nhất</h5>
                                </div>
                            </div>
                            <!--                <div id="chart"></div>-->
                            <div class="top-view-chart">
                                <?= $this->render('top-rate'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!----------------------------------------->
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                            <div class="table-responsive">
                                <table class="table text-nowrap mb-0 align-middle">
                                    <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Id</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Assigned</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Priority</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Budget</h6>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                            <span class="fw-normal">Web Designer</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">Elite Admin</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                                            <span class="fw-normal">Project Manager</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">$24.5k</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">3</h6></td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                                            <span class="fw-normal">Project Manager</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">MedicalPro WP Theme</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">$12.8k</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">4</h6></td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                            <span class="fw-normal">Frontend Engineer</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">Hosting Press HTML</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="badge bg-success rounded-3 fw-semibold">Critical</span>
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">$2.4k</h6>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
            </div>
        </div>
    </div>
</div>
<script src="dashboard/libs/jquery/dist/jquery.min.js"></script>
<script src="dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="dashboard/js/sidebarmenu.js"></script>
<script src="dashboard/js/app.min.js"></script>
<script src="dashboard/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="dashboard/libs/simplebar/dist/simplebar.js"></script>
<!--  <script src="dashboard/js/dashboard.js"></script>-->
</body>

</html>