<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property string $type
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'type'], 'required'],
            [['question', 'answer'], 'string'],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'type' => 'Type',
        ];
    }
}
