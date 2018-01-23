<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reward_item".
 *
 * @property int $r_id
 * @property int $campaign_reward_id
 * @property string $r_title
 * @property int $r_pledge_amt
 * @property string $r_description
 * @property string $r_delivery_date
 * @property string $r_shipping_details
 * @property int $r_limit_availability
 *
 * @property CampaignReward $campaignReward
 */
class RewardItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reward_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_reward_id', 'r_title', 'r_pledge_amt', 'r_description', 'r_delivery_date', 'r_shipping_details', 'r_limit_availability'], 'required'],
            [['campaign_reward_id', 'r_pledge_amt', 'r_limit_availability'], 'integer'],
            [['r_delivery_date'], 'safe'],
            [['r_title', 'r_description', 'r_shipping_details'], 'string', 'max' => 255],
            [['campaign_reward_id'], 'exist', 'skipOnError' => true, 'targetClass' => CampaignReward::className(), 'targetAttribute' => ['campaign_reward_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'r_id' => 'R ID',
            'campaign_reward_id' => 'Campaign Reward ID',
            'r_title' => 'R Title',
            'r_pledge_amt' => 'R Pledge Amt',
            'r_description' => 'R Description',
            'r_delivery_date' => 'R Delivery Date',
            'r_shipping_details' => 'R Shipping Details',
            'r_limit_availability' => 'R Limit Availability',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignReward()
    {
        return $this->hasOne(CampaignReward::className(), ['id' => 'campaign_reward_id']);
    }
}
