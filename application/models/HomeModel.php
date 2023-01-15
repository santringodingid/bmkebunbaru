<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{
    public function getRegistrations()
    {
        $this->db->select('status, COUNT(id) AS total')->from('schools');
        return $this->db->group_by('status')->order_by('status', 'DESC')->get()->result_object();
    }
}
