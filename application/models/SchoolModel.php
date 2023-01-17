<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchoolModel extends CI_Model
{
    public function loadData()
    {
        $name = $this->input->post('name', true);
        $status = $this->input->post('status', true);

        $this->db->select('a.*, b.username')->from('schools AS a');
        $this->db->join('users AS b', 'b.school_id = a.id');
        if ($status != '') {
            $this->db->where('a.status', $status);
        }

        if ($name != '') {
            $this->db->like('a.name', $name);
        }
        $result = $this->db->order_by('a.confirmed_at DESC, a.id ASC')->get();

        $data = $result->result_object();
        if ($data) {
            $result = [];
            foreach ($data as $d) {
                $status = $d->status;
                $textStatus = [
                    'NOT_CONFIRMED' => 'Belum konfirmasi',
                    'YES_CONFIRMED' => 'Konfirmasi hadir',
                    'NO_CONFIRMED' => 'Konfirmasi tidak hadir',
                    'MAYBE_CONFIRMED' => 'Konfirmasi ragu',
                ];
                $result[] = [
                    'id' => $d->id,
                    'name' => $d->name,
                    'address' => $d->address,
                    'username' => encrypt_url($d->username),
                    'status' => $status,
                    'text' => $textStatus[$status],
                    'date' => $d->confirmed_at,
                    'type' => $d->type,
                    'participant' => [
                        'status' => $this->getParticipant($d->id)[0],
                        'data' => $this->getParticipant($d->id)[1]
                    ]
                ];
            }
            return [
                'status' => 200,
                'data' => $result
            ];
        } else {
            return [
                'status' => 400,
                'data' => []
            ];
        }
    }

    public function getParticipant($id)
    {
        $result = $this->db->get_where('participants', ['school_id' => $id])->result_object();
        if ($result) {
            return [
                200,
                $result
            ];
        } else {
            return [
                400,
                []
            ];
        }
    }

    public function edit()
    {
        $id = $this->input->post('id', true);
        $check = $this->db->get_where('products', [
            'id' => $id
        ])->row_object();

        if (!$check) {
            return [
                'status' => 400,
                'message' => 'Data tidak ditemukan'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Success',
            'data' => [
                'name' => $check->name,
                'category' => $check->category_id,
                'package' => $check->package_id,
                'unit' => $check->unit_id,
                'amount' => $check->unit_amount
            ]
        ];
    }

    public function getImage()
    {
        $id = $this->input->post('id', true);
        $check = $this->db->get_where('products', ['id' => $id])->row_object();
        return $check->image;
    }

    public function upload($image)
    {
        $id = $this->input->post('id', true);
        $check = $this->db->get_where('products', ['id' => $id])->num_rows();
        if ($id == '' || $id == 0 || $check <= 0) {
            return [
                'status' => 400,
                'message' => 'Produk tidak ditemukan'
            ];
        }

        $this->db->where('id', $id)->update('products', [
            'image' => $image, 'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($this->db->affected_rows() <= 0) {
            return [
                'status' => 400,
                'message' => 'Server tidak merespon'
            ];
        }

        return [
            'status' => 200,
            'message' => 'Image berhasil diupload'
        ];
    }

    public function print()
    {
        $this->db->select('a.*, b.name AS category, c.name AS package, d.name AS unit')->from('products AS a');
        $this->db->join('categories AS b', 'a.category_id = b.id');
        $this->db->join('packages AS c', 'a.package_id = c.id');
        $this->db->join('units AS d', 'a.unit_id = d.id');
        $result = $this->db->order_by('a.created_at', 'DESC')->get();

        return [
            $result->result_object(),
            $result->num_rows()
        ];
    }
}
