<?php

use yii\db\Migration;

/**
 * Class m230706_101449_rate_update
 */
class m230706_101449_rate_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('rate');
        $this->createTable('rate', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'product_id'=>$this->integer(),
            'rate' => $this->smallInteger()->notNull(),
            'time' => $this->dateTime()
        ], 'ENGINE=InnoDB');
        $this->addForeignKey(
            'fk-rate-products',
            '{{%rate}}',
            'product_id',
            '{{%products}}',
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
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230706_101449_rate_update cannot be reverted.\n";

        return false;
    }
    */
}
