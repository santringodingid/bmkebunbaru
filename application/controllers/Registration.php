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

    function simpan()
    {
        $nim = 997950;

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name = $nim . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $nim; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
}
