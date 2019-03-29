<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m190204_125444_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('students', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(64),
            'surname' =>$this->string(64),
            'group' =>$this->string(16),
            'sex' =>$this->boolean(),
            'college_id' => $this->integer(),
        ]);

        $this->createTable('college', [
            'id' => $this->primaryKey(),
            'name_long' =>$this->string(256),
            'name_short' =>$this->string(32),
            'date_start' => $this->dateTime(),
        ]);

      $this->addForeignKey(
            'fk-college_id-id',
            'students',
            'college_id',
            'college',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('students');
       $this->dropTable('college');
    }
}
