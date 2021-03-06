<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use mongosoft\file\UploadImageBehavior;

/**
 * This is the model class for table "staticpages".
 *
 * @property integer $id
 * @property string $text
 * @property string $pagekey
 * @property string $title
 * @property boolean $enabled
 * @property string $background
 */
class StaticPage extends \yii\db\ActiveRecord
{
    const TEXT_LENGTH = 300;
    const MAIN_PAGEKEY = 'index';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staticpages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'enabled'], 'integer'],
            [['text'], 'string'],
            [['pagekey'], 'string', 'max' => 200],
            [['title'], 'string', 'max' => 250],
            ['background', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'checkExtensionByMimeType' => false, 'on' => ['default', 'create', 'update']],
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => UploadImageBehavior::className(),
                'attribute' => 'background',
                'scenarios' => ['default', 'create', 'update'],
                'path' => '@webroot/img/pages/{id}',
                'url' => '@web/img/pages/{id}',
                'thumbs' => [],
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
            'text' => 'Текст',
            'pagekey' => 'Url',
            'title' => 'Заголовок',
            'enabled' => 'Включена',
            'background' => 'Фон',
        ];
    }

    public function getShortText()
    {
        if (strlen($this->text) > self::TEXT_LENGTH) {
            return iconv_substr(strip_tags($this->text), 0, self::TEXT_LENGTH, 'utf-8') . '...';
        }
        return strip_tags($this->text);
    }

    public function beforeSave($insert)
    {
        $this->text = Html::encode($this->text);
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->text = Html::decode($this->text);
        return parent::afterFind();
    }

    public static function getAliases()
    {
        $all = self::find()->all();
        $map = ArrayHelper::map($all, 'id', 'pagekey');
        return implode('|', $map);
    }
}
