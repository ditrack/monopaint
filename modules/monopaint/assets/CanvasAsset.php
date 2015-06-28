<?php

namespace app\modules\monopaint\assets;

use yii\web\AssetBundle;

class CanvasAsset extends AssetBundle
{
    /** @inheritdoc */
    public $css = [
        'css/plugins.css'
    ];

    /** @inheritdoc */
    public $js = [
        'js/draw.js',
        'js/modal.js',
    ];

    /** @inheritdoc */
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'app\modules\monopaint\assets\FancyBoxAsset',
    ];

    /** @inheritdoc */
    public function init()
    {
        $this->sourcePath = __DIR__ ;
        parent::init();
    }
} 