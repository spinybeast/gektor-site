<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property integer $position_id
 * @property integer $page_id
 * @property string $image
 * @property integer $enabled
 * @property string $template
 */
class Banner extends ActiveRecord
{
    const IMAGE_TEMPLATE = '{image}';

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
            [['position_id', 'page_id', 'template'], 'string'],
            [['image'], 'required'],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'checkExtensionByMimeType' => false, 'on' => ['default', 'create', 'update']],
        ];
    }

    public function checkPage($attribute)
    {
        if ($this->position_id !== BannerPosition::LEFT) {
            $this->addError($attribute, 'Страницу можно выбрать только для позиции "' . BannerPosition::$types[BannerPosition::LEFT] . '"');
        }
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
            'template' => 'Шаблон',
        ];
    }

    public function getHtml()
    {
        if ($this->template) {
            return str_replace(self::IMAGE_TEMPLATE, $this->getImg(), $this->template);
        }

        return $this->getImg();
    }

    private function getImg()
    {
        return Html::img($this->getUploadUrl('image'));
    }

    public function getPosition()
    {
        return BannerPosition::findByPk($this->position_id);
    }

    public function getPage()
    {
        return $this->hasOne(StaticPage::className(), ['pagekey' => 'page_id']);
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
        if ($page) {
            $items = Banner::findAll(['position_id' => $position, 'enabled' => 1, 'page_id' => $page]);
        } else {
            $items = Banner::findAll(['position_id' => $position, 'enabled' => 1]);
        }
        foreach ($items as $item) {
            $slider[] = $item->html;
        }
        return $slider;
    }
}
