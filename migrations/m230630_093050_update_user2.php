<?php

use yii\db\Migration;

/**
 * Class m230630_093050_update_user2
 */
class m230630_093050_update_user2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'created_at', $this->integer());
        $this->alterColumn('user', 'updated_at', $this->integer());

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
        echo "m230630_093050_update_user2 cannot be reverted.\n";

        return false;
    }
    */
}
