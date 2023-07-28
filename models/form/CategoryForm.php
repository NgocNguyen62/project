<?php
namespace app\models\form;

use yii\base\Model;

class CategoryForm extends Model
{

    public $id;
    public $avatar;

    public $name;
    public $description;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 5000],
            [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => ['png', 'jpg', 'PNG', 'JPG'], 'maxSize' => 1024 * 1024 * 10],
        ];
    }

    public function save($model)
    {
        if ($this->validate()) {
            $model->name = $this->name;
            $model->description = $this->description;

            $path_avatar = 'avatar/' . $this->avatar->baseName . time() . '.' . $this->avatar->extension;
            $model->avatar = $path_avatar;
//            var_dump($model);
            $rs = $model->save();
            $this->id = $model->id;
            if ($rs) {
                $folder = 'category/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $path_avatar = $folder . '/' .  $this->name . '.' . $this->avatar->extension;
                $model->avatar = $path_avatar;
                $this->avatar->saveAs($path_avatar);

                $model->save();
            } else {
                var_dump($this->errors);
                die();
            }
            return false;
        }
    }

}