<?php

namespace app\modules\monopaint;

use Yii;
use yii\base\Module as Base;

class Module extends Base
{
    /** @inheritdoc */
    public $controllerNamespace = 'app\modules\monopaint\controllers';

    /** @var string path to directory in `web` folder where files will be uploads */
    public $uploadPath = '/upload';

    /** @var int Cost parameter used by the Blowfish hash algorithm. */
    public $cost = 10;

    /** @var int number of pictures per page */
    public $pageSize = 8;

    /** @var int length of generate file name */
    public $fileNameLength = 6;

    /** @var string default file extension */
    public $extension = '.png';

    /** @inheritdoc */
    public function init()
    {
        parent::init();

        if (!$this->uploadPath) {
            throw new \Exception('Setup uploadPath module property');
        }
    }
}
