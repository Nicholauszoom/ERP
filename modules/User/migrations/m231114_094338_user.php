<?php

use yii\db\Migration;

/**
 * Class m231114_094844_user
 */
class m231114_094844_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231114_094844_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
  

    public function down()
    {
        echo "m231114_094844_user cannot be reverted.\n";

        return false;
    }
    */

    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'created_at' => $this->string()->notNull(),
            'access_token' => $this->string()->notNull(),
        ]);
    }


}
