<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductContents extends Migration
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
            'product_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'content_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'content_value' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['product_code', 'content_key'], false, true);
        $this->forge->createTable('tbl_product_contents', true);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_product_contents', true);
    }
}