<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 30/10/2017
 * Time: 12:39 PM
 */
namespace backend\models;

use yii\base\model;
use backend\models\UserBackend;

/*
 * Signup Form
 */

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirmPass;
    /*public $created_at;
    public $updated_at;*/

    /*
     * Rules for validate input
     */
    public function rules()
    {
        return [
            ['username','filter','filter' => 'trim'],
            ['username','required','message' => 'User Name cannot be blank'],
            ['username','unique','targetClass' => '\backend\models\UserBackend','message' => 'User Name has been used'],
            ['username','string','min' => 2, 'max' => 255],

            ['email','filter','filter' => 'trim'],
            ['email','required','message' => 'Email Address cannot be blank'],
            ['email','email'],
            ['email','string','max' => 255],
            ['email','unique','targetClass' => '\backend\models\UserBackend','message' => 'Email Address has been used'],

            ['password','required','message' => 'Password cannot be blank'],
            ['password','string','min' => 6,'tooShort' =>'Password must contain at least 6 digits'],

            ['confirmPass','required','message' => 'You need to confirm the password'],
            ['confirmPass','compare','compareAttribute' => 'password','message' => 'Confirm Password incorrect'],

            /*[['created_at','updated_at'],'default','value' => date('Y-m-d H:m:s')],*/
        ];
    }

    /*
     * User sign up
     * @return true|false create succeed or fail
     */
    public function signup()
    {
        if(!$this->validate()){
            return null;
        }

        //store data into db
        $user = new UserBackend();
        $user->username = $this->username;
        $user->email = $this->email;
        //$user->created_at = $this->created_at;
        //$user->updated_at = $this->updated_at;

        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save(false);
    }
}
