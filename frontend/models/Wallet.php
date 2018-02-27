<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $userId
 * @property string $walletAddress
 * @property int $balance
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userId', 'walletAddress', 'balance'], 'required'],
            [['id', 'userId', 'balance'], 'integer'],
            [['walletAddress'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'walletAddress' => 'Wallet Address',
            'balance' => 'Balance',
        ];
    }
}