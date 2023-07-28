<?php

use app\models\base\Products;
use app\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sản phẩm';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Tạo mới sản phẩm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'avatar',
                'filter' => false,
                'label' => 'Avatar',
                'format' => 'raw',
                'value' => function($model){
                    $path = $model->avatar;
                    return Html::a(Html::img($path, ['width' => '80', 'height' => '80']));
                }
            ],
            [
                    'attribute' => 'name',
                    'label' => 'Tên sản phẩm'
            ],
//            'category_id',
            [
                'attribute' => 'category_id',
                'label'=>'Phân loại',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'category_id',
                    \app\models\Products::getCate(),
                    ['class' => 'form-control', 'prompt' => 'All']
                ),
                'value' => function ($model) {
//                    return Categories::findOne(['id'=> $model->category_id])->name;
                    return $model->getCategory();
                },
            ],
//            'description',
//            'status',
            [
                'attribute' => 'status',
                'label'=> 'Trạng thái',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    \app\models\Products::getStatus(),
                    ['class' => 'form-control', 'prompt' => 'All']
                ),
                'value' => function ($model) {
                    return \app\models\Products::getStatus()[$model->status];
                },
            ],
//            'avatar',
            //'image_360',
            [
                'label' => 'QR code',
                'attribute' => 'image_360',
                'filter' => false,
                'format' => 'raw',
                'value' => function ($model) {
                    $qr = \app\models\base\Qrcode::findOne(['product_id'=>$model->id]);
                    if($qr !== null){
                        $path = $qr->qr;
                        return Html::a(Html::img($path, ['width' => '80']));
                    }
                    return 'null';
                    }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
