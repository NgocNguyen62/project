<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string|null $description
 * @property int $status
 * @property string $avatar
 * @property string $image_360
 * @property int|null $created_at
 * @property string|null $created_by
 * @property int|null $updated_at
 * @property string|null $updated_by
 *
 * @property Categories $category
 * @property Qrcode[] $qrcodes
 * @property Rate[] $rates
 * @property View[] $views
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'avatar', 'image_360', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 5000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Qrcodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQrcodes()
    {
        return $this->hasMany(Qrcode::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Rates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rate::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Views]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getViews()
    {
        return $this->hasMany(View::class, ['product_id' => 'id']);
    }
}
