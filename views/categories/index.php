<?php

use app\models\base\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Phân loại';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Thêm loại mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'label' => 'Tên phân loại'
            ],
//            'description',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Categories $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
