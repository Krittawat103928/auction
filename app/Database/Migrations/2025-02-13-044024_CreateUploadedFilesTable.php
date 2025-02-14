<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUploadedFilesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'auction_FK_id' => [
                'type' => 'INT',
                'constraint' => 5,

            ],
            'file_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'file_size' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'file_path' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true, // updated_at can be null initially
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,  // updated_by can be null initially
            ],
            'order' => [
                'type' => 'INT',  // Change to INT for numeric sorting
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive', 'archived'],
                'default' => 'active',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('uploaded_files');
    }

    public function down()
    {
        $this->forge->dropTable('uploaded_files');
    }
}
