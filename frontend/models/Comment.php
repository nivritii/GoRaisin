<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $comment_id
 * @property int $comment_camp_id
 * @property int $comment_user_id
 * @property string $comment_content
 * @property string $comment_status
 * @property string $comment_datetime
 *
 * @property Campaign $commentCamp
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment_camp_id', 'comment_user_id', 'comment_content'], 'required'],
            [['comment_camp_id', 'comment_user_id'], 'integer'],
            [['comment_datetime'], 'safe'],
            [['comment_content', 'comment_status'], 'string', 'max' => 255],
            [['comment_camp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaign::className(), 'targetAttribute' => ['comment_camp_id' => 'c_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_camp_id' => 'Comment Camp ID',
            'comment_user_id' => 'Comment User ID',
            'comment_content' => 'Leave Your Comment',
            'comment_status' => 'Comment Status',
            'comment_datetime' => 'Comment Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentCamp()
    {
        return $this->hasOne(Campaign::className(), ['c_id' => 'comment_camp_id']);
    }
}
