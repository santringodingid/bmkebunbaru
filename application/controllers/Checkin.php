<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'am');
        $this->load->model('CheckinModel', 'cm');
    }

    public function index()
    {
        $data = [
            'title' => 'Registrasi Peserta'
        ];

        $this->load->view('checkin/checkin', $data);
    }

    public function save()
    {
        $result = $this->cm->save();

        echo json_encode($result);
    }

    public function showData()
    {
        $data = [
            'data' => $this->cm->showData()
        ];

        $this->load->view('checkin/ajax-check', $data);
    }

    public function loadData()
    {
        $data = [
            'data' => $this->cm->loadData()
        ];

        $this->load->view('checkin/ajax-data', $data);
    }

    public function search()
    {
        $data = [
            'data' => $this->cm->search()
        ];

        $this->load->view('checkin/ajax-search', $data);
    }
}
