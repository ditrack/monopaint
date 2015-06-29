<?php

namespace app\commands;

use app\modules\monopaint\model\Picture;
use yii\console\Controller;
use Yii;


class PictureController extends Controller
{

    public function actionInit()
    {
        $path = Yii::getAlias('@webroot') . DIRECTORY_SEPARATOR . 'demo' . DIRECTORY_SEPARATOR;

        $picturesData = [
            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '1.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '1.jpg')),
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '2.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '2.jpg')),
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '3.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '3.jpg')),
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '4.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '4.jpg')),
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '5.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '5.jpg')),
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '6.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '6.jpg')),
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '7.jpg',
                'password' => '123123',
                'data'     => 'data:image/jpg;base64,' . base64_encode(file_get_contents($path . '7.jpg')),
            ],
        ];
        foreach ($picturesData as $data) {
            $picture = new Picture();
            $picture->load($data, '');
            $picture->save();
        }

        echo ' OK' . PHP_EOL;
    }
}
