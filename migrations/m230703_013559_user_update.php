<?php

use yii\db\Migration;

/**
 * Class m230703_013559_user_update
 */
class m230703_013559_user_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'lock', $this->boolean());
        $this->alterColumn('user', 'role', $this->string());
        $this->update('user', ['role' => 'admin'], ['role' => '1']);
        $this->update('user', ['role' => 'user'], ['role' => '0']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'lock');
        $this->alterColumn('user', 'role', $this->integer());
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230703_013559_user_update cannot be reverted.\n";

        return false;
    }
    */
}
