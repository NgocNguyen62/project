<?php

use yii\db\Migration;

/**
 * Class m230622_071924_user_profile
 */
class m230622_071924_user_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $this->createTable('{{%user_profile}}', [
            'user_id' => $this->integer(),
            'firstName'=>$this->string()->notNull(),
            'lastName' => $this->string()->notNull(),
            'phoneNum' => $this->string(),
            'role' => $this->smallInteger()->defaultValue(0),
        ], 'ENGINE=InnoDB');
        $this->addPrimaryKey('pk_user', 'user_profile', 'user_id');
        $this->addForeignKey(
            'fk-profile-user',
            '{{%user_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-profile-user', 'user_profile');
        $this->dropTable('{{%user_profile}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230622_071924_user_profile cannot be reverted.\n";

        return false;
    }
    */
}
