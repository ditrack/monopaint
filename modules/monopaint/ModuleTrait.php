<?php

namespace app\modules\monopaint;

use yii\base\Exception;

trait ModuleTrait
{
    /**
     * @var null|Module
     */
    private $_module;

    /**
     * @return null|Module
     * @throws \yii\base\Exception
     */
    protected function getModule()
    {
        if ($this->_module == null) {
            $this->_module = \Yii::$app->getModule('monopaint');
        }
        if(!$this->_module){
            throw new Exception("\n\n\n\n\nMonopaint module not found, may be you didn't add it to your config?\n\n\n\n");
        }
        return $this->_module;
    }
} 