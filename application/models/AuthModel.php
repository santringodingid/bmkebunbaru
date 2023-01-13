<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $cekUser = $this->db->get_where('users', ['username' => $username])->row_object();
        if ($cekUser) {
            $passwordDB = $cekUser->password;
            if (password_verify($password, $passwordDB) == FALSE) {
                return [
                    'status' => 500,
                    'message' => 'Kombinasi username dan password tidak valid'
                ];
            } else {
                $status = $cekUser->status;
                if ($status == 'INACTIVE') {
                    return [
                        'status' => 500,
                        'message' => 'Pengguna ini sudah dinon-aktifkan'
                    ];
                } else {
                    $role = $cekUser->role;
                    if ($role == 'ADMIN') {
                        $textRole = 'ADMIN';
                    } elseif ($role == 'STAFF') {
                        $textRole = 'STAF ADMIN';
                    } elseif ($role == 'DEV') {
                        $textRole = 'DEVELOPER';
                    } elseif ($role == 'SALER') {
                        $textRole = 'SALES';
                    } elseif ($role == 'COURIER') {
                        $textRole = 'KURIR';
                    } else {
                        $textRole = 'PESERTA';
                    }

                    $data = [
                        'user_id' => $cekUser->id,
                        'username' => $cekUser->username,
                        'role' => $role,
                        'name' => $cekUser->name,
                        'text_role' => $textRole,
                        'school_id' => $cekUser->school_id
                    ];
                    $this->session->set_userdata($data);
                    return [
                        'status' => 200,
                        'message' => 'Login sukses'
                    ];
                }
            }
        } else {
            return [
                'status' => 500,
                'message' => 'Kombinasi username dan password tidak valid'
            ];
        }
    }

    public function school()
    {
        return $this->db->get_where('schools', ['name !=' => ''])->result_object();
    }

    public function save()
    {
        $confirmation = $this->input->post('confirmation', true);
        $whatsapp = str_replace('-', '', $this->input->post('whatsapp', true));
        $school = $this->input->post('school', true);
        $name = $this->input->post('name', true);

        if ($confirmation == '' || $whatsapp == '' || $school == '') {
            return [
                'status' => 400,
                'message' => 'Pastikan Konfirmasi, Nomor WA, dan Lembaga telah diisi/dipilih'
            ];
        }

        $checkWa = $this->db->get_where('users', ['phone' => $whatsapp])->num_rows();
        if ($checkWa > 0) {
            return [
                'status' => 400,
                'message' => 'Nomor WA sudah terdaftar sebelumnya'
            ];
        }

        $checkConfirm = $this->db->get_where('schools', ['id' => $school, 'status !=' => 'NOT_CONFIRMED'])->num_rows();
        if ($checkConfirm > 0) {
            return [
                'status' => 400,
                'message' => 'Instansi/Lembaga sudah melakukan registrasi sebelumnya'
            ];
        }

        $this->db->where('id', $school)->update('schools', [
            'status' => $confirmation, 'confirmed_at' => date('Y-m-d H:i:s')
        ]);
        if ($this->db->affected_rows() <= 0) {
            return [
                'status' => 400,
                'message' => 'Gagal menyimpan perubahan'
            ];
        }

        $this->db->where('school_id', $school)->update('users', [
            'username' => $whatsapp, 'phone' => $whatsapp
        ]);

        if ($this->db->affected_rows() <= 0) {
            return [
                'status' => 400,
                'message' => 'Gagal menyimpan perubahan'
            ];
        }

        if ($confirmation != 'NO_CONFIRMED') {
            if ($name) {
                foreach ($name as $key => $value) {
                    $this->db->insert('participants', [
                        'school_id' => $school,
                        'name' => strtoupper($value),
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        return [
            'status' => 200,
            'message' => encrypt_url($school)
        ];
    }

    public function schoolbyid($id)
    {
        $this->db->select('a.*, b.username')->from('schools AS a')->join('users AS b', 'b.school_id = a.id');
        $data = $this->db->where('a.id', $id)->get()->row_object();

        return $data;
    }

    public function getparticipant($id)
    {
        return $this->db->get_where('participants', ['school_id' => $id])->result_object();
    }

    public function getschool()
    {
        return $this->db->get('schools')->result_object();
    }

    public function getType($id)
    {
        $data = $this->db->get_where('schools', ['id' => $id])->row_object();

        return $data->type;
    }

    public function getregistration($id)
    {
        return $this->db->get_where('registrations', ['school_id' => $id])->row_object();
    }
}
