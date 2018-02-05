<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "support".
 *
 * @property int $id
 * @property string $email
 * @property string $type
 * @property string $content
 */
class Support extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'type', 'content'], 'required'],
            [['content'], 'string'],
            [['email'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'type' => 'Type',
            'content' => 'Content',
        ];
    }
}
