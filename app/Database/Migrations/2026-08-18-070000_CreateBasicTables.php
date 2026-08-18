<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBasicTables extends Migration
{
    public function up()
    {
        // tbl_bbs_config
        $this->forge->addField([
            'tbc_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'board_name'   => ['type' => 'VARCHAR', 'constraint' => 50],
            'board_code'   => ['type' => 'VARCHAR', 'constraint' => 30],
            'is_category'  => ['type' => 'VARCHAR', 'constraint' => 1],
            'is_secure'    => ['type' => 'VARCHAR', 'constraint' => 1],
            'is_right'     => ['type' => 'VARCHAR', 'constraint' => 1],
            'is_reply'     => ['type' => 'VARCHAR', 'constraint' => 1],
            'is_comment'   => ['type' => 'VARCHAR', 'constraint' => 1],
            'is_recomm'    => ['type' => 'VARCHAR', 'constraint' => 1],
            'is_notice'    => ['type' => 'VARCHAR', 'constraint' => 1],
            'skin'         => ['type' => 'VARCHAR', 'constraint' => 50],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('tbc_idx', true);
        $this->forge->createTable('tbl_bbs_config', true);

        // tbl_banner_mst
        $this->forge->addField([
            'bm_idx'       => ['type' => 'INT', 'auto_increment' => true],
            'code'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'alt'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'link'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'bfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'rfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'onum'         => ['type' => 'INT', 'default' => 0],
            'yn'           => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'Y'],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('bm_idx', true);
        $this->forge->createTable('tbl_banner_mst', true);

        // tbl_bbs
        $this->forge->addField([
            'bbs_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'code'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'm_idx'        => ['type' => 'INT', 'default' => 0],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'writer'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'password'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'reply_count'  => ['type' => 'INT', 'default' => 0],
            'hit_count'    => ['type' => 'INT', 'default' => 0],
            'bfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'rfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'ip_address'   => ['type' => 'VARCHAR', 'constraint' => 15],
            'r_date'       => ['type' => 'DATETIME'],
            'u_date'       => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('bbs_idx', true);
        $this->forge->createTable('tbl_bbs', true);

        // tbl_inquiry
        $this->forge->addField([
            'inq_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 50],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 1],
            'r_date'       => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('inq_idx', true);
        $this->forge->createTable('tbl_inquiry', true);

        // tbl_product
        $this->forge->addField([
            'p_idx'        => ['type' => 'INT', 'auto_increment' => true],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'pfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'rfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'r_date'       => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('p_idx', true);
        $this->forge->createTable('tbl_product', true);

        // tbl_popup
        $this->forge->addField([
            'pop_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'pfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'rfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'start_date'   => ['type' => 'DATE'],
            'end_date'     => ['type' => 'DATE'],
            'yn'           => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'Y'],
            'r_date'       => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('pop_idx', true);
        $this->forge->createTable('tbl_popup', true);

        // tbl_history
        $this->forge->addField([
            'h_idx'        => ['type' => 'INT', 'auto_increment' => true],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'hfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'rfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'r_date'       => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('h_idx', true);
        $this->forge->createTable('tbl_history', true);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_history', true);
        $this->forge->dropTable('tbl_popup', true);
        $this->forge->dropTable('tbl_product', true);
        $this->forge->dropTable('tbl_inquiry', true);
        $this->forge->dropTable('tbl_bbs', true);
        $this->forge->dropTable('tbl_banner_mst', true);
        $this->forge->dropTable('tbl_bbs_config', true);
    }
}
