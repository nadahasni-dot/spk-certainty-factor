<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi_model extends CI_Model
{
    public function insertKondisi($data)
    {
        return $this->db->insert('tb_kondisi', $data);
    }

    public function getKondisi($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_kondisi', 'ASC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            return $this->db->get('tb_kondisi')->result_array();
        }

        if ($tipe == 'id_kondisi') {
            return $this->db->get_where('tb_kondisi', ['id_kondisi' => $param])->row_array();
        }
    }

    public function updateKondisi($tipe, $data, $param)
    {
        if ($tipe == 'id_kondisi') {
            return $this->db->update('tb_kondisi', $data, ['id_kondisi' => $param]);
        }
    }

    public function deleteKondisi($tipe, $param = 'id_kondisi')
    {
        if ($tipe == 'id_kondisi') {
            return $this->db->delete('tb_kondisi', ['id_kondisi' => $param]);        
        }
    }
}