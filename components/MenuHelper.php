<?php

namespace app\components;

use app\models\Category;
use app\models\MainMenu;
use app\models\StaticPage;
use yii\helpers\Url;
use Yii;

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
            $result[] = $menuItem;
        }
        return $result;
    }

    private static function getUrl($item)
    {
        if (!empty($item->category_id)) {
            $url = Url::to(['catalog/view', 'id' => $item->category_id]);
        } elseif (!empty($item->staticPage)) {
            $pageKey = $item->staticPage->pagekey === StaticPage::MAIN_PAGEKEY ? '' : $item->staticPage->pagekey ;
            $url = Url::to('/' . $pageKey);
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
            $url = self::getUrl($item);
            $active = false;
            if (Url::current() === $url){
                $active = true;
            } elseif (!empty($item->children)) {
                foreach ($item->children as $child) {
                    if (Url::current() === self::getUrl($child)) {
                        $active = true;
                        break;
                    }
                }
            }
            $menuItem = [
                'label' => $item->name,
                'url' => $url,
                'active' => $active,
            ];
            if (!empty($item->children)) {
                $menuItem['items'] = static::getMainMenuRecursive($item->id);
            }
            $result[] = $menuItem;
        }

        return $result;
    }
} 