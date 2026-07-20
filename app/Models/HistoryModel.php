<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table            = 'tbl_history';
    protected $primaryKey       = 'idx';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['year', 'items', 'onum', 'r_date'];

    public function __construct()
    {
        parent::__construct();
        $this->ensureTableExists();
    }

    /**
     * Auto create table tbl_history and seed initial data if not present
     */
    private function ensureTableExists()
    {
        if (!$this->db->tableExists($this->table)) {
            $forge = \Config\Database::forge();
            $forge->addField([
                'idx' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'year' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 10,
                ],
                'items' => [
                    'type' => 'TEXT',
                ],
                'onum' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'default'    => 0,
                ],
                'r_date' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                ],
            ]);
            $forge->addKey('idx', true);
            $forge->createTable($this->table, true);

            // Seed initial timeline data
            $seedData = [
                ['year' => '2026', 'items' => "ibion 브랜드 전개", 'onum' => 1, 'r_date' => date('Y-m-d H:i:s')],
                ['year' => '2025', 'items' => "ruvair 브랜드 전개", 'onum' => 2, 'r_date' => date('Y-m-d H:i:s')],
                ['year' => '2013', 'items' => "EARVENT 운영 및 공급", 'onum' => 3, 'r_date' => date('Y-m-d H:i:s')],
                ['year' => '2012', 'items' => "알레르기 피부단자시험 시약 항원 라인업 확대", 'onum' => 4, 'r_date' => date('Y-m-d H:i:s')],
                ['year' => '2011', 'items' => "주식회사 신영로파마 설립\nLofarma S.p.A 한국 파트너십 체결\n라이스정 국내 공급 개시", 'onum' => 5, 'r_date' => date('Y-m-d H:i:s')],
            ];

            $this->db->table($this->table)->insertBatch($seedData);
        }
    }

    /**
     * Get history items sorted for display (newest year first)
     */
    public function getHistoryList()
    {
        return $this->orderBy('year', 'DESC')
                    ->orderBy('idx', 'DESC')
                    ->findAll();
    }
}
