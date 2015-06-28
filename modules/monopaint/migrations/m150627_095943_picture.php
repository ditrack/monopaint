<?php

use yii\db\Schema;
use yii\db\Migration;

class m150627_095943_picture extends Migration
{
    protected $table = '{{picture}}';

    /** @inheritdoc */
    public function up()
    {
        $this->createTable($this->table, [
            'id' => 'pk',
            'filePath' => Schema::TYPE_STRING . '(400) NOT NULL',
            'fileName' => Schema::TYPE_STRING . '(150) NOT NULL',
            'password' => Schema::TYPE_STRING . '(60) NOT NULL',
        ]);
    }

    /** @inheritdoc */
    public function down()
    {
        $this->dropTable($this->table);
    }

}
