<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clients}}`.
 */
class m240120_095814_create_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->text(),
            'sex' => $this->integer()->notNull(),
            'birth_date' => $this->date(),
            'available_clubs' => $this->text(),
            'created_at' => $this->integer(255),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(255),
            'updated_by' => $this->integer(),
            'deleted_at' => $this->integer(255),
            'deleted_by' => $this->integer(),

        ]);

        $this->addForeignKey('fk-clients-created_by-user-id', 'clients', 'created_by', 'user', 'id');
        $this->addForeignKey("fk-clients-updated_by-user-id", "clients", 'updated_by', 'user', 'id');
        $this->addForeignKey("fk-clients-deleted_by-user-id", "clients", "deleted_by", 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%clients}}');
    }
}
