<?php

use yii\db\Migration;

/**
 * Class m230722_183016_description_length
 */
class m230722_183016_description_length extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('products', 'description', $this->string(5000));
        $this->alterColumn('categories', 'description', $this->string(5000));

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
        echo "m230722_183016_description_length cannot be reverted.\n";

        return false;
    }
    */
}
