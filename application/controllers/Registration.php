<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'am');
    }

    public function index()
    {
        $data = [
            'title' => 'Registrasi Peserta',
            'school' => $this->am->school()
        ];

        $this->load->view('registration/registration', $data);
    }

    public function save()
    {
        $result = $this->am->save();

        echo json_encode($result);
    }

    public function success($id)
    {
        $id = decrypt_url($id);
        $data = [
            'title' => 'Registrasi Sukses',
            'school' => $this->am->schoolbyid($id)
        ];

        $this->load->view('registration/success', $data);
    }
}
