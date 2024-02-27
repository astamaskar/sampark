<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBastiTable extends Migration
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
            'nagar_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            // Add other fields as needed
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('nagar_id', 'nagar', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('basti');
    }

    public function down()
    {
        $this->forge->dropTable('basti');
    }
}
