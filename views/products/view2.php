<?php

use kartik\rating\StarRating;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= !Yii::$app->user->isGuest ? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : "" ?>
        <?= !Yii::$app->user->isGuest ? Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : "" ?>
    </p>
</div>

<!--    --><?php //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            [
//                'label' => 'Avatar',
//                'format' => 'raw',
//                'value' => function($model){
//                    $path = $model->avatar;
//                    $print = Html::a(Html::img($path, ['width' => '250']));
//                    return $print;
//                }
//            ],
//            'id',
//            'name',
//            'category_id',
//            'description',
//            'status',
////            'avatar',
//            [
//                    'label' => '360',
//                'format' => 'raw',
//                'value' => $this->render('view360', [
//                    'model' => $model,
//                ])
//            ],
//        ],
//    ]) ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->

    <meta name="robots" content="noindex,follow" />
    <link href="css/product.css" rel="stylesheet">
<!--    <script type="text/javascript" src="js/modal.js"></script>-->
</head>

<body>
<main class="container">

    <div class="left-column">
        <img src= <?= $model->avatar ?> alt="">
<!--        <div class="product-rate">-->
<!--            <span>Rate: </span>-->
<!--        </div>-->
    </div>
<!--    --><?php //= $this->render('rate', ['model' => new \app\models\base\Rate()]) ?>

    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <span><?= $model->getCategory()?></span>
            <h1><?= $model->name ?></h1>
            <?php $qr = $model->getQrcodes() ?>
            <img src=<?= $qr?$qr->qr:'null' ?>>
            <p>Mô tả: <?= $model->description ?></p>
            <span>Lượt xem: <?=$model->getViews()?></span>
            <a href="<?= $model->getView360() ?>">View</a>
        </div>

    </div>

</main>
<div class="product-rate">
    <span>Rate: <?= $model->getRate() ?> <i class="fas fa-star"></i>  </span>
    <a href="<?= Yii::$app->urlManager->createUrl(['products/rate', 'id' =>$model->id])?>">Rate</a>
    <?php
    Modal::begin([

        'toggleButton' => [

            'label' => '<i class="glyphicon glyphicon-plus"></i> Add',

            'class' => 'btn btn-success',
            'id'=> 'modalButton',
            'value'=> Url::to(['rate', 'id'=>$model->id])
        ],

        'closeButton' => [

            'label' => 'Close',

            'class' => 'btn btn-danger btn-sm pull-right',

        ],

        'size' => 'modal-lg',
        'id'=>'modal'

    ]);
    echo StarRating::widget(['name' => 'rating_input',
        'model' => $model,
        'attribute' => 'rate',
        'pluginOptions' => [
            'stars' => 5,
            'min' => 0,
            'max' => 5,
            'step' => 1,
            'symbol' => html_entity_decode('&#xe005;', ENT_QUOTES, "utf-8"),
            'defaultCaption' => '{rating} hearts',
            'starCaptions'=>[],
            'starCaptionsCallback' => new yii\web\JsExpression('function(rating, index) {
            return index;
        }'),
            'starClickedCallback' => new yii\web\JsExpression('function(rating, index) {
            $("#rating-input").val(rating);
        }'),
        ]
    ]);
    Modal::end();
    ?>
</div>
<div class="other-product">
    <h3>Sản phẩm tương tự</h3>
    <?php
    $products = $model->getProductOfCate($model->category_id, 4);
    echo '<div class="product-grid">';
    foreach ($products as $product){
        echo '<div class="product-item">';
        echo Html::a(
            Html::img($product->avatar, ['width' => '150', 'height' => '150']),
            ['products/view', 'id' => $product->id],
            ['class' => 'product-link']
        );
        echo Html::tag('div', $product->name, ['class' => 'product-name']);
        $view = $product->getViews();

        echo Html::tag('div', 'Lượt xem:' . $view , ['clas' => 'product-name']);
        echo '</div>';
    }
    echo '</div>';
    ?>
</div>
</body>
</html>

<?php
$this->registerJsFile('js/modal.js');
?>
