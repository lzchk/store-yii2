<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property int $id_category
 * @property int $expiration_date срок годности
 * @property int|null $id_company
 * @property int $weight
 * @property string $img
 * @property int $availability
 * @property int|null $sale_flag
 * @property int|null $new_flag
 * @property int|null $sale_price
 *
 * @property Basket[] $baskets
 * @property Category $category
 * @property Comment[] $comments
 * @property Company $company
 * @property Like[] $likes
 * @property Purchase[] $purchases
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'id_category', 'expiration_date', 'weight', 'img', 'availability'], 'required'],
            [['description'], 'string'],
            [['id_category', 'expiration_date', 'id_company', 'weight', 'availability', 'sale_flag', 'new_flag', 'sale_price'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['price'], 'string', 'max' => 10],
            [['img'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'id_category' => 'Категория',
            'expiration_date' => 'Срок годности',
            'id_company' => 'Компания',
            'weight' => 'Вес',
            'img' => 'Img',
            'availability' => 'Кол-во на складе',
            'sale_flag' => 'Флаг скидки',
            'new_flag' => 'Флаг новинки',
            'sale_price' => 'Акционная цена',
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::class, ['id_product' => 'id']);
    }
}
