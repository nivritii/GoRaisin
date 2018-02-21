<?php

namespace frontend\models;
//namespace frontend\components;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $image
 * @property string $companyName
 * @property string $walletAddress
 * @property string $location;
 * @property string $website;
 * @property string $biography;
 * @property Campaign[] $campaigns
 * @property Fund[] $funds
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'image', 'walletAddress'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['companyName'], 'string', 'max' => 50],
            [['biography'],'string','max' => 500],
            [['walletAddress','location','website'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,gif,jpeg,bmp'],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'email can not be blank'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'email has been taken.'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'image' => 'Image',
            'companyName' => 'Company Name',
            'walletAddress' => 'Wallet Address',
            'location' => 'Location',
            'website' => 'Website',
            'biography' => 'Biography',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaigns()
    {
        return $this->hasMany(Campaign::className(), ['c_author' => 'id']);
    }

    public function getUsername(){
        return Yii::$app->user->identity->username;
    }

    public function getEmail(){
        return Yii::$app->user->identity->email;
    }

    public function getName(){
        return Yii::$app->user->identity->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunds()
    {
        return $this->hasMany(Fund::className(), ['fund_user_id' => 'id']);
    }
    /*
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /*
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /*
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /*
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /*
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /*
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /*
     * generate 'remember me' validate key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /*
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /*
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /*
     * @param string $password password to validate
     * @return boolean if password provided is valid
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
