<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 27.06.15
 * Time: 19:34
 */

namespace app\modules\monopaint\assets;

use yii\web\AssetBundle;

class FancyBoxAsset extends AssetBundle
{
    public $sourcePath = '@bower/fancybox/source';

    public $js = [
        'jquery.fancybox.pack.js',
        'jquery.fancybox.js',
        'helpers/jquery.fancybox-buttons.js',
    ];
    public $css = [
        'jquery.fancybox.css',
        'helpers/jquery.fancybox-buttons.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
} 