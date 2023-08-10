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
//    public $firstName;
//
//    public $lastName;
//    public $phoneNum;
    public $role;
    public $profile_id;
    public $lock;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 255],
            ['password', 'string', 'min' => 8, 'message'=>'Mật khẩu ít nhất 8 kí tự'],
            ['password', 'match', 'pattern' => '/[!@#$%^&*(),.?":{}|<>]/', 'message' => 'Mật khẩu bao gồm ít nhất 1 kí tự đặc biệt.'],
//            [['firstName', 'lastName'], 'string', 'max' => 255],
//            [['phoneNum'], 'string', 'max' => 10],
            [['id', 'profile_id'], 'integer'],
            [['role'], 'string'],
            [['lock'], 'integer']
        ];
    }

    public function save($user) {
        if($this->validate()) {
//            $user = new User();
            $user->username = $this->username;
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
//            $user->created_at = time();
//            $user->created_by = Yii::$app->user->identity->username;
            //$user->password = $this->password;
            $user->role = $this->role;
            $user->lock = $this->lock;
            $rs = $user->save();
            $auth = Yii::$app->authManager;
            $this->id = $user->id;
//            return $rs;
            // var_dump($rs);
            if($rs) {
                if((UserProfile::findOne(['user_id'=>$this->id])) == null){
                    $user_profile = new UserProfile();
                    $user_profile->user_id = $this->id;

                    $pr  = $user_profile->save();
                    // var_dump($pr);
                    // die;
                    if($pr) {
                        $this->profile_id = $user_profile->id;
                        return $rs;
                    }
                }

            }
        }
        return false;
    }

}
