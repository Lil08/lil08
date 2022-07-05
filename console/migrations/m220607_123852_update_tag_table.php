<?php

use yii\db\Migration;

/**
 * Class m220607_123852_update_tag_table
 */
class m220607_123852_update_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tag', 'code', $this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220607_123852_update_tag_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220607_123852_update_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
