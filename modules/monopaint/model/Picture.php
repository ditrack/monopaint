<?php

namespace app\modules\monopaint\model;

use app\modules\monopaint\components\helpers\Password;
use app\modules\monopaint\ModuleTrait;
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
    use ModuleTrait;

    /** @var string $data is base64 image data */
    public $data;

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
            [['password'], 'required'],
            [['filePath'], 'string', 'max' => 400],
            [['fileName'], 'string', 'max' => 150],
            [['data'], 'string'],
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
        if (!empty($this->password) && $this->isNewRecord) {
            $this->setAttribute('password', Password::hash($this->password));
        }

        if (empty($this->filePath)) {
            $this->setAttribute('filePath', $this->getModule()->uploadPath);
        }

        if (empty($this->fileName)) {
            $this->setAttribute('fileName', $this->getRandomFileName());
        }

        if (!$this->writeFile()) {
            $this->addError('data', 'Can not write file');
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
        return Password::validate($password, $this->password);
    }

    /**
     * @return string random file name with default extensions
     */
    public function getRandomFileName()
    {
        $string = Yii::$app->security->generateRandomString($this->getModule()->fileNameLength);
        return $string . $this->getModule()->extension;
    }

    /**
     * Write file to '$uploadPath' folder
     * @return bool
     */
    protected function writeFile()
    {
        $data = $this->data;

        if (!$data) {
            return true;
        }

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $path = Yii::getAlias('@webroot') . $this->filePath . DIRECTORY_SEPARATOR . $this->fileName;

        file_put_contents($path, $data);

        if(file_exists($path)) {
            return true;
        }
        return false;
    }
}
