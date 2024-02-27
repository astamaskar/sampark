<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKaryakartaTable extends Migration
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
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'dayitva_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ]
        ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('basti_id', 'basti', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('karyakarta');
    }



    public function down()
    {
        $this->forge->dropTable('karyakarta');
    }
}
