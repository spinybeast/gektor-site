<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/styles.css',
    ];
    public $js = [
        'js/site.js'
    ];
    public $depends = [
        '\yii\bootstrap\BootstrapAsset',
        '\yii\web\YiiAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        '\sersid\owlcarousel\Asset'
    ];
}
