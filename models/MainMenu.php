<?php

namespace app\models;

use Yii;
use PetraBarus\Yii2\Validators\EitherValidator;
use yii\helpers\Html;


/**
 * This is the model class for table "main_menu".
 *
 * @property integer $id
 * @property integer $staticpage_id
 * @property integer $category_id
 * @property integer $parent_id
 * @property integer $enabled
 * @property string $name
 * @property string $url
 * @property integer $without_url
 */
class MainMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staticpage_id', 'category_id', 'enabled', 'parent_id', 'without_url'], 'integer'],
            [['name', 'url'], 'string'],
            [['name'], 'required'],
            ['enabled', 'default', 'value' => 1],
            [['without_url'], EitherValidator::className(), 'otherAttributes' => ['staticpage_id', 'url', 'category_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'staticpage_id' => 'Страница',
            'category_id' => 'Категория',
            'parent_id' => 'Родительский пункт меню',
            'url' => 'Ссылка',
            'enabled' => 'Включен',
            'without_url' => 'Без ссылки',
        ];
    }

    public function beforeSave($insert)
    {
        $this->name = Html::encode($this->name);
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->name = Html::decode($this->name);
        return parent::afterFind();
    }

    public function getChildren()
    {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public function getStaticPage()
    {
        return $this->hasOne(StaticPage::className(), ['id' => 'staticpage_id']);
    }
}
