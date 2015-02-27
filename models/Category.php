<?php

namespace app\models;

use Yii;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $enabled
 * @property string $image
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'enabled'], 'integer'],
            [['name'], 'string', 'max' => 20],
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
                'path' => '@webroot/img/category/{id}',
                'url' => '@web/img/category/{id}',
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
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'enabled' => 'Enabled',
            'image' => 'Image'
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    public function getChildren()
    {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasMany(self::className(), ['id' => 'parent_id']);
    }

    public function breadCrumbs()
    {
        $breadcrumbs = [];
        $parentId = $this->parent_id;

        while ($parentId != 0) {
            $parent = self::findOne($parentId);

            if ($parent && $parent->enabled) {
                array_unshift($breadcrumbs, $parent);
                $parentId = $parent->parent_id;
            } else {
                $parentId = 0;
            }
        }
        return $breadcrumbs;
    }

    public function products()
    {
        $products = $this->products;
        foreach ($this->children as $child) {
            $products = array_merge($products, $child->products);
        }
        return $products;
    }
}
