<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $country
 * @property string $country_code
 *
 * @property Campaign[] $campaigns
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'country_code'], 'required'],
            [['country'], 'string', 'max' => 255],
            [['country_code'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'country_code' => 'Country Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaigns()
    {
        return $this->hasMany(Campaign::className(), ['c_location' => 'id']);
    }
}
