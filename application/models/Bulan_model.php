<?php


class Bulan_model extends CI_Model
{
	// model untuk mengambil semua data di bulan 
	public function getSemuaBulan()
	{
		return $this->db->get('bulan_tahun')->result_array();
	}
	// untuk menampilkan daftar bulan dan tahun
	public function getBulan($bulan)
	{
		return $this->db->get_where('bulan_tahun', ['kode_bulan' => $bulan])->row_array();
	}
	// model untuk mencari nama bulan methodnya
	public function getNamaBulan($bulan)
	{
		$data_bulan = $this->db->get_where('bulan_tahun', ['kode_bulan' => $bulan])->row_array();
		return ucfirst($data_bulan['bulan']);
	}
}
