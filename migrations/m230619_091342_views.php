<?php

use yii\db\Migration;

/**
 * Class m230619_091342_views
 */
class m230619_091342_views extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%views}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'count' => $this->integer()->defaultValue(0)
        ]);
        $this->addForeignKey(
            'fk-view-products',
            '{{%views}}',
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
        $this->dropForeignKey('fk-view-products', '{{%views}}');
        $this->dropTable('views');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230619_091342_views cannot be reverted.\n";

        return false;
    }
    */
}
