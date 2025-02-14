<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuctionTable extends Migration
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
            'auction_code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'auction_name' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'auction_price' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'auction_content' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'auction_type' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'auction_date' => [
                'type' => 'DATETIME',
                'null' => true,
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
        $this->forge->createTable('auctions');
    }

    public function down()
    {
        $this->forge->dropTable('auctions');
    }
}
