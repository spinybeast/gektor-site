<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner_positions".
 *
 * @property integer $id
 * @property string $name
 */
class BannerPosition
{
    public $id;
    public $name;

    const CATALOG = 'catalog';
    const SLIDER = 'slider';
    const LEFT = 'left';

    public static $types = array(
        self::CATALOG => 'Категория',
        self::SLIDER => 'Слайдер на главной',
        self::LEFT => 'Слева',
    );

    public static function findAll()
    {
        $data = array();
        foreach(self::$types as $key => $position) {
            $data[] = self::findByPk($key);
        }
        return $data;
    }

    public static function findByPk($key)
    {
        $model = new BannerPosition();
        $model->id = $key;
        $model->name = self::$types[$key];

        return $model;
    }

}
