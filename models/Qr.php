<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qrcode".
 *
 * @property int $id
 * @property int $product_id
 * @property string $qr
 */
class Qr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qrcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'qr'], 'required'],
            [['product_id'], 'integer'],
            [['qr'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'qr' => 'Qr',
        ];
    }
}
