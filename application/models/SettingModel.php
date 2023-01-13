<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingModel extends CI_Model
{
    private $_batchImportStudent;

    public function setBatchImportStudent($batchImport)
    {
        $this->_batchImportStudent = $batchImport;
    }

    public function importDataStudent()
    {
        $data = $this->_batchImportStudent;
        $this->db->insert_batch('users', $data);
    }
}
