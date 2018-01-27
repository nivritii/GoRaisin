<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "update_image".
 *
 * @property int $id
 * @property string $r_image
 * @property string $r_background_color
 *
 * @property Update[] $updates
 */
class UpdateImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'update_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['r_image', 'r_background_color'], 'required'],
            [['r_image', 'r_background_color'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'r_image' => 'R Image',
            'r_background_color' => 'R Background Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdates()
    {
        return $this->hasMany(Update::className(), ['image_id' => 'id']);
    }
}
