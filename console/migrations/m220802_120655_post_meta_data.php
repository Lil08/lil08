<?php

use yii\db\Migration;

/**
 * Class m220802_120655_post_meta_data
 */
class m220802_120655_post_meta_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'meta_title', $this->string());
        $this->addColumn('post', 'meta_description', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220802_120655_post_meta_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220802_120655_post_meta_data cannot be reverted.\n";

        return false;
    }
    */
}
