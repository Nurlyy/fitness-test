<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clubs}}`.
 */
class m240120_094147_create_clubs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clubs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(255),
            'updated_by' => $this->integer(),
            'deleted_at' => $this->integer(255),
            'deleted_by' => $this->integer(),
        ]);

        $this->addForeignKey('fk-created_by-user-id', 'clubs', 'created_by', 'user', 'id');
        $this->addForeignKey('fk-updated_by-user-id', 'clubs', 'updated_by', 'user', 'id');
        $this->addForeignKey('fk-deleted_by-user-id', 'clubs', 'deleted_by', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clubs}}');
    }
}
