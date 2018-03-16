<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use frontend\assets\WalletAsset;
use frontend\models\Campaign;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use frontend\models\Category;
use kartik\date\DatePicker;

HomePageAsset::register($this);
CampaignAsset::register($this);
WalletAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
frontend\assets\RoadmapAsset::register($this);
$campaign_draft = new Campaign();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"
      xmlns="http://www.w3.org/1999/html">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-xs-12 bhoechie-tab-container" style="margin-left: 0px">
            <div class="col-md-2 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-tower"></h4><br/>Assests
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-folder-open"></h4><br/>Portfolio
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Transactions
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <form class="postFAQ" enctype="multipart/form-data" action="postfaq?id="
                          method="post" id="postFAQ" name="postFAQ">
                        <h1 class="tabpage-title" style="margin-bottom: 20px; text-align: center">New FAQ</h1>
                        <div style="width: 100%;">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%;margin-bottom: 20px">
                                <p><b>What's the question?</b></p>
                                <textarea rows="2" type="text" style="width: 100%" name="faqQn" id="faqQn" value=""></textarea>
                            </div>
                        </div>
                        <div style="width: 100%;">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%; margin-bottom: 20px">
                                <p><b>What's the answer?</b></p>
                                <textarea rows="6" type="text" style="width: 100%" name="faqAns" id="faqAns"
                                          value="<?=$amount?>"></textarea>
                            </div>
                        </div>
                        <div style="clear:both; text-align: center; margin-bottom: 20px">
                            <input onclick="validate()" class="btn btn-md btn-info" type="submit" value="Save"
                                   style="border: 0;width: 35%">
                        </div>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <div class="method">
                        <div class="row margin-0 list-header hidden-sm hidden-xs">
                            <div class="col-md-3">
                                <div class="header">Property</div>
                            </div>
                            <div class="col-md-2">
                                <div class="header">Type</div>
                            </div>
                            <div class="col-md-2">
                                <div class="header">Required</div>
                            </div>
                            <div class="col-md-5">
                                <div class="header">Description</div>
                            </div>
                        </div>

                        <div class="row margin-0">
                            <div class="col-md-3">
                                <div class="cell">
                                    <div class="propertyname">
                                        CurrencyCode <span class="mobile-isrequired">[Required]</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="cell">
                                    <div class="type">
                                        <code>String</code>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="cell">
                                    <div class="isrequired">
                                        Yes
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="cell">
                                    <div class="description">
                                        The standard ISO 4217 3-letter currency code
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--third tab-->
                <div class="bhoechie-tab-content">
<!--                    <div class="container">-->

<!--                        <div class="col-md-12">-->

                            <div class="panel panel-default panel-fade">

                                <div class="panel-heading">

							<span class="panel-title">

								<div class="pull-left">

								<ul class="nav nav-tabs">
									<li class="active"><a href="#letters" data-toggle="tab"><i                                                  class="glyphicon glyphicon-print"></i> All</a></li>
									<li><a href="#emails" data-toggle="tab"><i class="glyphicon glyphicon-send"></i> Sent</a></li>
									<li><a href="#loglist" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Received</a></li>
								</ul>

								</div>

<!--								<div class="btn-group pull-right">-->
<!--									<div class="btn-group">-->
<!--										<a href="#" class="btn  dropdown-toggle" data-toggle="dropdown">-->
<!--											<span class="glyphicon glyphicon-cog"></span>-->
<!--										</a>-->
<!--										<ul class="dropdown-menu" role="menu">-->
<!--											<li><a href="#">Action 1</a></li>-->
<!--											<li><a href="#">Action 2</a></li>-->
<!--											<li class="divider"></li>-->
<!--											<li><a href="#">Another Action</a></li>-->
<!--										</ul>-->
<!--									</div>-->
<!--								</div>-->

								<div class="clearfix"></div>

							</span>

                                </div>

                                <div class="panel-body">


                                    <div class="tab-content">


                                        <div class="tab-pane fade in active" id="letters">
                                            <h3>Letters</h3>
                                            <FORM ACTION="" METHOD="post">
                                                <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                                                <TABLE class="table table-striped" >
                                                    <THEAD>
                                                    <TR>
                                                        <TH style="text-align:left">Date</TH>
                                                        <TH style="text-align:left">Type</TH>
                                                        <TH style="text-align:left">Name</TH>
                                                        <TH style="text-align:left">Sender</TH>
                                                        <TH style="text-align:left">Recipient</TH>
                                                        <TH style="text-align:left">Amount</TH>
                                                    </TR>
                                                    </THEAD>
                                                    <TBODY>
                                                    <TR>
                                                        <TD>Season Subscription (Winter)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                        <TD>Season Winter</TD>
                                                        <TD>Winter</TD>
                                                    </TR>
                                                    </TBODY>
                                                </TABLE>
                                                Select events and click below<BR><BR>
                                                <INPUT TYPE="submit" CLASS="btn btn-outline btn-default" VALUE="Submit">
                                            </FORM>
                                        </div>


                                        <div class="tab-pane fade" id="emails">
                                            <h3>Emails</h3>
                                            <FORM ACTION="" METHOD="post">
                                                <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                                                <TABLE class="table table-striped">
                                                    <THEAD>
                                                    <TR>
                                                        <TH>Print</TH>
                                                        <TH style="text-align:left">Subscription</TH>
                                                        <TH style="text-align:left">Venue</TH>
                                                        <TH>Date/Time</TH>
                                                        <TH>Quantity</TH>
                                                    </TR>
                                                    </THEAD>
                                                    <TBODY>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Winter)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Spring)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Summer)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Fall)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    </TBODY>
                                                </TABLE>
                                                Select events and click below<BR><BR>
                                                <INPUT TYPE="submit" CLASS="btn btn-outline btn-default" VALUE="Submit">
                                            </FORM>
                                        </div>

                                        <div class="tab-pane fade" id="loglist">
                                            <h3>Logs</h3>
                                            <FORM ACTION="" METHOD="post">
                                                <INPUT TYPE="hidden" NAME="FormName" VALUE="PrintLetters">
                                                <TABLE class="table table-striped">
                                                    <THEAD>
                                                    <TR>
                                                        <TH>Print</TH>
                                                        <TH style="text-align:left">Subscription</TH>
                                                        <TH style="text-align:left">Venue</TH>
                                                        <TH>Date/Time</TH>
                                                        <TH>Quantity</TH>
                                                    </TR>
                                                    </THEAD>
                                                    <TBODY>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Winter)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Spring)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Summer)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    <TR>
                                                        <TD><INPUT TYPE="checkbox" NAME="EventCode" VALUE=588031></TD>
                                                        <TD>Season Subscription (Fall)</TD>
                                                        <TD>Downtown Theater</TD>
                                                        <TD>1/1/2015 12:00 PM</TD>
                                                        <TD>8</TD>
                                                    </TR>
                                                    </TBODY>
                                                </TABLE>
                                                Select events and click below<BR><BR>
                                                <INPUT TYPE="submit" CLASS="btn btn-outline btn-default" VALUE="Submit">
                                            </FORM>
                                        </div>

                                    </div>

                                </div>

                            </div>

<!--                        </div>-->

<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
</form>
</div>

<script>
    $(document).ready(function () {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });

    $(function () {
        $(".expand").on("click", function () {
// $(this).next().slideToggle(200);
            $expand = $(this).find(">:first-child");

            if ($expand.text() == "+") {
                $expand.text("-");
            } else {
                $expand.text("+");
            }
        });
    });
</script>


