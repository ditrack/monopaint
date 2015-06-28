<?php
/**
 * Created by PhpStorm.
 * User: yury
 * Date: 27.06.15
 * Time: 20:14
 */

namespace app\modules\monopaint\assets;

use \yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    /** @inheritdoc */
    public $sourcePath = '@bower/font-awesome';

    /** @inheritdoc */
    public $css = [
        'css/font-awesome.min.css',
    ];

    /** @inheritdoc */
    public function init()
    {
        parent::init();
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
} 