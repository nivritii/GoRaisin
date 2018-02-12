<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 12/02/2018
 * Time: 1:53 PM
 */
use dosamigos\chartjs\ChartJs;
use backend\models\Category;
use backend\models\Campaign;

$this->title = 'Dashboard - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>hello</p>

<div style="margin: 10%">
<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 100,
        'width' => 100
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            [
                'label' => "My First dataset",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'label' => "My Second dataset",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>
</div>
