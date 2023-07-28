<?php
namespace app\models\form;

use app\models\base\User;
use yii\base\Model;

class ProfileForm extends Model
{

    public $id;
    public $avatar;
    public $user_id;

    public $firstName;
    public $lastName;
    public $phoneNum;
    public $email;
    public $gender;


    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['firstName', 'lastName', 'phoneNum', 'gender', 'email'], 'string', 'max' => 255],
//            [['gender'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg', 'PNG', 'JPG'], 'maxSize' => 1024 * 1024 * 10],
        ];
    }

    public function save($model)
    {
//        var_dump($this);
//        die();
        $this->gender = implode(',', $this->gender);
        if ($this->validate()) {
//            die();
            $model->user_id = $this->user_id;
            $model->firstName = $this->firstName;
            $model->lastName = $this->lastName;
            $model->phoneNum = $this->phoneNum;
            $model->email = $this->email;
            $model->gender = $this->gender;
            $path_avatar = 'avatar/' ;
            $model->avatar = $path_avatar;
            $rs = $model->save();

            $this->id = $model->id;
            if ($rs) {
                $folder = 'user/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $path_avatar = $folder .  $this->user_id . '-' . time() . '.' . $this->avatar->extension;
                $model->avatar = $path_avatar;
                $this->avatar->saveAs($path_avatar);

                $model->save();
                return true;
            } else {
                var_dump($this->errors);
                die();
            }
            return false;
        }
    }

}