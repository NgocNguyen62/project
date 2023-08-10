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
            [
                'attribute' => 'name',
                'label' => 'Tên sản phẩm'
            ],
//            'category_id',
            [
                'attribute' => 'category_id',
                'label'=>'Phân loại',
                'value' => function ($model) {
//                    return Categories::findOne(['id'=> $model->category_id])->name;
                    return $model->getCategory();
                },
            ],
            [
                'attribute' => 'description',
                'label'=>'Mô tả'
            ],
            [
                'attribute' => 'status',
                'label'=> 'Trạng thái',
                'value' => function ($model) {
                    return \app\models\Products::getStatus()[$model->status];
                },
            ],
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