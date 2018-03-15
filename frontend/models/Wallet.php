<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $userId
 * @property string $brainKey
 * @property string $accname
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
            [['userId', 'brainKey', 'accname', 'balance'], 'required'],
            [['userId', 'balance'], 'integer'],
            [['brainKey', 'accname'], 'string', 'max' => 255],
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
            'brainKey' => 'Brain Key',
            'accname' => 'Accname',
            'balance' => 'Balance',
        ];
    }
}
