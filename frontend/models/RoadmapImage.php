<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "roadmap_image".
 *
 * @property int $id
 * @property string $r_image
 *
 * @property Roadmap[] $roadmaps
 */
class RoadmapImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roadmap_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['r_image'], 'required'],
            [['r_image'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadmaps()
    {
        return $this->hasMany(Roadmap::className(), ['image_id' => 'id']);
    }
}
