<?php

use yii\db\Migration;

/**
 * Class m230619_074547_categories
 */
class m230619_074547_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string()->notNull(), 
            'description' => $this->string(),
        ], 'ENGINE=InnoDB');
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
        $this->dropTable('categories');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230619_074547_categories cannot be reverted.\n";

        return false;
    }
    */
}
