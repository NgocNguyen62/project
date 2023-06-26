<?php

use yii\db\Migration;

/**
 * Class m230626_091150_username_unique
 */
class m230626_091150_username_unique extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'username', $this->string(100)->unique()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230626_091150_username_unique cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230626_091150_username_unique cannot be reverted.\n";

        return false;
    }
    */
}
