<?php

use yii\db\Migration;

/**
 * Class m230721_074643_cate_rate_update
 */
class m230721_074643_cate_rate_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('categories', 'name', $this->string()->unique()->notNull());
        $this->alterColumn('rate', 'time', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m230721_074643_cate_rate_update cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230721_074643_cate_rate_update cannot be reverted.\n";

        return false;
    }
    */
}
