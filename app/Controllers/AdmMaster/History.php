<?php

namespace App\Controllers\AdmMaster;

use App\Controllers\BaseController;
use App\Models\HistoryModel;

class History extends BaseController
{
    protected $historyModel;

    public function __construct()
    {
        $this->historyModel = new HistoryModel();
    }

    /**
     * Timeline History Admin List Page
     */
    public function index()
    {
        $historyList = $this->historyModel->getHistoryList();

        return view('adm_master/history/list', [
            'historyList' => $historyList,
            'pageTitle'   => '연혁 관리',
        ]);
    }

    /**
     * Timeline History Form (Add / Edit)
     */
    public function form($id = null)
    {
        $item = null;
        if ($id) {
            $item = $this->historyModel->find($id);
            if (!$item) {
                return redirect()->to(base_url('AdmMaster/bbs/history'))->with('error', '존재하지 않는 항목입니다.');
            }
        }

        return view('adm_master/history/form', [
            'item'      => $item,
            'pageTitle' => $id ? '연혁 수정' : '연혁 등록',
        ]);
    }

    /**
     * Save / Update History Record
     */
    public function save()
    {
        $idx   = $this->request->getPost('idx');
        $year  = trim((string)$this->request->getPost('year'));
        $items = trim((string)$this->request->getPost('items'));

        if (empty($year)) {
            return redirect()->back()->withInput()->with('error', '연도를 입력해 주세요.');
        }

        if (empty($items)) {
            return redirect()->back()->withInput()->with('error', '연혁 내용을 입력해 주세요.');
        }

        $data = [
            'year'   => $year,
            'items'  => $items,
            'r_date' => date('Y-m-d H:i:s'),
        ];

        if ($idx) {
            $this->historyModel->update($idx, $data);
            $msg = '연혁이 수정되었습니다.';
        } else {
            $this->historyModel->insert($data);
            $msg = '새 연혁이 등록되었습니다.';
        }

        return redirect()->to(base_url('AdmMaster/bbs/history'))->with('success', $msg);
    }

    /**
     * Delete History Record
     */
    public function delete($id = null)
    {
        if ($id && $this->historyModel->find($id)) {
            $this->historyModel->delete($id);
            return redirect()->to(base_url('AdmMaster/bbs/history'))->with('success', '삭제되었습니다.');
        }

        return redirect()->to(base_url('AdmMaster/bbs/history'))->with('error', '삭제할 항목을 찾을 수 없습니다.');
    }
}
