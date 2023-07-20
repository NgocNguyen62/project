<?php

use dosamigos\chartjs\ChartJs;
use yii\bootstrap5\Html;
use yii\grid\GridView;use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dashboard';
?>
<div>
<?php
    echo $this->render('chart');
?>
</div>
<h3>Total views:  <?= \app\models\View::find()->sum('count') ?> </h3>
<div>
<h3>Top 10 views:</h3>
<!--    --><?php //$top = \app\models\View::getTop() ?>
<!--    --><?php //foreach ($top as $item):  ?>
<!--    <div>-->
<!--        <p>--><?php //= $item->name ?><!-- : --><?php //= \app\models\View::findOne(['product_id'=> $item->id])->count ?><!-- views </p>-->
<!--    </div>-->
<!--     --><?php //endforeach; ?>
</div>
<?php
////$dataProvider = \app\models\View::getTop();
//echo GridView::widget([
//            'dataProvider' => $dataProvider,
//        'columns' => [
//               [
//                       'label' => 'Name',
//                   'value' => function($model){
//                        return $model->name;
//                   }
//               ],
//            [
//                    'label' => 'Views',
//                'value' => function($model){
//                    $item = \app\models\View::findOne(['product_id'=>$model->id]);
//                    if($item !== null){
//                        return $item->count;
//                    }
//                    return 'null';
//                }
//            ],
//        ]
//    ])
//?>
<div>
<?= ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 100,
        'width' => 100,
        'indexAxis'=> 'y',
        'elements' => [
                'bar'=>[
                        'borderWidth' => 2,
                ]
        ]
    ],
    'data' => [
        'labels' => ArrayHelper::getColumn(\app\models\View::getTop(), 'name'),
        'datasets' => [
            [
                'label' => "Views",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => \app\models\View::getViewTop()
            ]
        ],
        'responsive' => true,
        'plugin'=>[
                'legend' => [
                        'position' => 'right',
                ],

        ]
    ]
]);
?>
</div>
