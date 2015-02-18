<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $enabled
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
            [['name'], 'string', 'max' => 20]
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
}
