<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatefileTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'filename' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'file_path' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'order' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                   'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);


        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('files');
    }

    public function down()
    {
        $this->forge->dropTable('createfile');
    }
}
