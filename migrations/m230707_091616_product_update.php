<?php

use yii\db\Migration;

/**
 * Class m230707_091616_product_update
 */
class m230707_091616_product_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'created_at', $this->integer());
        $this->addColumn('products', 'created_by', $this->string());
        $this->addColumn('products', 'updated_at', $this->integer());
        $this->addColumn('products', 'updated_by', $this->string());
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
        echo "m230707_091616_product_update cannot be reverted.\n";

        return false;
    }
    */
}
