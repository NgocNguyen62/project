<?php

namespace app\models;

use Yii;

class User extends \app\models\base\User implements \yii\web\IdentityInterface
{

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    public static function getRoles() {
        return [
            self::ROLE_ADMIN => 'admin',
            self::ROLE_USER => 'user'
        ];
    }
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password)
    {
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
        //return $this->password === $password;
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

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
