<?php

namespace App\Models;

use CodeIgniter\Model;

class InquiryModel extends Model
{
    protected $table = 'tbl_inquiry';
    protected $primaryKey = 'idx';
    protected $returnType = 'array';
    protected $allowedFields = [
        'company', 'hospital', 'department', 'manager', 'tel', 'email', 
        'request_type', 'visit', 'location', 'message', 'content', 'status',
        'ip_address', 'regdate', 'r_date', 'user_name', 'phone', 'subject',
        'd1_1', 'd1_2', 'd2_1', 'd2_2', 'd3_1', 'd3_2', 'd4_1', 'd4_2'
    ];
    protected $useTimestamps = false; // Using regdate manually or via now()

    public function saveInquiry($data)
    {
        $data['ip_address'] = service('request')->getIPAddress();
        $data['regdate'] = date('Y-m-d H:i:s');
        return $this->insert($data);
    }
}
