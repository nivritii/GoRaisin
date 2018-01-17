<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fund".
 *
 * @property int $fund_id
 * @property int $fund_c_id
 * @property int $fund_user_id
 * @property double $fund_amt
 * @property string $fund_note
 *
 * @property User $fundUser
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
            [['fund_c_id', 'fund_user_id', 'fund_amt', 'fund_note'], 'required'],
            [['fund_c_id', 'fund_user_id'], 'integer'],
            [['fund_amt'], 'number'],
            [['fund_note'], 'string'],
            [['fund_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fund_user_id' => 'id']],
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
            'fund_amt' => 'Fund Amt',
            'fund_note' => 'Fund Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFundUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fund_user_id']);
    }
}
