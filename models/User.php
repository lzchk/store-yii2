<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $phone
 * @property string $name
 * @property string $password
 * @property int $role 0 - юзер, 1 - админ
 * @property string|null $date_of_birth
 * @property string $sex
 * @property string|null $avatar
 * @property int|null $id_card основная карта
 * @property int|null $id_delivery основной адрес
 *
 * @property Basket[] $baskets
 * @property Card $card
 * @property Card[] $cards
 * @property Comment[] $comments
 * @property Delivery[] $deliveries
 * @property Delivery $delivery
 * @property Like[] $likes
 * @property Purchase[] $purchases
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $passwordConfirm;
    public $agree;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'name', 'password', 'sex'], 'required'],
            [['role', 'id_card', 'id_delivery'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['phone'], 'string', 'max' => 30],
            [['name', 'password'], 'string', 'max' => 100],
            [['avatar'], 'string', 'max' => 300],
            [['id_card'], 'exist', 'skipOnError' => true, 'targetClass' => Card::class, 'targetAttribute' => ['id_card' => 'id']],
            [['id_delivery'], 'exist', 'skipOnError' => true, 'targetClass' => Delivery::class, 'targetAttribute' => ['id_delivery' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Номер телефона',
            'name' => 'ФИО',
            'password' => 'Пароль',
            'role' => 'Role',
            'date_of_birth' => 'День рождения',
            'sex' => 'Пол',
            'avatar' => 'Аватар',
            'agree' => 'Даю согласие на обработку персональных данных',
            'id_card' => 'Банковская карта',
            'id_delivery' => 'Адрес доставки',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::class, ['id' => 'id_card']);
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Deliveries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Delivery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(Delivery::class, ['id' => 'id_delivery']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['id_user' => 'id']);
    }

    #################################################
    #Реализация интерфейса
    ################################################

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        //ищем юзера с таким же id
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //поиск одного юзера по его УНИКАЛЬНОМУ номеру телефона
        return self::find()->where(['phone' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
       
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //сравнение пароля, который ввел юезер, с паролем в БД
        return $this->password === $password;
    }
}
