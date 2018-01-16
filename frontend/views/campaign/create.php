<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\Reward;


/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Create Campaign';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model = new Campaign();
$reward = new Reward();

?>
<div class="campaign-create">

<div class="campaign-create">
       
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
    <?php
    
    $form = ActiveForm::begin([
        'id' => 'campaign-create-form',
        'options' => ['enctype' => 'multipart/form-data']
    ]);
    
    $wizard_config = [
	'steps' => [
		'1' => [
			'title' => 'Start your campaign',
			'icon' => 'glyphicon glyphicon-briefcase',
			'content' => $this->render('_form_1',['model' => $model, 'reward' =>$reward]),
			'buttons' => [
				'next' => [
					'title' => 'Save and continue',
					'options' => [
						'class' => 'btn btn-info btn-next btn-lg'
					],
				 ],
			 ],
		],
       		'2' => [
			'title' => 'Rewards',
			'icon' => 'glyphicon glyphicon-gift',
			'content' => $this->render('_reward',['reward' => $reward]),
                        'buttons' => [
				'next' => [
					'title' => 'Save and continue',
					'options' => [
						'class' => 'btn btn-info btn-next btn-lg'
					],
				 ],
                                'prev' =>[
                                    'title' => 'Previous',
					'options' => [
						'class' => 'btn btn-info btn-next btn-lg'
					],
                                    
                                ]
			 ],
                ],
		'3' => [
			'title' => 'The Story',
			'icon' => 'glyphicon glyphicon-film',
			'content' => $this->render('_form_2',['model' => $model, 'reward' =>$reward]),
                        'buttons' => [
				'next' => [
					'title' => 'Save and continue',
					'options' => [
						'class' => 'btn btn-info btn-next btn-lg'
					],
				 ],
                                'prev' =>[
                                    'title' => 'Previous',
					'options' => [
						'class' => 'btn btn-info btn-next btn-lg'
					],
                                    
                                ]
			 ],
                ],
                '4' => [
			'title' => 'The Profile',
			'icon' => 'glyphicon glyphicon-user',
			'content' => $this->render('_form_3',['model' => $model, 'reward' =>$reward]),
                        'buttons' => [
                            'prev' =>[
                                    'title' => 'Previous',
					'options' => [
						'class' => 'btn btn-info btn-next btn-lg'
					],
                                    
                                ],
                            'save' => [
                            'html' => Html::submitButton('Save',['class' => 'btn btn-info btn-next btn-lg']),
                            ],
                        ],
                ],
                
	],
	
//        'complete_content' => "You are done!", // Optional final screen
	'start_step' => 1, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config);
//    Html::submitButton('Save', ['class' => 'btn btn-success']);
    ActiveForm::end();
?>
          </div>
        </div>
      </div>
    </div>
   
</div>

</div>
