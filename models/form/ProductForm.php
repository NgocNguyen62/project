<?php
namespace app\models\form;

use yii\base\Model;
use app\models\Products;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class ProductForm extends Model {

    public $id;
    public $avatar;

    public $image_360;

    public $name;
    public $category_id;
    public $description;
    public $status;
    public function rules()
    {
        return [
            [['name', 'category_id', 'status'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
            [['category_id', 'status'], 'integer'],
            [['avatar'], 'image', 'skipOnEmpty' => false, 'extensions' => ['png', 'jpg', 'PNG', 'JPG']],
            [['image_360'], 'image', 'skipOnEmpty' => false],
        ];
    }

    public function save() {
        if ($this->validate()){
            $model = new Products();
            $model->name = $this->name;
            $model->category_id = $this->category_id;
            $model->description = $this->description;
            $model->status = $this->status;

            $path_avatar = 'avatar/' . $this->avatar->baseName . time() . '.' . $this->avatar->extension;
            $model->avatar = $path_avatar;
            $this->avatar->saveAs($path_avatar);

            $path_file360 = 'image_360/' . $this->image_360->baseName . time() . '.' . $this->image_360->extension;
            $model->image_360 = $path_file360;
            $this->image_360->saveAs($path_file360);

            $model->save();
            $this->id = $model->id;
            return true;
        } else {
            var_dump($this->errors);
            die();
        }
        return false;
    }

    public function updateValue($model){
//        $model = Products::findOne($id);
        if($model != null){
            $path_avatar = 'avatar/' . $this->avatar->baseName . time() . '.' . $this->avatar->extension;
            $model->avatar = $path_avatar;
            $this->avatar->saveAs($path_avatar);

            $path_file360 = 'image_360/' . $this->image_360->baseName . time() . '.' . $this->image_360->extension;
            $model->image_360 = $path_file360;
            $this->image_360->saveAs($path_file360);
            $model->save();
            return true;
        }
        return false;
    }
}