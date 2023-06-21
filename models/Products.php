<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string|null $description
 * @property string $status
 * @property string $avatar
 * @property string $image_360
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;
    public $file_360;

    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'status', 'avatar', 'image_360'], 'required'],
            [['category_id'], 'integer'],
            [['name', 'description', 'status', 'avatar', 'image_360'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'status' => 'Status',
            'avatar' => 'Avatar',
            'image_360' => 'Image 360',
        ];
    }

    public function upload(){
        $imagePath = 'avatars/' . $this->imageFile->baseName . time() .'.' . $this->imageFile->extension;
        $this->avatar = $imagePath;
        $this->imageFile->saveAs($imagePath);

        $filePath = 'files/' . $this->file_360->baseName. time() . '.' . $this->file_360->extension;
        $this->image_360 = $filePath;
        $this->file_360->saveAs($filePath);

        $this->save();
        return true;
    }
    public function increasingView($id){
        if(($view = Views::findOne(['product_id'=>$id])) !== null){
            $view->count += 1;
            $view->save(false, ['count']);
            return true;
        }
        return false;
    }
}
