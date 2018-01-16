<?php

namespace backend\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user_backend".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $email
 * @property string $mobile
 * @property string $position
 * @property string $image
 */
class UserBackend extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_backend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['username', 'password_hash', 'email','image'], 'string', 'max' => 255],
            [['mobile','position','phone'],'string','max' => 20],
            [['auth_key'], 'string', 'max' => 32],
            [['image'],'file','skipOnEmpty' => true, 'extensions' => 'png,jpg,gif'],
            [['email'], 'unique'],
            [['username'], 'unique'],
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
            'email' => 'Email',
            'created_at' => 'Created_at',
            'updated_at' => 'Updated_at',
            'mobile' => 'Mobile',
            'position' => 'Position',
            'phone' => 'Phone',
            'image' => 'Image',
        ];
    }

    /*
     * @inheritdoc
     * Find user in db
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /*
     * @inheritdoc
     * Retrieve user by access_token (not implement yet)
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

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
