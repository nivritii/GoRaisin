<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use frontend\models\Campaign;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use frontend\models\Category;
use kartik\date\DatePicker;

HomePageAsset::register($this);
CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
$this->title = 'Create Campaign - GoRaisin';
$campaign_draft = new Campaign();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form class="createCampaign" enctype="multipart/form-data" action="preview?id=<?= $model->c_id ?>" method="post"
      id="tab_logic"
      name="campaignForm">
    <div class="container" style="margin-top: 10px">
        <div class="row form-group">
            <div class="col-xs-9" style="padding-right: 0px;">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav" style="margin-bottom: 0px;">
                    <li id="navStep1" class="li-nav active" step="#step-1">
                        <a>
                            <h4 class="list-group-item-heading">Basics</h4>
                            <p class="list-group-item-text">Introduce your project</p>
                        </a>
                    </li>
                    <li id="navStep2" class="li-nav" step="#step-2">
                        <a>
                            <h4 class="list-group-item-heading">The Story</h4>
                            <p class="list-group-item-text">About your project</p>
                        </a>
                    </li>
                    <li id="navStep3" class="li-nav" step="#step-3">
                        <a>
                            <h4 class="list-group-item-heading">Company</h4>
                            <p class="list-group-item-text">About your team</p>
                        </a>
                    </li>
                    <li id="navStep4" class="li-nav" step="#step-4">
                        <a>
                            <h4 class="list-group-item-heading">Token</h4>
                            <p class="list-group-item-text">Name your token</p>
                        </a>
                    </li>
                    <li id="navStep5" class="li-nav" step="#step-5">
                        <a>
                            <h4 class="list-group-item-heading">Perks</h4>
                            <p class="list-group-item-text">For Backers</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="col-xs-3" style="padding-left: 0px; ">
                    <input class="btn btn-lg btn-default" type="submit" value="Preview" name="button"
                           style="width:130px;padding: 25px 20px 20px; margin-left: 3%; color: #337ab7;">
                    <input class="btn btn-lg btn-default" type="submit" value="Submit" name="button"
                           style="width:130px; padding: 25px 20px 20px; margin-left: 1%; background-color: #8f13a5f0;color: #ffffff">
                    </a>
                </div>
            </div>
        </div>


        <?php if (!empty($errors)) { ?>
            <div class="row form-group">
                <div class="col-xs-12">
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error) { ?>
                                <?php foreach ($error as $err) { ?>
                                    <li><?= $err ?></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>


        <!--        <div class="container">-->
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <h1 class="tabpage-title">Basics</h1>
                    <div class="container col-xs-12">
                        <div class="container">
                            <br/>
                            <div class="form-group">
                                <div style="width: 100%;">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Campaign title</p>
                                    </div>
                                    <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                        <?php if (!empty($model->c_title)) { ?>
                                            <input type="text" style="width: 100%" name="cTitle" id="cTitle"
                                                   value="<?= $model->c_title ?>">
                                        <?php } else { ?>
                                            <input type="text" style="width: 100%" name="cTitle" id="cTitle">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div style="clear:both;">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Category</p>
                                    </div>
                                    <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                        <select name="cCategory" id="search_categories"
                                                data-default-caption="Select Category"
                                                style="border-radius: 0px;width: 100%">
                                            <option selected
                                                    value="<?= $model->cCat->id ?>"><?= $model->cCat->name ?></option>
                                            <?php foreach ($categories as $category) { ?>
                                                <option value=<?= $category->id ?>><?= $category->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="clear:both;padding-top: 20px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Campaign image</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 2%">
                                        <div class="file-upload">
                                            <button class="file-upload-btn" type="button"
                                                    onclick="$('.file-upload-input').trigger( 'click' )">Add Image
                                            </button>
                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" type='file' onchange="readURL(this);"
                                                       accept="image/*" name="cImage"/>
                                                <div class="drag-text">
                                                    <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image"/>
                                                <div class="image-title-wrap">

                                                    <button type="button" onclick="removeUpload()" class="remove-image">
                                                        Remove <span class="image-title">Uploaded Image</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="clear:both;padding-top: 20px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Short description</p>
                                    </div>
                                    <div style="display: inline-block;float: left;margin-left: 2%;width: 60%;class="
                                         textEditor
                                    ">
                                    <?php if (!empty($model->c_description)) { ?>
                                        <textarea rows="2" type="text" style="width: 84%;" name="cDesc"
                                                  id="cDesc"><?= $model->c_description ?></textarea>
                                    <?php } else { ?>
                                        <textarea rows="2" type="text" style="width: 84%;" name="cDesc"
                                                  id="cDesc"><?= $model->c_description ?></textarea>
                                    <?php } ?>
                                </div>
                            </div>

                            <div style="clear:both;padding-top: 20px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Start date</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 2%">
                                    <?php if (!empty($model->c_start_date)) {
                                        echo DatePicker::widget([
                                            'name' => 'cStartdate',
                                            'value' => $model->c_start_date,
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                            ],
                                        ]);
                                    } else {
                                        echo DatePicker::widget([
                                            'name' => 'cStartdate',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                            ],
                                        ]);
                                    }
                                    ?>
                                </div>
                            </div>

                            <div style="clear:both;padding-top: 20px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">End date</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 2%">
                                    <?php if (!empty($model->c_end_date)) {
                                        echo DatePicker::widget([
                                            'name' => 'cEnddate',
                                            'value' => $model->c_end_date,
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                            ],
                                        ]);
                                    } else {
                                        echo DatePicker::widget([
                                            'name' => 'cEnddate',
                                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                            ],
                                        ]);
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <input onclick="step1Next()" class="btn btn-md btn-info" value="Next"
                                   style="color: #ffffff;background-color: #940094;border: 0;width: 10%">

                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
        <!--        </div>-->
    </div>

    <!--<div class="container">-->
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">The Story</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <div class="container">
                        <br/>
                        <div class="form-group">
                            <div style="clear:both;height: 150px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Campaign video</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <?php if (!empty($model->c_video)) { ?>
                                        <input type="text" style="width: 100%" name="cVideo" id="youtubeId"
                                               data-target="#myIframe" value="<?= $model->c_video ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="cVideo" id="youtubeId"
                                               data-target="#myIframe">
                                    <?php } ?>
                                    <p align="left">Please upload your video to YouTube and paste video id (11
                                        characters) here. Projects with a video have a much higher chance of
                                        success.</p>
                                    <p style="font-weight: 600;display: inline-block;">Example:&nbsp</p>
                                    <p style="font-weight: 400;display: inline-block">
                                        https://www.youtube.com/watch?v=</p>
                                    <p style="display: inline-block;font-weight: 600">yNAsk4Zw2p0</p>
                                    <p style="display: inline-block">.</p>
                                    <p style="display: inline-block">&nbspVideo ID: </p>
                                    <p style="display: inline-block;font-weight: 600">&nbsp;yNAsk4Zw2p0</p>
                                    <p style="display: inline-block">&nbsp;.</p>
                                    <div id="info" style="font-weight: 500;font-size: 15px"></div>
                                    <iframe id="myIframe" width="600" height="300" hidden></iframe>
                                </div>
                            </div>

                            <div style="clear:both;height: 500px">
                                <div style="float: left;display: inline-block;width: 20%;">
                                    <p class="item-title">Main Description</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%;height: 400px">
                                    <?php if (!empty($model->c_description_long)) {
                                        echo \artkost\yii2\trumbowyg\Trumbowyg::widget([
                                            'name' => 'cLDesc',
                                            'value' => $model->c_description_long,
                                            'settings' => [
                                                'lang' => 'en'
                                            ]
                                        ]);
                                    } else {
                                        echo \artkost\yii2\trumbowyg\Trumbowyg::widget([
                                            'name' => 'cLDesc',
                                            'settings' => [
                                                'lang' => 'en'
                                            ]
                                        ]);
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--</form> -->

                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev"
                       style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                <input onclick="step2Next()" class="btn btn-md btn-info" value="Next"
                       style="color: #ffffff;background-color: #940094;border: 0;width: 10%">

            </div>
        </div>
    </div>
    <!--</div>-->
    <!--<div class="container">-->
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">Company</h1>

                <div class="container col-xs-12">
                    <div class="container">
                        <br/>
                        <div class="form-group" style="padding-right: 90px;">
                            <div style="width: 100%;padding: 10px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Company name</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <?php if (!empty($company->company_name)) { ?>
                                        <input type="text" style="width: 100%" name="comName"
                                               value="<?= $company->company_name ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="comName"
                                               value="<?= $company->company_name ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div style="width: 100%;padding: 10px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Registration No</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <?php if (!empty($company->company_reg_no)) { ?>
                                        <input type="number" style="width: 100%" name="comNo"
                                               value="<?= $company->company_reg_no ?>">
                                    <?php } else { ?>
                                        <input type="number" style="width: 100%" name="comNo">
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;padding: 10px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Email</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <?php if (!empty($company->company_email)) { ?>
                                        <input type="text" style="width: 100%" name="comEmail"
                                               value="<?= $company->company_email ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="comEmail">
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;padding: 10px;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Website URL</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <?php if (!empty($company->company_website)) { ?>
                                        <input type="text" style="width: 100%" name="comWebsite"
                                               value="<?= $company->company_website ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="comWebsite">
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;padding: 10px;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Description</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%;">
                                    <?php if (!empty($company->company_description)) { ?>
                                        <textarea rows="3" type="text" style="width: 100%;" name="comDesc"
                                                  id="comDesc"><?= $company->company_description ?></textarea>
                                    <?php } else { ?>
                                        <textarea rows="3" type="text" style="width: 100%;" name="comDesc"
                                                  id="comDesc"></textarea>
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;padding: 5px;">
                                <hr style="3; border-color: #e3cece">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Industry</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <select name="comIndustry" id="search_categories"
                                            data-default-caption="Select Category"
                                            style="border-radius: 0px;width: 100%">
                                        <option selected
                                                value="<?= $company->company_industry ?>"><?= $company->companyIndustry->name ?></option>
                                        <?php foreach ($industries as $industry) { ?>
                                            <option value=<?= $industry->id ?>><?= $industry->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div style="clear:both;padding: 10px;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title"># of employees</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <?php if (!empty($company->company_employees_count)) { ?>
                                        <input type="number" style="width: 100%" name="comEmp"
                                               value="<?= $company->company_employees_count ?>">
                                    <?php } else { ?>
                                        <input type="number" style="width: 100%" name="comEmp">
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;padding: 0px;">
                                <hr style="3; border-color: #e3cece">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Location</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <select name="cLocation" id="search_locations"
                                            style="border-radius: 0px;width: 100%">
                                        <option selected
                                                value="<?= $model->cLocation->id ?>"><?= $model->cLocation->country ?></option>
                                        <?php foreach ($countries as $country) { ?>
                                            <option value=<?= $country->id ?>><?= $country->country ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div style="clear:both;padding: 10px;">
                                <div style="float: left;display: inline-block;width: 15%">
                                    <p class="item-title" style="padding-left: 0px">Postal code</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 6.5%;width: 55%">
                                    <?php if (!empty($company->company_postal)) { ?>
                                        <input type="text" style="width: 100%" name="comPostal"
                                               value="<?= $company->company_postal ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="comPostal">
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;">
                                <hr style="3; border-color: #e3cece">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Your Position</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 55%">
                                    <?php if (!empty($company->company_designation)) { ?>
                                        <input type="text" style="width: 100%" name="comPosition"
                                               value="<?= $company->company_designation ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="comPosition">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--</form> -->
                <!--                <input class="btn btn-md btn-info" type="submit" value="Submit" id="submit" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">-->

                <div class="form-group">
                </div>
                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev"
                       style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                <input onclick="step3Next()" class="btn btn-md btn-info" value="Next"
                       style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
            </div>
        </div>
    </div>
    <!--</div>-->
    <!--<div class="container">-->
    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">Token</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <div class="container">
                        <br/>
                        <div class="form-group">
                            <div style="width: 100%;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Name your token</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <?php if (!empty($token->t_name)) { ?>
                                        <input type="text" style="width: 100%" name="tokenName" id="tokenName"
                                               value="<?= $token->t_name ?>">
                                    <?php } else { ?>
                                        <input type="text" style="width: 100%" name="tokenName" id="tokenName">
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both;padding-top: 20px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Target</p>
                                </div>
                                <div style="display: inline-block;float: left; margin-left: 2%; width: 50%">
                                    <div style="display: inline-block;width: 100%;float: right">
                                        <?php if (!empty($model->c_goal)) { ?>
                                            <input type="number" style="width: 100%;float: left" name="cGoal" id="cGoal"
                                                   value="<?= $model->c_goal ?>" onchange="calculate();">
                                        <?php } else { ?>
                                            <input type="number" style="width: 100%;float: left" name="cGoal" id="cGoal"
                                                   onchange="calculate();">
                                        <?php } ?>
                                        <p align="left">Please provide the amount you are targeting to raise <b>in
                                                USD</b>.</p>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;padding-top: 20px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Maximum supply</p>
                                </div>
                                <div style="display: inline-block;float: left; margin-left: 2%; width: 50%">
                                    <div style="display: inline-block;width: 100%;float: right">
                                        <?php if (!empty($token->t_supply)) { ?>
                                            <input type="number" style="width: 100%;float: left" name="tokenSupply"
                                                   id="tokenSupply" onchange="calculate();"
                                                   value="<?= $token->t_supply ?>">
                                        <?php } else { ?>
                                            <input type="number" style="width: 100%;float: left" name="tokenSupply"
                                                   id="tokenSupply" onchange="calculate();">
                                        <?php } ?>
                                        <p align="left">Please provide the amount of tokens you would be generating.</p>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;padding-top: 0px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Token value</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <div style="display: inline-block;float: left;text-align: center;">
                                        <input type="text" style="width: 18%;float: left" value="1" disabled><i
                                                class="fa fa-bitcoin fa-2x"
                                                style="float: left;padding: 3% 5% 0;"></i><span
                                                class="glyphicon glyphicon-transfer" style="padding: 7% 0 0;"></span>
                                    </div>
                                    <div style="display: inline-block;width: 60%;float: right">
                                        <?php if (!empty($token->t_supply)) { ?>
                                            <input type="text" name="tokenValue" id="tokenValue"
                                                   value="<?= $token->t_value ?>"
                                                   style="width: 100%; float: right" disabled>
                                        <?php } else { ?>
                                            <input type="text" name="tokenValue" id="tokenValue"
                                                   style="width: 100%; float: right" disabled>
                                        <?php } ?>
                                    </div>
                                    <p align="left">Exchange rate of your tokens equivalent to 1 Rasin.</p>
                                </div>
                            </div>
                            <div style="clear:both;padding-top: 30px">
                                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev"
                                       style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                                <input onclick="step4Next()" class="btn btn-md btn-info" value="Next"
                                       style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                            </div>

                        </div>
                    </div>
                </div>
                <!--</form> -->
                <!--</form>-->
            </div>
        </div>
    </div>
    <!--<div class="container">-->
    <div class="row setup-content" id="step-5">
        <div class="col-xs-12 text-center">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">Perks</h1>
                <p class="tabpage">Please provide the discounts that backers would get for the amounts they pledge.</p>
            </div>
            <!--<form>-->

            <!--</form> -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <p style="float: left">For the stated amount pledged & more</p>
                            <?php if(!empty($mandatoryReward->r_pledge_amt)) {?>
                            <input type="number" class="form-control" id="mAmount" name="mAmount"
                                   value="<?=$mandatoryReward->r_pledge_amt?>" placeholder="Amount pledged">
                            <?php }else{?>
                            <input type="number" class="form-control" id="mAmount" name="mAmount"
                                   value="" placeholder="Amount pledged">
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <p style="float: left">% of discount given</p>
                            <select class="form-control" id="mDiscount" name="mDiscount">
                                <?php if(!empty($mandatoryReward->r_discount)){?>
                                <option value="<?=$mandatoryReward->r_discount?>"><?=$mandatoryReward->r_discount?>%</option>
                                <?php } else {?>
                                <option value="">% of discount</option>
                                <?php }?>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                                <option value="25">25%</option>
                                <option value="30">30%</option>
                                <option value="35">35%</option>
                                <option value="40">40%</option>
                                <option value="45">45%</option>
                                <option value="50">50%</option>
                                <option value="55">55%</option>
                                <option value="60">60%</option>
                                <option value="65">65%</option>
                                <option value="70">70%</option>
                                <option value="75">75%</option>
                                <option value="80">80%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <p style="float: left"># of months it is valid after launch</p>
                            <?php if(!empty($mandatoryReward->r_validity)) {?>
                            <input type="number" class="form-control" id="mExpiry" name="mExpiry"
                                   value="<?=$mandatoryReward->r_validity?>" placeholder="Validity">
                            <?php }else {?>
                            <input type="number" class="form-control" id="mExpiry" name="mExpiry"
                                   value="" placeholder="Validity">
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-sm-3 nopadding">
                        <div class="form-group">
                            <div class="input-group">
                                <p style="float: left">Conditions/Description</p>
                                <?php if(!empty($mandatoryReward->r_description)){?>
                                <input type="text" class="form-control" id="mRewardDesc" name="mRewardDesc"
                                       value="<?=$mandatoryReward->r_description?>"
                                       placeholder="Conditions/Description">
                                <?php }else {?>
                                <input type="text" class="form-control" id="mRewardDesc" name="mRewardDesc"
                                       value=""
                                       placeholder="Conditions/Description">
                                <?php }?>
                                <div class="input-group-btn" style="vertical-align: bottom;">
                                    <button class="btn btn-success" type="button" onclick="add_rewards();"><span
                                                class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <?php $room = 2;
                    if (!empty($this->params['rewards'])) {
                        foreach ($this->params['rewards'] as $reward) { ?>
                            <div class="form-group removeclass<?=$room?>">
                                <div class="col-sm-3 nopadding">
                                    <input type="number" class="form-control" id="amount" name="amount[]"
                                           value="<?= $reward->r_pledge_amt ?>"
                                           placeholder="Amount pledged">
                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <select class="form-control" id="discount"
                                                name="discount[]">
                                            <option value="<?= $reward->r_discount ?>"><?= $reward->r_discount ?>%
                                            </option>
                                            <option value="5">5%</option>
                                            <option value="10">10%</option>
                                            <option value="15">15%</option>
                                            <option value="20">20%</option>
                                            <option value="25">25%</option>
                                            <option value="30">30%</option>
                                            <option value="35">35%</option>
                                            <option value="40">40%</option>
                                            <option value="45">45%</option>
                                            <option value="50">50%</option>
                                            <option value="55">55%</option>
                                            <option value="60">60%</option>
                                            <option value="65">65%</option>
                                            <option value="70">70%</option>
                                            <option value="75">75%</option>
                                            <option value="80">80%</option>
                                        </select></div>
                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group"><input type="number" class="form-control" id="expiry"
                                                                   name="expiry[]"
                                                                   value="<?= $reward->r_validity ?>"
                                                                   placeholder="Validity"></div>
                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <div class="input-group"><input type="text" class="form-control" id="rewardDesc"
                                                                        name="rewardDesc[]"
                                                                        value="<?= $reward->r_description ?>"
                                                                        placeholder="Reward Description">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger" type="button"
                                                        onclick="remove_add_rewards(<?= $room ?>);"><span
                                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php $room++;
                        }
                    } ?>
                    <div class="clear"></div>
                    <div id="add_rewards" style="padding-top: 15px;"></div>
                </div>
                <div class="panel-footer">
                    <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another reward</small>
                    ,
                    <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove rewards</small>
                </div>
                <hr/>
                <div style="clear:both;padding-bottom: 30px">
                    <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev"
                           style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                    <input class="btn btn-md btn-info" value="Preview" name="button" type="submit"
                           style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->
</form>


<script>
    var currentStep = 1;
    var cTitle = document.campaignForm.cTitle;
    var cCategory = document.campaignForm.cCategory;
    var cDesc = document.campaignForm.cDesc;
    var cGoal = document.campaignForm.cGoal;

    var tokenValue = document.campaignForm.tokenValue;
    var tokenSupply = document.campaignForm.tokenSupply;

    var error_message = '';

    function calculate() {
        tokenValue.value = cGoal.value / tokenSupply.value;
    }

    function validateStep1() {
        if (cTitle.value == "") {
            cTitle.focus();
            error_message += "Please enter Campaign Title";
        }
        if (cCategory.value == "") {
            cCategory.focus();
            error_message += "<br>Please select Category";
        }
        if (cDesc.value == "") {
            cDesc.focus();
            error_message += "<br>Please give Short Description";
        }
        if (cGoal.value == "") {
            cGoal.focus();
            error_message += "<br>Set your Target";
        }
        if (error_message) {
            $('.alert-success').removeClass('hide').html(error_message);
            error_message = '';
            return false;
        } else {
            error_message = '';
            return true;
        }
    }

    $(document).ready(function () {
        $('.li-nav').click(function () {
            var $targetStep = $($(this).attr('step'));
            currentStep = parseInt($(this).attr('id').substr(7));
            if (!$(this).hasClass('disabled')) {
                $('.li-nav.active').removeClass('active');
                $(this).addClass('active');
                $('.setup-content').hide();
                $targetStep.show();
            }
        });
        $('#navStep1').click();

        $("#youtubeId").click(function () {

            var target_selector = $(this).attr('data-target');
            var $target = $(target_selector);

            if ($target.is(':hidden')) {
                $target.show("slow");
            }
            else {
                $target.hide("slow");
            }

            console.log($target.is(':visible'));


        });
    });

    function step1Next() {
        //You can make only one function for next, and inside you can check the current step
        if (true) {//Insert here your validation of the first step
            if (/*validateStep1()*/ true) {
                currentStep += 1;
                //$('#navStep' + currentStep).removeClass('disabled');
                $('#navStep' + currentStep).click();
                window.scrollTo(0,0);
            }
        }
    }

    function prevStep() {
        //Notice that the btn prev not exist in the first step
        currentStep -= 1;
        $('#navStep' + currentStep).click();
        window.scrollTo(0,0);
    }

    function step2Next() {
        if (true) {
            //$('#navStep3').removeClass('disabled');
            $('#navStep3').click();
            window.scrollTo(0,0);
        }
    }

    function step3Next() {
        if (true) {
            //$('#navStep4').removeClass('disabled');
            $('#navStep4').click();
            window.scrollTo(0,0);
        }
    }

    function step4Next() {
        if (true) {
            //$('#navStep4').removeClass('disabled');
            $('#navStep5').click();
            window.scrollTo(0,0);
        }
    }

    // Add , Delete row dynamically
    var room = 1;

    function add_rewards() {

        room++;
        var objTo = document.getElementById('add_rewards')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="col-sm-3 nopadding"><input type="number" class="form-control" id="amount" name="amount[]" value="" placeholder="Amount pledged"></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="form-group"><select class="form-control" id="discount" name="discount[]"><option value="">% of discount</option><option value="5">5%</option><option value="10">10%</option><option value="15">15%</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option><option value="35">35%</option><option value="40">40%</option><option value="45">45%</option<option value="50">50%</option><option value="55">55%</option><option value="60">60%</option><option value="65">65%</option><option value="70">70%</option><option value="75">75%</option><option value="80">80%</option></select></div></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="number" class="form-control" id="expiry" name="expiry[]" value="" placeholder="Validity"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="rewardDesc" name="rewardDesc[]" value="" placeholder="Reward Description"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_add_rewards(' + room + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest);
    }

    function remove_add_rewards(rid) {
        $('.removeclass' + rid).remove();
    }

</script>
