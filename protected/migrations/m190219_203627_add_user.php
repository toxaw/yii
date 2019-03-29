<?php

use yii\db\Migration;

/**
 * Class m190219_203627_add_user
 */
class m190219_203627_add_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255),
            'password_hash' => $this->string(255),
            'auth_key' => $this->string(255),
            'email' => $this->string(100),
            'firstname' => $this->string(255),
            'lastname' => $this->string(255),
            'middlename' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190219_203627_add_user cannot be reverted.\n";

        return false;
    }
    */
}
