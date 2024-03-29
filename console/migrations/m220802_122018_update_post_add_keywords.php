<?php

use yii\db\Migration;

/**
 * Class m220802_122018_update_post_add_keywords
 */
class m220802_122018_update_post_add_keywords extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'keywords', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220802_122018_update_post_add_keywords cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220802_122018_update_post_add_keywords cannot be reverted.\n";

        return false;
    }
    */
}
