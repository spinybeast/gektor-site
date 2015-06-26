<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "staticpages".
 *
 * @property integer $id
 * @property string $text
 * @property string $pagekey
 * @property string $title
 * @property boolean $enabled
 */
class StaticPage extends \yii\db\ActiveRecord
{
    const TEXT_LENGTH = 300;

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
