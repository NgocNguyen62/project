<?php

use yii\db\Migration;

/**
 * Class m230619_073710_products
 */
class m230619_073710_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'description' => $this->string(),
            'status' => $this->smallInteger()->notNull(),
            'avatar' => $this->string()->notNull(),
            'image_360' => $this ->string()->notNull(),
        ], 'ENGINE=InnoDB');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropForeignKey('fk-products-category', '{{%categories}}');
        //$this->dropForeignKey('fk-rate-products', 'rate');
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230619_073710_products cannot be reverted.\n";

        return false;
    }
    */
}
