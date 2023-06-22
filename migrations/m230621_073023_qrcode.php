<?php

use yii\db\Migration;

/**
 * Class m230621_073023_qrcode
 */
class m230621_073023_qrcode extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%qrcode}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'qr' => $this->string()->notNull()
        ], 'ENGINE=InnoDB');
        $this->addForeignKey(
            'fk-qrcode-products',
            '{{%qrcode}}',
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
        $this->dropForeignKey('fk-qrcode-products', '{{%qrcode}}');
        $this->dropTable('qrcode');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230621_073023_qrcode cannot be reverted.\n";

        return false;
    }
    */
}
