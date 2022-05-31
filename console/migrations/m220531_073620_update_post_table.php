<?php

use yii\db\Migration;

/**
 * Class m220531_073620_update_post_table
 */
class m220531_073620_update_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'code', $this->string());
        $this->addColumn('post', 'category_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220531_073620_update_post_table cannot be reverted.\n";

        return false;
    }
}
