<?php

namespace app\models;

use Yii;
use mongosoft\file\UploadImageBehavior;
use PetraBarus\Yii2\Validators\EitherValidator;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $price
 * @property integer $trade_price
 * @property string $name
 * @property string $description
 * @property string $image
 */
class Product extends \yii\db\ActiveRecord
{
    const DESC_LENGTH = 130;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['id', 'category_id', 'price', 'trade_price'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 200],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['default', 'create', 'update']],
            [['price'], EitherValidator::className(),'otherAttributes' => ['trade_price']]
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => UploadImageBehavior::className(),
                'attribute' => 'image',
                'scenarios' => ['default', 'create', 'update'],
                'placeholder' => '@webroot/img/product/no-image.jpg',
                'path' => '@webroot/img/product/{id}',
                'url' => '@web/img/product/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 400, 'quality' => 90],
                    'preview' => ['width' => 200, 'height' => 200],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'trade_price' => 'Оптовая цена',
            'name' => 'Название',
            'description' => 'Описание',
            'properties' => 'Характеристики',
            'image' => 'Картинка',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getProperties()
    {
        return $this->hasMany(ProductProperties::className(), ['product_id' => 'id']);
    }

    public function getRawProperties()
    {
        $content = '';
        foreach ($this->properties as $property) {
            $content .= $property->name . ': ' . $property->value . '<br />';
        }
        return $content;
    }

    public function getShortDescription()
    {
        if (strlen($this->description) > self::DESC_LENGTH) {
            return iconv_substr($this->description, 0, self::DESC_LENGTH, 'utf-8') . '...';
        }
        return $this->description;
    }
}
