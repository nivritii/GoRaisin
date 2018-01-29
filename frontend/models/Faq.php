<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property int $campaign_id
 * @property int $user_id
 * @property string $question
 * @property string $answer
 * @property string $timestamp
 * @property string $to_email_id
 * @property string $from_email_id
 *
 * @property Campaign $campaign
 * @property User $user
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_id', 'user_id', 'question', 'answer', 'to_email_id', 'from_email_id'], 'required'],
            [['campaign_id', 'user_id'], 'integer'],
            [['question', 'answer'], 'string'],
            [['timestamp'], 'safe'],
            [['to_email_id', 'from_email_id'], 'string', 'max' => 255],
            [['campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['campaign_id' => 'c_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'question' => 'Question',
            'answer' => '',
            'timestamp' => 'Timestamp',
            'to_email_id' => 'To Email ID',
            'from_email_id' => 'From Email ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaign()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'campaign_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
