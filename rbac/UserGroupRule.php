<?php

namespace app\rbac;

use app\models\User;
use Yii;
use yii\rbac\Rule;

/**
 * Checks if user group matches
 */
class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $group = Yii::$app->user->identity->getRole();
            if ($item->name === 'admin') {
                return $group == User::ROLE_ADMIN;
            } elseif ($item->name === 'user') {
                return $group == User::ROLE_ADMIN || $group == User::ROLE_USER;
            }
        }
        return false;
    }
}

//$auth = Yii::$app->authManager;
//
//$rule = new \app\rbac\UserGroupRule;
//$auth->add($rule);
//
//$user = $auth->createRole('user');
//$user->ruleName = $rule->name;
//$auth->add($user);
//// ... add permissions as children of $author ...
//
//$admin = $auth->createRole('admin');
//$admin->ruleName = $rule->name;
//$auth->add($admin);
//$auth->addChild($admin, $user);