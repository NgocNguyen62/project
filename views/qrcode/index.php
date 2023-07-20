<?php

use app\models\base\Qrcode;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\QrcodeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Qrcodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-index">



    <p>
        <?= Html::a('Create Qrcode', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',

            [
                'label' => 'Product',
                'value' => function($model){
                    return (\app\models\Products::findOne(['id' => $model->product_id]))->name;
                }
            ],
//            'qr',
            [
                'label' => 'Qr Code',
                'format' => 'raw',
                'value' => function($model){
                    $path = $model->qr;
                    $print = Html::a(Html::img($path, ['width' => '250']));
                    return $print;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Qrcode $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
