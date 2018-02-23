<?php

/* @var $this yii\web\View */
/* @var $content string */
$imagePath = '/'.Yii::$app->user->identity->image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
backend\assets\ProfileAsset::register($this);
$this->title = 'GoRaisin Backend';
?>
<link href="css/styles.css" rel="stylesheet">
<link href="css/profile/ionicons.min.css" rel="stylesheet">
<link href="css/profile/bootstrap.min.css" rel="stylesheet">
<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<div class="site-index">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome <?php echo Yii::$app->user->getIdentity()->username ?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?=$campaignCount?></h3>
                            <p>Campaigns</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',['campaign/index'],['class' => 'small-box-footer']) ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?=$commentCount?><sup style="font-size: 20px">%</sup></h3>
                            <p>Comments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?=$userCount?></h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',['frontend-user/index'],['class' => 'small-box-footer']) ?>
                        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div id="columnchart_material" style="width: auto; height: 700px;text-align: center"></div>
            </div>

            <script type="text/javascript">
                google.load("visualization", "1.1", {packages:["bar"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Data', 'Count'],
                        <?php
                        // $days1 = ['Mon','Tuesday','Wed','Thu','Fri','Sat','Sun'];
                        $elements = ['Active Posts','Categories','Users',' Comments'];
                        $element_data = [$campaignCount,$commentCount,$userCount,$categoryCount];

                        for($i=0;$i<4; $i++){
                            echo   "['{$elements[$i]}'" . "," . "{$element_data[$i]}],";
                        }
                        ?>

                    ]);

                    var options = {
                        chart: {
                            title: 'Campaign Count',
                            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, options);
                }
            </script>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>

