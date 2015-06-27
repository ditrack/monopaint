<?php

namespace app\modules\monopaint;

use Yii;
use yii\base\Module as Base;

class Module extends Base
{
    public $controllerNamespace = 'app\modules\monopaint\controllers';

    /** @var string path to directory in `web` folder where files will be uploads */
    public $uploadPath = '/upload/';

    /** @var int Cost parameter used by the Blowfish hash algorithm. */
    public $cost = 10;

    /** @var int number of pictures per page */
    public $pageSize = 4;

    public function init()
    {
        parent::init();

        if (!$this->uploadPath) {
            throw new \Exception('Setup uploadPath module property');
        }
    }

    public function getUploadPath()
    {
        return Yii::getAlias($this->uploadPath);
    }
}
