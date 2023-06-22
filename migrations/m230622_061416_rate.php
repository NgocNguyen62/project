<?php

use yii\db\Migration;

/**
 * Class m230622_061416_rate
 */
class m230622_061416_rate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rate}}', [
            'user_id' => $this->integer(),
            'product_id'=>$this->integer(),
            'rate' => $this->smallInteger()->notNull(),
            'time' => $this->dateTime()
        ], 'ENGINE=InnoDB');
        $this->addPrimaryKey('pk_rate', 'rate', ['user_id', 'product_id']);
        $this->addForeignKey(
            'fk-rate-products',
            '{{%rate}}',
            'product_id',
            '{{%products}}',
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
        $this->dropForeignKey('fk-rate-products', 'rate');
        $this->dropTable('{{%rate}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230622_061416_rate cannot be reverted.\n";

        return false;
    }
    */
}
