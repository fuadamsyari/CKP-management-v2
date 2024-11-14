<?php

class Tinta_model extends CI_Model
{
	// mengambil data tinta sesuai bulan
	public function getDataTintaSesuaiBulan($bulan)
	{
		return $this->db->get_where('tinta', ['bt' => $bulan])->result_array();
	}
	// mengambil data tinta sesuai bulan
	public function getDataTintaSesuaiId($id)
	{
		return $this->db->get_where('tinta', ['id' => $id])->row_array();
	}
	// model untuk menampilkan jumalh total untuk thumb
	public function getThumbTotal()
	{
		$aray = [];
		$bulan = $this->db->get('bulan_tahun')->result_array();
		foreach ($bulan as $bln) {
			$total = [];
			$this->db->select_sum('terjual');
			$this->db->select_sum('modal');
			$this->db->select_sum('untung');
			$this->db->where('bt', $bln['kode_bulan']);
			$result = $this->db->get('tinta')->row_array();
			$results = [
				'terjual' => $result['terjual'],
				'modal' => $result['modal'],
				'untung' => $result['untung'],
			];
			$total = [
				'kode_bulan' => $bln['kode_bulan'],
				'bulan' => $bln['bulan'],
				'total' => $results
			];
			array_push($aray, $total);
		}
		return $aray;
	}
	// model untuk menghitung jumlah tinta
	public function getTotal($bulan)
	{
		$this->db->select_sum('terjual');
		$this->db->select_sum('modal');
		$this->db->select_sum('untung');
		$this->db->where('bt', $bulan);
		$result = $this->db->get('tinta')->row_array();
		$results = [
			'terjual' => $result['terjual'],
			'modal' => $result['modal'],
			'untung' => $result['untung'],
		];
		return $results;
	}
	// form validation
	public function formValidationTinta()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
		return $this->form_validation->run();
	}
	// model untuk menambahkan data
	public function getTambahData($bulan)
	{
		$tanggalInput = $this->input->post('tanggal', true); // mengambil input tanggal
		$formatted_date = date("d/m/y", strtotime($tanggalInput)); //mengganti format penulisan tanggal
		$formatted_date = str_replace("-", "/", $formatted_date); //mengganti format tanggal sesuai yang di inginkan
		$data = [
			'tanggal' => html_escape($formatted_date),
			'warna' => html_escape($this->input->post('warna', true)),
			'tinta' => html_escape($this->input->post('tinta', true)),
			'terjual' => 50000,
			'modal' => 30000,
			'untung' => 20000,
			'customer' => html_escape($this->input->post('customer', true)),
			'bt' => $bulan
		];
		$this->db->insert('tinta', $data);
	}
	// model untuk mengapus satu data
	public function hapusSatuData($id)
	{
		return $this->db->delete('tinta', ['id' => $id]);
	}
	// model untuk mengubah data tinta 
	public function ubahData($id)
	{
		$dataBaru = [
			'tanggal' => $this->input->post('tanggal'),
			'warna' => $this->input->post('warna'),
			'tinta' => $this->input->post('tinta'),
			'customer' => $this->input->post('customer'),
		];
		$this->db->where('id', $id);
		$this->db->update('tinta', $dataBaru);
	}
}
