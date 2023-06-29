<?php
namespace app\commands;

use app\rbac\UserGroupRule;
use yii\console\Controller;
use yii\rbac\PhpManager;
use yii\rbac\Role;
use app\models\User;
use Yii;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $createPost);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $userGroupRule = new UserGroupRule();
        $auth->add($userGroupRule);
        $admin->ruleName  = $userGroupRule->name;
        $user->ruleName  = $userGroupRule->name;

        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $user);

//        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
//        // usually implemented in your User model.
//        $auth->assign($user, 2);
//        $auth->assign($admin, 1);
    }
}
