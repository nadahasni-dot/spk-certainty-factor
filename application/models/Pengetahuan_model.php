<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengetahuan_model extends CI_Model
{
    public function insertPengetahuan($data)
    {
        return $this->db->insert('tb_basis_pengetahuan', $data);
    }

    public function getPengetahuan($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_basis_pengetahuan', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            $this->db->join('tb_penyakit', 'tb_basis_pengetahuan.id_penyakit = tb_penyakit.id_penyakit');
            $this->db->join('tb_gejala', 'tb_basis_pengetahuan.id_gejala = tb_gejala.id_gejala');
            return $this->db->get('tb_basis_pengetahuan')->result_array();
        }

        if ($tipe == 'id_basis_pengetahuan') {
            return $this->db->get_where('tb_basis_pengetahuan', ['id_basis_pengetahuan' => $param])->row_array();
        }

        if ($tipe == 'id_penyakit') {
            return $this->db->get_where('tb_basis_pengetahuan', ['id_penyakit' => $param])->result_array();
        }
    }

    public function updatePengetahuan($tipe, $data, $param)
    {
        if ($tipe == 'id_basis_pengetahuan') {
            return $this->db->update('tb_basis_pengetahuan', $data, ['id_basis_pengetahuan' => $param]);
        }
    }

    public function deletePengetahuan($tipe, $param = 'id_basis_pengetahuan')
    {
        if ($tipe == 'id_basis_pengetahuan') {
            return $this->db->delete('tb_basis_pengetahuan', ['id_basis_pengetahuan' => $param]);        
        }
    }

    public function countPengetahuan($tipe, $param = NULL) {
        if ($tipe == 'all') {
            return $this->db->count_all_results('tb_basis_pengetahuan');
        }
    }
}