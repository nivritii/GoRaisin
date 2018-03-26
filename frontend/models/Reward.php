<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reward".
 *
 * @property int $r_id
 * @property int $c_id
 * @property int $r_discount
 * @property int $r_pledge_amt
 * @property string $r_description
 * @property int $r_validity
 * @property int $r_mandatory
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
            [['c_id', 'r_discount', 'r_pledge_amt', 'r_description', 'r_validity'], 'required'],
            [['c_id', 'r_discount', 'r_pledge_amt', 'r_validity'], 'integer'],
            [['r_description'], 'string', 'max' => 255],
            [['r_mandatory'], 'string', 'max' => 1],
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
            'r_discount' => 'R Discount',
            'r_pledge_amt' => 'R Pledge Amt',
            'r_description' => 'R Description',
            'r_validity' => 'R Validity',
            'r_mandatory' => 'R Mandatory',
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
