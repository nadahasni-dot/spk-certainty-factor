<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
    public function insertGejala($data)
    {
        return $this->db->insert('tb_gejala', $data);
    }

    public function getGejala($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_gejala', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            return $this->db->get('tb_gejala')->result_array();
        }

        if ($tipe == 'id_gejala') {
            return $this->db->get_where('tb_gejala', ['id_gejala' => $param])->row_array();
        }
    }

    public function updateGejala($tipe, $data, $param)
    {
        if ($tipe == 'id_gejala') {
            return $this->db->update('tb_gejala', $data, ['id_gejala' => $param]);
        }
    }

    public function deleteGejala($tipe, $param = 'id_gejala')
    {
        if ($tipe == 'id_gejala') {
            return $this->db->delete('tb_gejala', ['id_gejala' => $param]);        
        }
    }

    public function countGejala($tipe, $param = NULL) {
        if ($tipe == 'all') {
            return $this->db->count_all_results('tb_gejala');
        }
    }

    public function getHasilGejala($list_gejala) {
        $this->load->model('Kondisi_model');

        $array_hasil_gejala = array();

        foreach ($list_gejala as $id_gejala => $id_kondisi) {
            $gejala_temp = $this->getGejala('id_gejala', $id_gejala);
            $kondisi_temp = $this->Kondisi_model->getKondisi('id_kondisi', $id_kondisi);
            $gejala = array(
                'id_gejala' => $gejala_temp['id_gejala'],
                'nama_gejala' => $gejala_temp['nama_gejala'],                
                'nama_kondisi' => $kondisi_temp['nama_kondisi'],                
            );

            // * menambahkan gejala ke array gejala
            array_push($array_hasil_gejala, $gejala);
        }

        return $array_hasil_gejala;
    }
}