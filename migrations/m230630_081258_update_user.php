<?php

use yii\db\Migration;

/**
 * Class m230630_081258_update_user
 */
class m230630_081258_update_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'created_at', $this->timestamp());
        $this->addColumn('user', 'updated_at', $this->timestamp());
        $this->addColumn('user', 'created_by', $this->string());
        $this->addColumn('user', 'updated_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'created_at');
        $this->dropColumn('user', 'updated_at');
        $this->dropColumn('user', 'created_by');
        $this->dropColumn('user', 'updated_by');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230630_081258_update_user cannot be reverted.\n";

        return false;
    }
    */
}
