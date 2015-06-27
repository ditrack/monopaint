<?php

namespace app\modules\monopaint\model;

use app\modules\monopaint\components\helpers\Password;
use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "picture".
 *
 * @property integer $id
 * @property string $filePath
 * @property string $fileName
 * @property string $password
 */
class Picture extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filePath', 'fileName', 'password'], 'required'],
            [['filePath'], 'string', 'max' => 400],
            [['fileName'], 'string', 'max' => 150],
            [['password'], 'string', 'min' => 6, 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filePath' => 'File Path',
            'fileName' => 'File Name',
            'password' => 'Password',
        ];
    }

    /** @inheritdoc */
    public function beforeSave($insert)
    {
        if (!empty($this->password)) {
            $this->setAttribute('password', Password::hash($this->password));
        }

        return parent::beforeSave($insert);
    }

    /**
     * @return string public url to file
     */
    public function getPictureUrl()
    {
        return \Yii::getAlias('@web') . $this->filePath . DIRECTORY_SEPARATOR . $this->fileName;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Password::validate($password, $this->password_hash);
    }
}
