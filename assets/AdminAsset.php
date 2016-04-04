<?php
/**
 * Created by PhpStorm.
 * User: spiny
 * Date: 23.03.16
 * Time: 11:33
 */

namespace app\assets;


class AdminAsset extends AppAsset
{
    public $css = [

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        'wbraganca\dynamicform\DynamicFormAsset',
    ];
}