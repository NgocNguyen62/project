<?php

namespace app\models;

use Yii;

class User extends \app\models\base\User implements \yii\web\IdentityInterface
{

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    const LOCK = 1;
    const UNLOCK = 0;
    public static function getRoles() {
        return [
            self::ROLE_ADMIN => 'admin',
            self::ROLE_USER => 'user'
        ];
    }
    public static function isLock(){
        return[
            self::LOCK => 'lock',
            self::UNLOCK => 'unlock'
        ];
    }
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getRole(){
        return $this->role;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw  new NotSupportedException();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getProfileId(){
        $profile = $this->userProfiles;
        return $profile->getId();
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function updateValue(){
        $this->updated_at = time();
        $this->updated_by = Yii::$app->user->identity->username;
        return true;
    }
}
