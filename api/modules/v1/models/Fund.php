<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "fund".
 *
 * @property int $fund_id
 * @property int $fund_c_id
 * @property int $fund_user_id
 * @property int $r_id
 * @property double $fund_amt
 * @property string $fund_created_on
 *
 * @property User $fundUser
 * @property Campaign $fundC
 */
class Fund extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fund';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fund_c_id', 'fund_user_id', 'fund_amt'], 'required'],
            [['fund_c_id', 'fund_user_id', 'r_id'], 'integer'],
            [['fund_amt'], 'number'],
            [['fund_created_on'], 'safe'],
            [['fund_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fund_user_id' => 'id']],
            [['fund_c_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['fund_c_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fund_id' => 'Fund ID',
            'fund_c_id' => 'Fund C ID',
            'fund_user_id' => 'Fund User ID',
            'r_id' => 'R ID',
            'fund_amt' => 'Fund Amt',
            'fund_created_on' => 'Fund Created On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFundUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fund_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFundC()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'fund_c_id']);
    }
}
