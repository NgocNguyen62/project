<?php

use yii\db\Migration;

/**
 * Class m230626_084134_user_add_role
 */
class m230626_084134_user_add_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'role', $this->integer());
        $this->db->createCommand('UPDATE user u
            JOIN user_profile p ON u.id = p.user_id
            SET u.role = p.role')
            ->execute();
        $this->dropColumn('user_profile', 'role');
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
        echo "m230626_084134_user_add_role cannot be reverted.\n";

        return false;
    }
    */
}
