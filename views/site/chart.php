<?php

use dosamigos\chartjs\ChartJs;
?>
<?= ChartJs::widget([
    'type' => 'pie',
    'options' => [
        'height' => 200,
        'width' => 400
    ],

        'data' => [
            'radius' =>  "100%",
            'labels' =>\app\models\Products::getCate(),
            'datasets' => [
                [
                    'data' => \app\models\View::getPercent(),
                    'backgroundColor' => [
                        '#ADC3FF',
                        '#FF9A9A',
                        'rgba(190, 124, 145, 0.8)',
                        '#FFCD56',
                        '#8EE5EE',
                        '#98FB98',
                    ],
                    'borderColor' =>  [
                        '#fff',
                        '#fff',
                        '#fff'
                    ],
                    'borderWidth' => 1,
                    'hoverBorderColor'=>["#999","#999","#999"],
                ]
            ]
        ],

    'clientOptions' => [
        'legend' => [
            'display' => false,
            'position' => 'bottom',
            'labels' => [
                'fontSize' => 14,
                'fontColor' => "#425062",
            ]
        ],
        'tooltips' => [
            'enabled' => true,
            'intersect' => true
        ],
        'hover' => [
            'mode' => false
        ],
        'maintainAspectRatio' => false,

    ],

]);
?>




