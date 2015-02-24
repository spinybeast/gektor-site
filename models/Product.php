<?php

namespace app\models;

use Yii;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $price
 * @property string $name
 * @property string $description
 * @property string $image
 */
class Product extends \yii\db\ActiveRecord
{
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
            [['id'], 'required'],
            [['id', 'category_id', 'price'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 200],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['default', 'create', 'update']],
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
            'category_id' => 'Category ID',
            'price' => 'Price',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
