<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property integer $id
 * @property string $receiver_name
 * @property string $receiver_address
 * @property string $subject
 * @property string $content
 * @property string $attachment
 * @property string $created_time
 */
class Email extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_address', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['receiver_name'], 'string', 'max' => 45],
            [['receiver_address'], 'string', 'max' => 100],
            [['subject', 'attachment'], 'string', 'max' => 255],
            [['attachment'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,gif,jpeg,bmp,txt,doc,docx,xlsx,csv'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_name' => 'Receiver Name',
            'receiver_address' => 'Receiver Address',
            'subject' => 'Subject',
            'content' => 'Content',
            'attachment' => 'Attachment',
            'created_time' => 'Created Time'
        ];
    }
}
