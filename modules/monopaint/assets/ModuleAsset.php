<?php

namespace app\modules\monopaint\assets;

use yii\web\AssetBundle;

class ModuleAsset extends AssetBundle
{
    public $css = [
        'css/plugins.css'
    ];

    public $js = [
        'js/fancy-box.js',
        'js/ajax-modal.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
        'app\modules\monopaint\assets\FancyBoxAsset',
        'app\modules\monopaint\assets\FontAwesomeAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ ;
        parent::init();
    }
}
