<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'mohalla_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'house_no' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'colony' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'area' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pin' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
            ],
            // Add other fields as needed
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('mohalla_id', 'mohalla', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('contacts');
    }

    public function down()
    {
        $this->forge->dropTable('contacts');
    }
}
