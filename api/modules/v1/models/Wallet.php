<?php

namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $userId
 * @property string $brainKey
 * @property string $accname
 * @property int $balance
 *
 * @property User $user
 */
class Wallet extends ActiveRecord
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
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
