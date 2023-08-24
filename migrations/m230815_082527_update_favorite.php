<?php

use yii\db\Migration;

/**
 * Class m230815_082527_update_favorite
 */
class m230815_082527_update_favorite extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('favorite');
        $this->createTable('favorite', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB');

        $this->addForeignKey('fk_favorite_user', 'favorite', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_favorite_product', 'favorite', 'product_id', 'products', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('favorite');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230815_082527_update_favorite cannot be reverted.\n";

        return false;
    }
    */
}
