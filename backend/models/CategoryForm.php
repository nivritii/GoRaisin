<?php

namespace backend\models;

use Yii;
use common\models\Category;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 */
class CategoryForm extends Category
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
            [['name'], 'required'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Category ID',
            'name' => 'Category Name',
        ];
    }

    public static function dropDownList ()
    {
        $query = static::find();
        $enums = $query->all();
        return $enums ? ArrayHelper::map($enums,'id','name') : [];
    }
}
