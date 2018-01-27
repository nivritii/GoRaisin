<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "update".
 *
 * @property int $id
 * @property int $campaign_id
 * @property string $title
 * @property string $content
 * @property string $timestamp
 * @property int $image_id
 *
 * @property Campaign $campaign
 * @property UpdateImage $image
 */
class Update extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'update';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign_id', 'title', 'content', 'image_id'], 'required'],
            [['campaign_id', 'image_id'], 'integer'],
            [['content'], 'string'],
            [['timestamp'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['campaign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['campaign_id' => 'c_id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => UpdateImage::className(), 'targetAttribute' => ['image_id' => 'id']],
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
            'title' => 'Title',
            'content' => 'Post an update',
            'timestamp' => 'Timestamp',
            'image_id' => 'Image ID',
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
    public function getImage()
    {
        return $this->hasOne(UpdateImage::className(), ['id' => 'image_id']);
    }
}
