<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reward".
 *
 * @property int $r_id
 * @property int $c_id
 * @property string $r_title
 * @property int $r_pledge_amt
 * @property string $r_description
 * @property string $r_delivery_date
 * @property string $r_shipping_details
 * @property int $r_limit_availability
 *
 * @property Campaign $c
 */
class Reward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reward';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'r_title', 'r_pledge_amt', 'r_description', 'r_delivery_date', 'r_shipping_details', 'r_limit_availability'], 'required'],
            [['c_id', 'r_pledge_amt', 'r_limit_availability'], 'integer'],
            [['r_delivery_date'], 'safe'],
            [['r_title', 'r_description', 'r_shipping_details'], 'string', 'max' => 255],
            [['c_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['c_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'r_id' => 'R ID',
            'c_id' => 'C ID',
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
    public function getC()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'c_id']);
    }
}
