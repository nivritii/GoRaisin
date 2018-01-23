<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "campaign_reward".
 *
 * @property int $id
 * @property int $campaign_id
 *
 * @property Campaign $campaign
 * @property RewardItem[] $rewardItems
 */
class CampaignReward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign_reward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_id'], 'required'],
            [['campaign_id'], 'integer'],
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
    public function getRewardItems()
    {
        return $this->hasMany(RewardItem::className(), ['campaign_reward_id' => 'id']);
    }
}
