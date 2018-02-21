<?php

/* @var $this yii\web\View */

use frontend\assets\HomePageAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\models\Campaign;

HomePageAsset::register($this);
$this->title = 'GoRaisin';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Main Content -->
<div class="site-index">
    <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group">
                <div class="entry-content">
                    <div class="section mcb-section " style="padding-top:0px; padding-bottom:20px; ">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="container" style="padding-left:0px">
                                <div class="col-xs-12">
                                    <div class="col-md-12 well text-center">
                                        <form name="basicform" id="basicform" method="post" action="new">
                                        <h2 class="tabpage-title">First, let’s get you set up.</h2>
                                        <p>You can always update this later.</p>
                                        <br/>
                                        <div style="clear:both;height: 80px">
                                            <p>Pick a project category to connect with a specific community. </p>
                                            <div style="display: inline-block;float:center;margin-left: 2%;width: 50%">
                                                <select name="cCategory" id="search_categories"
                                                        data-default-caption="Select Category"
                                                        style="border-radius: 10px;width: 100%">
                                                    <option selected value="">Select Category</option>
                                                    <?php foreach ($categories as $category) { ?>
                                                        <option value=<?= $category->id ?>><?= $category->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                            <br/>
                                        <div style="clear:both;height: 80px">
                                            <p>Describe what you’ll be creating.</p>
                                            <div style="display: inline-block;float: left;margin-left: 2%;width: 60%;class="textEditor">
                                                <textarea rows="3" type="text" style="width: 83%;margin-left:40%;" name="cDesc" id="cDesc"> </textarea>
                                            </div>
                                        </div>
                                        <br/>
                                    <br/>
                                    <div style="clear:both;height: 80px; padding-top: 22px">
                                        <p>Tell us know where you’re based. </p>
                                        <div style="display: inline-block;float:center;margin-left: 2%;width: 50%">
                                            <select name="cLocation" id="search_categories"
                                                    data-default-caption="Select Country"
                                                    style="border-radius: 10px;width: 100%">
                                                <option selected value="">Select Country</option>
                                                <?php foreach ($countries as $country) { ?>
                                                    <option value=<?= $country->id ?>><?= $country->country ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br/>
                                    <div style="padding-left:26%; padding-top: 30px;padding-bottom: 30px; width: 100%">
                                    <input class="btn btn-md btn-info" type="submit" value="Get started with your campaign creation" id="submit">
                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>