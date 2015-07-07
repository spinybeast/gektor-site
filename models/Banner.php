<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property integer $position_id
 * @property integer $page_id
 * @property string $image
 * @property integer $enabled
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            [['page_id'], 'checkPage'],
            [['position_id', 'page_id'], 'string'],
            [['image'], 'required'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'checkExtensionByMimeType' => false, 'on' => ['default', 'create', 'update']],
        ];
    }
    public function checkPage($attribute, $params)
    {
        if ($this->position_id != BannerPosition::LEFT)
        $this->addError($attribute, 'Страницу можно выбрать только для позиции "' . BannerPosition::$types[BannerPosition::LEFT] . '"');
    }
    public function behaviors()
    {
        return [
            'image' => [
                'class' => UploadImageBehavior::className(),
                'attribute' => 'image',
                'scenarios' => ['default', 'create', 'update'],
                'placeholder' => '@webroot/img/product/no-image.jpg',
                'path' => '@webroot/img/banners/{id}',
                'url' => '@web/img/banners/{id}',
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
            'position_id' => 'Положение',
            'page_id' => 'Страница',
            'image' => 'Картинка',
            'enabled' => 'Включен',
        ];
    }

    public function getPosition()
    {
        return BannerPosition::findByPk($this->position_id);
    }

    public function getPage()
    {
        return self::hasOne(StaticPage::className(), ['pagekey' => 'page_id']);
    }

    public static function getSliderItems()
    {
        return Banner::getItems(BannerPosition::SLIDER);
    }

    public static function getLeftItems($page)
    {
        return Banner::getItems(BannerPosition::LEFT, $page);
    }

    private static function getItems($position, $page = false)
    {
        $slider = [];
        if (!empty($page)) {
            $items = Banner::findAll(['position_id' => $position, 'enabled' => 1, 'page_id' => $page]);
        } else {
            $items = Banner::findAll(['position_id' => $position, 'enabled' => 1]);
        }
        foreach ($items as $item) {
            $slider[] = Html::img($item->getUploadUrl('image'));
        }
        return $slider;
    }
}
