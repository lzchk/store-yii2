<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property int $id
 * @property string|null $name
 * @property int $id_user
 * @property string $city
 * @property string $street
 * @property int $house
 * @property int|null $apartment
 * @property int|null $floor
 * @property int|null $intercom
 * @property int|null $comment
 *
 * @property Purchase[] $purchases
 * @property User $user
 * @property User[] $users
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'city', 'street', 'house'], 'required'],
            [['id_user', 'house', 'apartment', 'floor', 'intercom', 'comment'], 'integer'],
            [['name', 'city', 'street'], 'string', 'max' => 100],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
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
            'id_user' => 'Id User',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'apartment' => 'Apartment',
            'floor' => 'Floor',
            'intercom' => 'Intercom',
            'comment' => 'Comment',
        ];
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['id_delivery' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_delivery' => 'id']);
    }
}
