<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckinModel extends CI_Model
{
    public function loadData()
    {
        $checked = $this->db->get('registrations')->num_rows();

        return [
            $checked,
            70 - $checked
        ];
    }

    public function save()
    {
        $id = $this->input->post('id', true);
        $checkSchool = $this->db->get_where('schools', ['id' => $id])->row_object();
        if (!$checkSchool) {
            return [
                'status' => 400,
                'message' => 'ID tidak valid'
            ];
        }

        $checkRegistration = $this->db->get_where('registrations', ['school_id' => $id])->num_rows();
        if ($checkRegistration > 0) {
            return [
                'status' => 400,
                'message' => 'Lembaga ini sudah check in sebelumnya'
            ];
        }

        $this->db->insert('registrations', [
            'school_id' => $id, 'created_at' => date('Y-m-d H:i:s')
        ]);
        if ($this->db->affected_rows() <= 0) {
            return [
                'status' => 400,
                'message' => 'Gagal menyimpan data check in'
            ];
        }

        return [
            'status' => 200,
            'message' => $id
        ];
    }

    public function showData()
    {
        $id = $this->input->post('id', true);
        $this->db->select('a.created_at AS checked, b.*')->from('registrations AS a');
        $this->db->join('schools AS b', 'b.id = a.school_id');
        $data = $this->db->where('b.id', $id)->get()->row_object();
        if ($data) {
            return [
                'status' => 200,
                'id' => $id,
                'name' => $data->name,
                'address' => $data->address,
                'status__' => $data->status,
                'checked' => datetimeIDFormat($data->checked),
                'type' => $data->type,
                'participant' => $this->getParticipant($id)
            ];
        } else {
            return [
                'status' => 400
            ];
        }
    }

    public function getparticipant($id)
    {
        $data = $this->db->get_where('participants', ['school_id' => $id])->result_object();
        if ($data) {
            $result = [];
            foreach ($data as $d) {
                $result[] = ['name' => $d->name];
            }
        } else {
            $result = 0;
        }
        return $result;
    }

    public function search()
    {
        $name = $this->input->post('name', true);
        if ($name != '') {
            $this->db->select('*')->from('schools');
            $this->db->like('name', $name);
            return $this->db->limit(10)->get()->result_object();
        } else {
            return '';
        }
    }
}
