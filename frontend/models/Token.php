<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property int $t_id
 * @property int $c_id
 * @property string $t_name
 * @property int $t_value
 * @property int $t_supply
 *
 * @property Campaign $c
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 't_name', 't_value', 't_supply'], 'required'],
            [['c_id', 't_supply'], 'integer'],
            [['t_name'], 'string', 'max' => 255],
            [['c_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['c_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'T ID',
            'c_id' => 'C ID',
            't_name' => 'Token Name',
            't_value' => 'Token Value',
            't_supply' => 'Token Supply',
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
