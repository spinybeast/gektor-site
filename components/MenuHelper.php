<?php

namespace app\components;

use app\models\Category;
use yii\helpers\Url;

class MenuHelper
{
    public static function getMenu($parent_id = 0)
    {
        $result = static::getMenuRecursive($parent_id);
        return $result;
    }

    private static function getMenuRecursive($parent_id)
    {
        $items = Category::find()
            ->where(['enabled' => 1, 'parent_id' => $parent_id])
            ->with('children')
            ->all();

        $result = [];

        foreach ($items as $item) {
            $menuItem = [
                'label' => $item->name,
                'url' => Url::to(['catalog/view', 'id' => $item->id]),
            ];
            if (!empty($item->children)) {
                $menuItem['items'] = static::getMenuRecursive($item->id);
            }
            array_push($result, $menuItem);
        }
        return $result;
    }
} 