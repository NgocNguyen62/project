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
            'user_id' => $this->integer(),
            'product_id'=>$this->integer()->notNull(),
            'count' => $this->integer()->defaultValue(0),
            'time' => $this->dateTime()
        ], 'ENGINE=InnoDB');
        $this->addPrimaryKey('pk_views', 'views', ['user_id', 'product_id']);
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
