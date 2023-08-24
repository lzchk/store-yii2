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
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'name', 'password', 'sex', 'passwordConfirm', 'agree'], 'required', 'message'=>'Поле обязательно для заполнения'],
            ['name', 'match', 'pattern'=>'/^[А-Я-а-я\s\-]{3,}$/u', 'message'=>'Только кириллица, пробелы и дефисы'],
            [['phone'], 'unique'],
            [['passwordConfirm'], 'compare', 'compareAttribute'=>'password', 'message'=> 'Пароли должны совпадать'],
            [['role', 'id_card', 'id_delivery'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['agree'], 'boolean'],
            [['agree'], 'compare', 'compareValue'=>true, 'message'=>'Необходимо дать согласие'],
            [['phone'], 'string', 'max' => 11],
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
            'passwordConfirm' => 'Повторение пароля',
            'date_of_birth' => 'День рождения',
            'sex' => 'Пол',
            'avatar' => 'Аватар',
            'id_card' => 'Карта',
            'id_delivery' => 'Адрес доставки',
            'agree' => 'Даю согласие на обработку данных',
        ];
    }
}
