<?php

use yii\db\Migration;

/**
 * Class m230630_090515_update_user_profile
 */
class m230630_090515_update_user_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user_profile', 'email', $this->string());
        $this->addColumn('user_profile', 'gender', $this->string());
        $this->alterColumn('user_profile', 'firstName', $this->string());
        $this->alterColumn('user_profile', 'lastName', $this->string());
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
        echo "m230630_090515_update_user_profile cannot be reverted.\n";

        return false;
    }
    */
}
