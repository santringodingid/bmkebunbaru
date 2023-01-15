<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel', 'dm');
        $this->load->model('HomeModel', 'hm');
        CekLogin();
    }

    public function index()
    {
        $data = [
            'title' => 'BM Kebunbaru',
            'class' => 'active',
            'reg' => $this->hm->getRegistrations()
        ];
        $this->load->view('home/home', $data);
    }
}
