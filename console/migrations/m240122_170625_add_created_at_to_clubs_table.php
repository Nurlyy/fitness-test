<?php

use yii\db\Migration;

/**
 * Class m240122_170625_add_created_at_to_clubs_table
 */
class m240122_170625_add_created_at_to_clubs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("clubs", "created_at", $this->integer(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("clubs", "created_at");
    }
}
