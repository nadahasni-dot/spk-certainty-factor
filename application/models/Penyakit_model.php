<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{
    public function insertPenyakit($data)
    {
        return $this->db->insert('tb_penyakit', $data);
    }

    public function getPenyakit($tipe, $param = NULL, $limit = NULL)
    {
        $this->db->order_by('id_penyakit', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit);
        }

        if ($tipe == 'all') {
            return $this->db->get('tb_penyakit')->result_array();
        }

        if ($tipe == 'id_penyakit') {
            return $this->db->get_where('tb_penyakit', ['id_penyakit' => $param])->row_array();
        }
    }

    public function updatePenyakit($tipe, $data, $param)
    {
        if ($tipe == 'id_penyakit') {
            return $this->db->update('tb_penyakit', $data, ['id_penyakit' => $param]);
        }
    }

    public function deletePenyakit($tipe, $param = 'id_penyakit')
    {
        if ($tipe == 'id_penyakit') {
            return $this->db->delete('tb_penyakit', ['id_penyakit' => $param]);        
        }
    }

    public function countPenyakit($tipe, $param = NULL) {
        if ($tipe == 'all') {
            return $this->db->count_all_results('tb_penyakit');
        }
    }

    public function getHasilPenyakit($list_penyakit) {
        $array_hasil_penyakit = array();

        foreach ($list_penyakit as $id_penyakit => $nilai) {
            $penyakit_temp = $this->getPenyakit('id_penyakit', $id_penyakit);
            $penyakit = array(
                'id_penyakit' => $penyakit_temp['id_penyakit'],
                'nama_penyakit' => $penyakit_temp['nama_penyakit'],
                'deskripsi_penyakit' => $penyakit_temp['deskripsi_penyakit'],
                'saran_penyakit' => $penyakit_temp['saran_penyakit'],
                'penyakit_artikel' => $penyakit_temp['penyakit_artikel'],
                'penyakit_saran_artikel' => $penyakit_temp['penyakit_saran_artikel'],
                'gambar_penyakit' => $penyakit_temp['gambar_penyakit'],
                'nilai_perhitungan' => (float) $nilai,
            );

            // * menambahkan penyakit ke array penyakit
            array_push($array_hasil_penyakit, $penyakit);
        }

        return $array_hasil_penyakit;
    }
}