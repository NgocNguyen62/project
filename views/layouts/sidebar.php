<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">Product 360</a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
//                    [
//                        'label' => 'Starter Pages',
//                        'icon' => 'tachometer-alt',
//                        'badge' => '<span class="right badge badge-info">2</span>',
//                        'items' => [
//                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
//                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
//                        ]
//                    ],
                    ['label' => 'Dashboard', 'icon' => 'th', 'url' => ['site/page']],
                    ['label' => 'Quản lý', 'header' => true],
//                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
//                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
//                    ['label' => !Yii::$app->user->isGuest? 'Logout (' . Yii::$app->user->identity->username . ')':"",
//                        'url' => ['/site/logout'],
//                        'method' => 'post',
//                        'visible' => !Yii::$app->user->isGuest],
//                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'Người dùng', 'url' => ['user/'], 'visible' => Yii::$app->user->can('admin')],
                    ['label' => 'Sản Phẩm', 'url' => ['products/']],
                    ['label' => 'Phân loại', 'url' => ['categories/']],
//                    ['label' => 'Qr Code', 'url' => ['qrcode/']],
//                    ['label'=> 'Lượt xem', 'url'=>['view/']],
//                    ['label'=> 'Đánh giá', 'url'=>['rate/']],

//                    ['label' => 'SYSTEM', 'header' => true],
//                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank', 'visible' => Yii::$app->user->can('admin')],
//                    ['label' => 'Storage'],

//                    ['label' => 'LABELS', 'header' => true],
//                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
//                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
//                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>