<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $campaign_id
 * @property int $user_id
 * @property int $author_id
 * @property string $question
 *
 * @property User $author
 * @property Campaign $campaign
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_id', 'user_id', 'author_id', 'question'], 'required'],
            [['campaign_id', 'user_id', 'author_id'], 'integer'],
            [['question'], 'string', 'max' => 45],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['campaign_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'campaign_id' => 'Campaign ID',
            'user_id' => 'User ID',
            'author_id' => 'Author ID',
            'question' => 'Question',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaign()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'campaign_id']);
    }

    /**
     * Sends an email to publisher, notify publisher about question.
     *
     * @return bool whether the email was send
     */
    public function sendQuestionEmail()
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'FAQtemplate-html','text' => 'FAQtemplate-text'],
                ['content' => $this->question,'user' => $this->author->username,'questionUser' => Yii::$app->user->identity->username]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => 'GoRaisin'])
            ->setTo($this->author->email)
            ->setSubject('There is a question about your campaign!')
            ->send();
    }
}
