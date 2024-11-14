<?php
class Pengaturan_model extends CI_Model
{
	public function ubahtahun($tahun)
	{
		// Mulai transaksi untuk memastikan semua query dijalankan dengan benar
		$this->db->trans_start();

		// Update tahun di tabel bt_selected dengan id 1
		$this->db->where('id', 1);
		$this->db->update('bt_selected', ['tahun' => $tahun]);

		// Kosongkan tabel daftar_belanja, service, tinta
		$this->db->empty_table('daftar_belanja');
		$this->db->empty_table('service');
		$this->db->empty_table('tinta');

		// Selesaikan transaksi
		$this->db->trans_complete();

		// Jika ada kesalahan dalam transaksi, kembalikan false
		if ($this->db->trans_status() === FALSE) {
			return false;
		}

		return true;
	}
	public function getTahun()
	{
		$tahun = $this->db->get_where('bt_selected', ['id' => 1])->row_array('tahun');
		return $tahun;
	}
	public function getBulan()
	{
		$tahun = $this->db->get_where('bt_selected', ['id' => 1])->row_array('tahun');
		return $this->db->get_where('bulan_tahun', ['kode_bulan' => $tahun['bt']])->row_array('bulan');
	}
}
