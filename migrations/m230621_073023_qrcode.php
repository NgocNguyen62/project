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
        ]);
        $this->addForeignKey(
            'fk-view-products',
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
        echo "m230621_073023_qrcode cannot be reverted.\n";

        return false;
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
