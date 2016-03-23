<?php

namespace app\models;

use Yii;
use PetraBarus\Yii2\Validators\EitherValidator;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $price
 * @property integer $trade_price
 * @property string $name
 * @property string $description
 */
class Product extends \yii\db\ActiveRecord
{
    const DESC_LENGTH = 160;

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
            [['price'], EitherValidator::className(), 'otherAttributes' => ['trade_price']]
        ];
    }

    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@webroot/img/product'),
                'url' => Yii::getAlias('@web/img/product'),
                'hasName' => false,
                'hasDescription' => false,
                'versions' => []
            ]
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

    public function clearProperties()
    {
        if (!empty($this->properties)) {
            foreach($this->properties as $property) {
                $property->delete();
            }
        }
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

    public function getImages()
    {
        return $this->getBehavior('galleryBehavior')->getImages();
    }

    public function getImageUrl($type = 'preview')
    {
        if ($images = $this->getImages()) {
            return current($images)->getUrl($type);
        }

        return self::noImage();
    }

    public static function noImage()
    {
        return Yii::getAlias('@web/img/product/no-image.jpg');
    }
}
