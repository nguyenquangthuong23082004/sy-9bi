<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllApplicationTables extends Migration
{
    public function up()
    {
        // tbl_bbs_config
        $this->forge->addField([
            'tbc_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'board_name'   => ['type' => 'VARCHAR', 'constraint' => 50],
            'board_code'   => ['type' => 'VARCHAR', 'constraint' => 30],
            'is_category'  => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'is_secure'    => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'is_right'     => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'is_reply'     => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'is_comment'   => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'is_recomm'    => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'is_notice'    => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'skin'         => ['type' => 'VARCHAR', 'constraint' => 50],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('tbc_idx', true);
        $this->forge->createTable('tbl_bbs_config', true);

        // tbl_bbs_list
        $this->forge->addField([
            'bbs_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'code'         => ['type' => 'VARCHAR', 'constraint' => 30],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'b_category'   => ['type' => 'VARCHAR', 'constraint' => 50],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'sub_title'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'writer'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'user_id'      => ['type' => 'VARCHAR', 'constraint' => 50],
            'm_idx'        => ['type' => 'INT', 'default' => 0],
            'passwd'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'notice_yn'    => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'secure_yn'    => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'recomm_yn'    => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'contents'     => ['type' => 'LONGTEXT'],
            'simple'       => ['type' => 'TEXT'],
            'hit'          => ['type' => 'INT', 'default' => 0],
            'country_code' => ['type' => 'VARCHAR', 'constraint' => 3],
            'url'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'file_attach'  => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
            'u_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('bbs_idx', true);
        $this->forge->createTable('tbl_bbs_list', true);

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

        // tbl_inquiry
        $this->forge->addField([
            'inq_idx'      => ['type' => 'INT', 'auto_increment' => true],
            'name'         => ['type' => 'VARCHAR', 'constraint' => 50],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'status'       => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'N'],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('inq_idx', true);
        $this->forge->createTable('tbl_inquiry', true);

        // tbl_contents2
        $this->forge->addField([
            'c_idx'        => ['type' => 'INT', 'auto_increment' => true],
            'contents'     => ['type' => 'LONGTEXT'],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('c_idx', true);
        $this->forge->createTable('tbl_contents2', true);

        // tbl_goods
        $this->forge->addField([
            'g_idx'        => ['type' => 'INT', 'auto_increment' => true],
            'category'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'subject'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'contents'     => ['type' => 'LONGTEXT'],
            'pfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'rfile1'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('g_idx', true);
        $this->forge->createTable('tbl_goods', true);

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
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
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
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('h_idx', true);
        $this->forge->createTable('tbl_history', true);

        // tbl_member
        $this->forge->addField([
            'm_idx'        => ['type' => 'INT', 'auto_increment' => true],
            'user_id'      => ['type' => 'VARCHAR', 'constraint' => 50],
            'password'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'user_name'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'email'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'phone'        => ['type' => 'VARCHAR', 'constraint' => 20],
            'level'        => ['type' => 'INT', 'default' => 1],
            'yn'           => ['type' => 'VARCHAR', 'constraint' => 1, 'default' => 'Y'],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
            'u_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('m_idx', true);
        $this->forge->createTable('tbl_member', true);

        // tbl_homeset
        $this->forge->addField([
            'hs_idx'       => ['type' => 'INT', 'auto_increment' => true],
            'setting_key'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'setting_value'=> ['type' => 'LONGTEXT'],
            'r_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
            'u_date'       => ['type' => 'DATETIME', 'default' => '0000-00-00 00:00:00'],
        ]);
        $this->forge->addKey('hs_idx', true);
        $this->forge->createTable('tbl_homeset', true);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_homeset', true);
        $this->forge->dropTable('tbl_member', true);
        $this->forge->dropTable('tbl_history', true);
        $this->forge->dropTable('tbl_popup', true);
        $this->forge->dropTable('tbl_goods', true);
        $this->forge->dropTable('tbl_contents2', true);
        $this->forge->dropTable('tbl_inquiry', true);
        $this->forge->dropTable('tbl_banner_mst', true);
        $this->forge->dropTable('tbl_bbs_list', true);
        $this->forge->dropTable('tbl_bbs_config', true);
    }
}
