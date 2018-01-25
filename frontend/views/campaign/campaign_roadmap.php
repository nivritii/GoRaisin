<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoadmapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roadmaps';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\AppAsset::register($this);
frontend\assets\RoadmapAsset::register($this);
?>
<div class="roadmap-index">

<section id="cd-timeline" class="cd-container">
        <div class="cd-timeline-block">
            <?php
            $str1 = '';
            $str2 = '';
            $rows1 = (new \yii\db\Query())
                ->select('title')
                ->where(['id' => 1])
                ->from('roadmap')
                ->all();
            $rows2 = (new \yii\db\Query())
                ->select('content')
                ->where(['id' => 1])
                ->from('roadmap')
                ->all();
            foreach ($rows1 as $key => $val)
            {
                $str1 = $rows1[$key]['title'];
            }
            foreach ($rows2 as $key => $val)
            {
                $str2 = $rows2[$key]['content'];
            }
            ?>
            <div class="cd-timeline-img cd-done">
                <?= Html::img('@web/images/roadmap/launch.png'/*,['alt' => 'Picture']*/)?>
                <!--<img src="img/cd-icon-picture.svg" alt="Picture">-->
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2><?php echo $str1 ?></h2>
                <p><?php echo $str2 ?></p>
                <a href="#0" class="cd-read-more">Read more</a>
                <span class="cd-date">Jan 30</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->

        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-undergoing">
                <?= Html::img('@web/images/roadmap/continue.png')?>
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2>Title of section 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
                <a href="#0" class="cd-read-more">Read more</a>
                <span class="cd-date">Jan 18</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->

        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-undergoing">
                <?= Html::img('@web/images/roadmap/location.png')?>
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2>Title of section 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
                <a href="#0" class="cd-read-more">Read more</a>
                <span class="cd-date">Jan 24</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->

        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-undergoing">
                <?= Html::img('@web/images/roadmap/clock.png')?>
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2>Title of section 4</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                <a href="#0" class="cd-read-more">Read more</a>
                <span class="cd-date">Feb 14</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->

        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-undergoing">
                <?= Html::img('@web/images/roadmap/fund.png')?>
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2>Title of section 5</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                <a href="#0" class="cd-read-more">Read more</a>
                <span class="cd-date">Feb 18</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->

        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-undergoing">
                <?= Html::img('@web/images/roadmap/running.png')?>
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2>Final Section</h2>
                <p>This is the content of the last section</p>
                <span class="cd-date">Feb 26</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->
    </section>
</div>