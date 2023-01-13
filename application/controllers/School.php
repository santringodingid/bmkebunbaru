<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('SchoolModel', 'sm');
        CekLoginAkses();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Lembaga'
        ];
        $this->load->view('school/school', $data);
    }

    public function loadData()
    {
        $data = [
            'school' => $this->sm->loadData()
        ];
        $this->load->view('school/ajax-data', $data);
    }

    public function print()
    {
        $data = [
            'title' => 'Print Out Data Lembaga',
            'data' => $this->sm->print()[0],
            'amount' => $this->sm->print()[1]
        ];
        $this->load->view('print/school', $data);
    }

    public function save()
    {
        $result = $this->sm->save();

        echo json_encode($result);
    }

    public function edit()
    {
        $result = $this->sm->edit();

        echo json_encode($result);
    }
}
