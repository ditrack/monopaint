<?php

namespace app\modules\monopaint\model;

use Yii;
use yii\base\Model;

class AccessForm extends Model
{
    public $id;
    public $password;

    private $_picture = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'password'], 'required'],
            [['id'], 'integer'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $picture = $this->getPicture();
            if (!$picture || !$picture->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Finds picture by [[id]]
     * @return Picture|null
     */
    public function getPicture()
    {
        if ($this->_picture === false) {
            $this->_picture = Picture::find()
                ->where(['id' => $this->id])
                ->one();
        }
        return $this->_picture;
    }
} 