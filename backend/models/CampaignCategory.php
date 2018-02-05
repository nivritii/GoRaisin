<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "campaign_category".
 *
 * @property integer $campaign_id
 * @property integer $category_id
 */
class CampaignCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_id', 'category_id'], 'required'],
            [['campaign_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'campaign_id' => 'Campaign ID',
            'category_id' => 'Category_ID',
        ];
    }

    public static function getRelationCategories ($campaignId)
    {
        $res = static::find()->select('category_id')->where(['campaign_id' => $campaignId])->all();
        return $res ? ArrayHelper::getColumn($res, 'category_id') : [];
    }
}
