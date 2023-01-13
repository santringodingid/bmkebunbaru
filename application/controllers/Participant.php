<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Participant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel', 'dm');
        $this->load->model('AuthModel', 'am');
        CekLoginAkses();
    }

    public function index()
    {
        $id = $this->session->userdata('school_id');
        $data = [
            'title' => 'Data Peserta',
            'school' => $this->am->schoolbyid($id),
            'registration' => $this->am->getregistration($id)
        ];
        $this->load->view('participant/participant', $data);
    }

    public function checkin()
    {
        $data = [
            'title' => 'Checkin Peserta',
            'id' => $this->session->userdata('school_id'),
            'type' => $this->am->getType($this->session->userdata('school_id')),
            'registration' => $this->am->getregistration($this->session->userdata('school_id'))
        ];

        $this->load->view('participant/checkin', $data);
    }
}
