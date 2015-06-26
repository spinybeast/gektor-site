<?php

namespace app\components;

use app\models\Category;
use app\models\MainMenu;
use yii\helpers\Url;

class MenuHelper
{
    public static function getMainMenu($parent_id = null)
    {
        return self::getMainMenuRecursive($parent_id);
    }

    public static function getMenu($parent_id = 0)
    {
        return static::getMenuRecursive($parent_id);
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

    private static function getUrl($item)
    {
        if (!empty($item->category_id)) {
            $url = Url::to(['catalog/view', 'id' => $item->category_id]);
        } elseif (!empty($item->staticpage_id)) {
            $pagekey = $item->staticPage->pagekey == 'index' ? '' : $item->staticPage->pagekey ;
            $url = Url::to('/' . $pagekey);
        } elseif (!empty($item->url)) {
            $url = Url::to($item->url);
        } else {
            $url = false;
        }
        return $url;
    }

    private static function getMainMenuRecursive($parent_id)
    {
        $items = MainMenu::find()
            ->where(['enabled' => 1, 'parent_id' => $parent_id])
            ->with('children')
            ->all();

        $result = [];

        foreach ($items as $item) {
            $menuItem = [
                'label' => $item->name,
                'url' => self::getUrl($item),
            ];
            if (!empty($item->children)) {
                $menuItem['items'] = static::getMainMenuRecursive($item->id);
            }
            array_push($result, $menuItem);
        }

        return $result;
    }
} 