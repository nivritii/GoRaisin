<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Campaign */

$this->title = 'View Campaign - '.$model->c_title;
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-view">

    <div style="text-align: center">
        <h2><?php echo 'View Campaign - '.$model->c_title ?></h2>
    </div>
    <br />


    <?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'c_title',
            'c_image',
            'c_description',
            'c_start_date',
            'c_end_date',
            'c_goal',
            'c_id',
            'c_video',
            'c_description_long',
            'c_author',
            'c_created_at',
            'c_location',
            'c_status',
            'c_cat_id',
            'c_new_tag',
        ],
    ]) */?>

    <div>
        <p style="font-weight: 600">Title</p>
        <P><?php echo $model->c_title ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Image</p>
        <div style="text-align: center">
            <?= Html::img(Yii::$app->urlManagerFrontend->baseUrl."/images/uploads/campaign/".$model->c_image,['style' => 'width:600px','alt'=>'Image']) ?>
        </div>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Description</p>
        <P><?php echo $model->c_description ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Start Date</p>
        <P><?php echo $model->c_start_date ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">End Date</p>
        <P><?php echo $model->c_end_date ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Goal</p>
        <P><?php echo $model->c_goal ?></P>
    </div>
    <br />

    <?php
    $video = "https://www.youtube.com/watch?v=".$model->c_video;
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video, $matches);
    $id = $matches[1];
    $width = '800px';
    $height = '450px';
    ?>
    <p style="font-weight: 600">Video</p>
    <div style="text-align: center">
        <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                frameborder="0" allowfullscreen></iframe>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Long Description</p>
        <div style="background-color: #ffffff;border: 1px solid #dbdbdb;border-radius: 5px">
            <p><?=$model->c_description_long?></p>
        </div>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Goal</p>
        <P><?php echo $model->c_goal ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Author</p>
        <P><?php echo $model->cAuthor->username ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Created Time</p>
        <P><?php echo $model->c_created_at ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Location</p>
        <P><?php echo $model->cLocation->country ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Status</p>
        <P><?php echo $model->c_status ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Category</p>
        <P><?php echo $model->cCat->name ?></P>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">New Tag</p>
        <P><?php echo $model->c_new_tag ?></P>
        <p style="font-size: 12px">*** '0' means not new, '1' means new campaign ***</p>
    </div>
    <br />

    <div style="text-align: center">
        <p>
            <?= Html::a('Review', ['update', 'id' => $model->c_id], ['class' => 'btn btn-primary','style' => 'background-color: #7348b3; color: #ffffff;border:0']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->c_id], [
                'class' => 'btn btn-danger',
                'style' => 'border: 0',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
