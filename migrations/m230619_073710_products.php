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
            'status' => $this->string(255)->notNull(),
            'avatar' => $this->string()->notNull(),
            'image_360' => $this ->string()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-products-category',
            '{{%products}}',
            'category_id',
            '{{%categories}}',
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
        $this->dropForeignKey('fk-products-category', '{{%products}}');
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
