<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_properties".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $property_id
 * @property string $value
 */
class ProductProperties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_properties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'property_id'], 'integer'],
            [['value'], 'string'],
            [['product_id', 'property_id', 'value'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'property_id' => 'Property ID',
            'value' => 'Value',
        ];
    }

    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }

    public function getName()
    {
        return !empty($this->property) ? $this->property->name : '';
    }
}
