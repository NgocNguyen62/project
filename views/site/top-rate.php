<?php

use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;

echo ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'indexAxis' => 'y',
        'elements' => [
            'bar' => [
                'borderWidth' => 2,
            ]
        ],
        'scales' => [
            'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => true,
                    ],
                ],
            ],
        ],
        'responsive' => true,
        'plugin' => [
            'legend' => [
                'position' => 'right',
            ],

        ],
        'clientOptions' => [
            'style' => [
                'height' => '100px',
            ],
        ],
    ],
    'data' => [
        'labels' => ArrayHelper::getColumn(\app\models\Products::getTopRate(), 'name'),
        'datasets' => [
            [
                'label' => "Rate",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => \app\models\Products::getRateOfTop()
            ]
        ],

    ]
]);

?>

