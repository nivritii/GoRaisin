<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "campaign".
 *
 * @property string $c_title
 * @property string $c_image
 * @property string $c_description
 * @property string $c_start_date
 * @property string $c_end_date
 * @property int $c_goal
 * @property int $c_id
 * @property string $c_video
 * @property resource $c_description_long
 * @property int $c_author
 * @property string $c_created_at
 * @property string $c_display_name
 * @property string $c_email
 * @property string $c_location
 * @property string $c_biography
 * @property string $c_social_profile
 * @property string $c_status
 * @property int $c_cat_id
 * @property int $c_new_tag
 *
 * @property Category $cCat
 * @property User $cAuthor
 * @property CampaignReward[] $campaignRewards
 * @property Category[] $categories
 * @property Comment[] $comments
 * @property Faq[] $faqs
 * @property Reward[] $rewards
 * @property Update[] $updates
 */
class Campaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_title', 'c_description', 'c_start_date', 'c_end_date', 'c_goal', 'c_video', 'c_description_long', 'c_author', 'c_display_name', 'c_email', 'c_location', 'c_biography', 'c_social_profile'], 'required'],
            [['c_start_date', 'c_end_date', 'c_created_at'], 'safe'],
            [['c_goal', 'c_author', 'c_cat_id', 'c_new_tag'], 'integer'],
            [['c_description_long', 'c_biography'], 'string'],
            [['c_title', 'c_image'], 'string', 'max' => 100],
            [['c_description', 'c_video', 'c_display_name', 'c_email', 'c_location', 'c_social_profile', 'c_status'], 'string', 'max' => 255],
            [['c_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['c_cat_id' => 'id']],
            [['c_author'], 'exist', 'skipOnError' => true, 'targetClass' => FrontendUser::className(), 'targetAttribute' => ['c_author' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_title' => 'Title',
            'c_image' => 'Image',
            'c_description' => 'Short Description',
            'c_start_date' => 'Start Date',
            'c_end_date' => 'End Date',
            'c_goal' => 'Goal',
            'c_id' => 'ID',
            'c_video' => 'Video',
            'c_description_long' => 'Description Long',
            'c_author' => 'Author',
            'c_created_at' => 'Created At',
            'c_display_name' => 'Display Name',
            'c_email' => 'Email',
            'c_location' => 'Location',
            'c_biography' => 'Biography',
            'c_social_profile' => 'Social Profile',
            'c_status' => 'Status',
            'c_cat_id' => 'Category ID',
            'c_new_tag' => 'New Tag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCCat()
    {
        return $this->hasOne(Category::className(), ['id' => 'c_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'c_author']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaignRewards()
    {
        return $this->hasMany(CampaignReward::className(), ['campaign_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['featured_campaign_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['comment_camp_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaqs()
    {
        return $this->hasMany(Faq::className(), ['campaign_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRewards()
    {
        return $this->hasMany(Reward::className(), ['c_id' => 'c_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdates()
    {
        return $this->hasMany(Update::className(), ['campaign_id' => 'c_id']);
    }
}
