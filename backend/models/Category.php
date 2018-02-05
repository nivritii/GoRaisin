<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id Category ID
 * @property string $name Category Name
 * @property string $class
 * @property int $featured_campaign_id
 *
 * @property Campaign[] $campaigns
 * @property Campaign $featuredCampaign
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['featured_campaign_id'], 'required'],
            [['featured_campaign_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['class'], 'string', 'max' => 255],
            [['featured_campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['featured_campaign_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'class' => 'Class',
            'featured_campaign_id' => 'Featured Campaign ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaigns()
    {
        return $this->hasMany(Campaign::className(), ['c_cat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturedCampaign()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'featured_campaign_id']);
    }
}
