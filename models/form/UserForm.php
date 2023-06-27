<?php

namespace app\models\form;

use app\models\base\User;
use app\models\base\UserProfile;
use Yii;
use yii\base\Model;

class UserForm extends Model
{
    public $id;
    public $username;
    public $password;
    public $firstName;

    public $lastName;
    public $phoneNum;

    public $profile_id;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
            [['firstName', 'lastName'], 'string', 'max' => 255],
            [['phoneNum'], 'string', 'max' => 10],
            [['id', 'profile_id'], 'integer']
        ];
    }


    public function save() {
        if($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            //$user->password = $this->password;
            $user->role = 0;
            $rs = $user->save();
            $this->id = $user->id;
            // var_dump($rs);
            if($rs) {
                $user_profile = new UserProfile();
                $user_profile->user_id = $this->id;
                $user_profile->firstName = $this->firstName;
                $user_profile->lastName = $this->lastName;
                $user_profile->phoneNum = $this->phoneNum;
               
                $pr  = $user_profile->save();
                // var_dump($pr);
                // die;
                if($pr) {
                    $this->profile_id = $user_profile->id;
                    return $rs;
                }
            }
        }
        return false;
    }
}
