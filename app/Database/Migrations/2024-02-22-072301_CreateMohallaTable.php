<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMohallaTable extends Migration
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
            'basti_id' => [
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
        $this->forge->addForeignKey('basti_id', 'basti', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mohalla');
    }

    public function down()
    {
        $this->forge->dropTable('mohalla');
    }
}
