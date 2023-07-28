<?php

use yii\db\Migration;

/**
 * Class m230727_080116_add_avatar
 */
class m230727_080116_add_avatar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'avatar', $this->string());
        $this->addColumn('user_profile', 'avatar', $this->string());
        $this->addColumn('view', 'lastSeen', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'avatar');
        $this->dropColumn('user_profile', 'avatar');
        $this->dropColumn('view', 'lastSeen');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230727_080116_add_avatar cannot be reverted.\n";

        return false;
    }
    */
}
