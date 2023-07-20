<?php

use yii\db\Migration;

/**
 * Class m230706_063321_views_update
 */
class m230706_063321_views_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->dropTable('views');
        $this->createTable('view', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'count' => $this->integer()->defaultValue(0),
            'time' => $this->integer()
        ], 'ENGINE=InnoDB');
        $this->addForeignKey(
            'fk-view-products',
            '{{%view}}',
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
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230706_063321_views_update cannot be reverted.\n";

        return false;
    }
    */
}
