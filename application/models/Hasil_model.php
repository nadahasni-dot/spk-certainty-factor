<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_model extends CI_Model
{
    public function insertHasil($data)
    {
        return $this->db->insert('tb_hasil', $data);
    }

    public function getHasil($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_hasil', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            $this->db->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_hasil.id_penyakit');
            return $this->db->get('tb_hasil')->result_array();
        }

        if ($tipe == 'id_hasil') {
            return $this->db->get_where('tb_hasil', ['id_hasil' => $param])->row_array();
        }
    }

    public function updateHasil($tipe, $data, $param)
    {
        if ($tipe == 'id_hasil') {
            return $this->db->update('tb_hasil', $data, ['id_hasil' => $param]);
        }
    }

    public function deleteHasil($tipe, $param = 'id_hasil')
    {
        if ($tipe == 'id_hasil') {
            return $this->db->delete('tb_hasil', ['id_hasil' => $param]);        
        }
    }

    public function countHasil($tipe, $param = NULL) {
        if ($tipe == 'all') {
            return $this->db->count_all_results('tb_hasil');
        }
    }
}