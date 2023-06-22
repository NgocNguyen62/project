<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $user_id
 * @property string $firstName
 * @property string $lastName
 * @property string|null $phoneNum
 * @property int|null $role
 *
 * @property User $user
 */
class User_profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'firstName', 'lastName'], 'required'],
            [['user_id', 'role'], 'integer'],
            [['firstName', 'lastName', 'phoneNum'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'phoneNum' => 'Phone Num',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
