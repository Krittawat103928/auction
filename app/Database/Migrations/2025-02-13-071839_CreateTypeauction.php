<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypeauction extends Migration
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
            'type_code' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'type_name' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'type_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'type_status' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                // 'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);


        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('typeauction');
    }

    public function down()
    {
        $this->forge->dropTable('typeauction');
    }

}
