<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\CampaignReward;
use frontend\models\RewardItem;
use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use yii\helpers\Url;

HomePageAsset::register($this);
CampaignAsset::register($this);


/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Create Campaign - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'campaign-create-form',
    'options' => ['enctype' => 'multipart/form-data']
]);

/*$wizard_config = [
    'steps' => [
        '1' => [
            'title' => 'Start your campaign',
            'icon' => 'glyphicon glyphicon-briefcase',
            'content' => $this->render('_form_1',['model' => $model,]),
            'buttons' => [
                'next' => [
                    'title' => 'Continue',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],
                ],
            ],
        ],
        '2' => [
            'title' => 'Rewards',
            'icon' => 'glyphicon glyphicon-gift',
            'content' => $this->render('_reward',['c_reward' => $c_reward, 'rewardsItem' =>$rewardsItem]),
            'buttons' => [
                'next' => [
                    'title' => 'Save and continue',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],
                ],
                'prev' =>[
                    'title' => 'Previous',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],

                ]
            ],
        ],
        '3' => [
            'title' => 'The Story',
            'icon' => 'glyphicon glyphicon-film',
            'content' => $this->render('_form_2',['model' => $model,]),
            'buttons' => [
                'next' => [
                    'title' => 'Save and continue',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff;margin-top:350px',
                    ],
                ],
                'prev' =>[
                    'title' => 'Previous',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff;margin-top:350px',
                    ],

                ]
            ],
        ],
        '4' => [
            'title' => 'The Profile',
            'icon' => 'glyphicon glyphicon-user',
            'content' => $this->render('_form_3',['model' => $model, ]),
            'buttons' => [
                'prev' =>[
                    'title' => 'Previous',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],

                ],
                'save' => [
                    'html' => Html::submitButton('Save',['class' => 'basic-button','style' => 'color:#ffffff']),
                ],
            ],
        ],

    ],

    'start_step' => 1,
];*/
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'The Basics',
            'icon' => 'fa fa-pencil',
            'content' => $this->render('_form_1',['model' => $model]),
            'buttons' => [
                'next' => [
                    'title' => 'Forward',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],
                ],
            ],
        ],
        2 => [
            'title' => 'The Story',
            'icon' => 'fa fa-picture-o',
            'content' => $this->render('_form_2',['model' => $model]),
            'buttons' => [
                'next' => [
                    'title' => 'Next',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],
                ],
                'prev' => [
                    'title' => 'Previous',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],
                ],
            ],
        ],
        3 => [
            'title' => 'Company Profile',
            'icon' => 'fa fa-user-o',
            'content' => $this->render('_form_3',['model' => $model]),
            'buttons' => [
                'save' => [
                    'title' => 'Submit',
                    'html' => Html::submitButton('Save',['class' => 'basic-button','style' => 'color:#ffffff']),
                ],
                'prev' => [
                    'title' => 'Previous',
                    'options' => [
                        'class' => 'basic-button',
                        'style' => 'color:#ffffff',
                    ],
                ],
            ],
        ],
        /*4 => [
                'title' => 'Rewards',
            'icon' => 'fa fa-gift',
            'content' => '<h3>Step 4</h3>This is step 4',
        ],*/
    ],
    /*'start_step' => 1, // Optional, start with a specific step*/
];
?>

    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
    //    Html::submitButton('Save', ['class' => 'btn btn-success']);
    ActiveForm::end();
    ?>

<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
</script>