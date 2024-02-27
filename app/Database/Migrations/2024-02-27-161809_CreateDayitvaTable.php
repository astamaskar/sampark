<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDayitvaTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            // Add other fields as needed
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dayitva');
    }

    public function down()
    {
        $this->forge->dropTable('dayitva');
    }
}
