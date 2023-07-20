<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\base\Products $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Avatar',
                'format' => 'raw',
                'value' => function($model){
                    $path = $model->avatar;
                    $print = Html::a(Html::img($path, ['width' => '250']));
                    return $print;
                }
            ],
            'id',
            'name',
            'category_id',
            'description',
            'status',
//            'avatar',
//            'image_360',
//            [
//                'label' => 'Image 360',
//                'format' => 'raw',
//                'value' => function($model) {
//                    $baseUrl = Yii::$app->request->baseUrl; // Get the base URL of the application
//                    $panoramaUrl = $baseUrl . '/image_360/' . $model->image_360;
////                        'https://i.ibb.co/ZKgwz75/city-park-blue-sky-with-downtown-skyline-background.jpg'; // Construct the full URL to the panorama image
////                    $previewUrl = Url::to([$model->image_360], true); // Construct the full URL to the preview image
//                    $iframe = '<iframe width="600" height="400" allowfullscreen style="border-style:none;" src="https://cdn.pannellum.org/2.5/pannellum.htm#panorama=' . $panoramaUrl . '&autoLoad=true"></iframe>';
//                    return $iframe;
//                },
//            ],
            [
                'label' => '360',
                'format' => 'raw',
                'value' => $this->render('view360', [
                    'model' => $model,
                ])
            ],
        ],
    ]) ?>

</div>