<?php

use yii\db\Migration;

/**
 * Class m230622_063228_user
 */
class m230622_063228_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
 
        ], 'ENGINE=InnoDB');
        $this->addForeignKey(
            'fk-view-user',
            '{{%views}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-rate-user',
            '{{%rate}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-view-user', '{{%views}}');
        $this->dropForeignKey('fk-rate-user', '{{%rate}}');
        $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230622_063228_user cannot be reverted.\n";

        return false;
    }
    */
}
