<?php

namespace app\commands;

use app\modules\monopaint\model\Picture;
use app\modules\monopaint\Module;
use yii\console\Controller;


class PictureController extends Controller
{

    public function actionInit()
    {
        $picturesData = [
            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '1.jpg',
                'password' => '123123',
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '2.jpg',
                'password' => '123123',
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '3.jpg',
                'password' => '123123',
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '4.jpg',
                'password' => '123123',
            ],

            [
                'filePath' => \Yii::$app->getModule('monopaint')->uploadPath,
                'fileName' => '5.jpg',
                'password' => '123123',
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
