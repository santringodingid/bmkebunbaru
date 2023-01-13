<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel', 'dm');
        $this->load->model('SettingModel', 'sm');
        $this->load->helper('download');
        CekLoginAkses();
    }

    public function index()
    {
        $data = [
            'title' => 'Setting Awal Sistem'
        ];
        $this->load->view('setting/setting', $data);
    }

    public function importstudent()
    {
        $file_mimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );


        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);

        if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['file']['type'], $file_mimes)) {

            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // array Count
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = ['name', 'address'];
            $makeArray = ['name' => 'name', 'address' => 'address'];
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    }
                }
            }
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if (empty($dataDiff)) {
                $flag = 1;
            }
            // match excel sheet column
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {

                    $name = filter_var(trim($allDataInSheet[$i][$SheetDataKey['name']]), FILTER_SANITIZE_STRING);
                    $address = filter_var(trim($allDataInSheet[$i][$SheetDataKey['address']]), FILTER_SANITIZE_STRING);
                    $fetchData[] = [
                        'name' => $name,
                        'address' => ucwords($address),
                        'username' => mt_rand(100000, 999999),
                        'password' => password_hash(123456, PASSWORD_DEFAULT),
                        'role' => 'SCHOOL',
                        'status' => 'ACTIVE'
                    ];
                }
                $this->sm->setBatchImportStudent($fetchData);
                $this->sm->importDataStudent();

                $this->session->set_flashdata('import-student', 1);
            } else {
                $this->session->set_flashdata('import-student', 2);
            }
        } else {
            $this->session->set_flashdata('import-student', 3);
        }

        redirect('setting');
    }
}
