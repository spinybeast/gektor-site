<?php

namespace app\models;

use Yii;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $created_at
 * @property boolean $enabled
 * @property string $image
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['enabled'], 'integer'],
            [['title'], 'string', 'max' => 250],
            ['image', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'checkExtensionByMimeType' => false, 'on' => ['default', 'create', 'update']],
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
                'path' => '@webroot/img/news/{id}',
                'url' => '@web/img/news/{id}',
                'thumbs' => [
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
            'title' => 'Название',
            'text' => 'Текст',
            'created_at' => 'Дата',
            'enabled' => 'Включена',
            'image' => 'Изображение',
        ];
    }

}
