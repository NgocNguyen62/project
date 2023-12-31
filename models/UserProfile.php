<?php

namespace app\models;

use Yii;

class UserProfile extends \app\models\base\UserProfile
{
    public function getId()
    {
        return $this->id;
    }

    public function updateValue(){
        $this->gender = implode(',', $this->gender);
        $this->save();
    }
    public function getGender(){
        if($this->gender == 'male'){
            return 'nam';
        }
        return 'nữ';
    }
}