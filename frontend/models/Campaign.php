<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "campaign".
 *
 * @property int $c_id
 * @property string $c_title
 * @property int $c_cat_id
 * @property string $c_status
 * @property string $c_created_at
 * @property int $c_author
 * @property int $c_location
 * @property string $c_image
 * @property string $c_description
 * @property string $c_start_date
 * @property string $c_end_date
 * @property int $c_goal
 * @property string $c_video
 * @property string $c_description_long
 * @property int $c_new_tag
 *
 * @property Category $cCat
 * @property User $cAuthor
 * @property Location $cLocation
 * @property Category[] $categories
 * @property Comment[] $comments
 * @property Company[] $companies
 * @property Faq[] $faqs
 * @property Fund[] $funds
 * @property Reward[] $rewards
 * @property Update[] $updates
 */
class Campaign extends \yii\db\ActiveRecord
{
    public $email;
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
            [['c_author','c_cat_id','c_description', 'c_location'], 'required'],
            [['c_cat_id', 'c_author', 'c_location', 'c_goal', 'c_new_tag'], 'integer'],
            [['c_created_at', 'c_start_date', 'c_end_date'], 'safe'],
            [['c_description_long'], 'string'],
            [['c_title', 'c_image'], 'string', 'max' => 100],
            [['c_status', 'c_description', 'c_video'], 'string', 'max' => 255],
            [['c_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['c_cat_id' => 'id']],
            [['c_author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['c_author' => 'id']],
            [['c_location'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['c_location' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_title' => 'C Title',
            'c_cat_id' => 'C Cat ID',
            'c_status' => 'C Status',
            'c_created_at' => 'C Created At',
            'c_author' => 'C Author',
            'c_location' => 'C Location',
            'c_image' => 'C Image',
            'c_description' => 'C Description',
            'c_start_date' => 'C Start Date',
            'c_end_date' => 'C End Date',
            'c_goal' => 'C Goal',
            'c_video' => 'C Video',
            'c_description_long' => 'C Description Long',
            'c_new_tag' => 'C New Tag',
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
    public function getCLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'c_location']);
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
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['campaign_id' => 'c_id']);
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
    public function getFunds()
    {
        return $this->hasMany(Fund::className(), ['fund_c_id' => 'c_id']);
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

    /**
     * Sends an email to inform user about activity they do.
     *
     * @return bool whether the email was send
     */
    public function sendReviewEmail()
    {
        return Yii::$app
            ->mailer
            ->compose()
            ->setFrom([Yii::$app->params['supportEmail'] => 'GoRaisin'])
            ->setTo($this->cAuthor->email)
            ->setSubject('Your Campaign is being moderated!')
            ->setHtmlBody('Dear '.$this->cAuthor->username.', <br /> Your campaign '.$this->c_title.' has been sent to review for moderation.')
            ->send();
    }
}
