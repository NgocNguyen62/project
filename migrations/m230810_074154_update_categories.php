<?php

use yii\db\Migration;

/**
 * Class m230810_074154_update_categories
 */
class m230810_074154_update_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'created_at', $this->integer());
        $this->addColumn('categories', 'created_by', $this->string());
        $this->addColumn('categories', 'updated_at', $this->integer());
        $this->addColumn('categories', 'updated_by', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'created_at');
        $this->dropColumn('categories', 'created_by');
        $this->dropColumn('categories', 'updated_at');
        $this->dropColumn('categories', 'updated_by');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230810_074154_update_categories cannot be reverted.\n";

        return false;
    }
    */
}
