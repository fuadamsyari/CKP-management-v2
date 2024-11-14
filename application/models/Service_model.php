<?php

class Service_model extends CI_Model
{
	// model untuk menampilkan semua isi tabel sesuai bulan
	public function getDataServiceSesuaiBulan($bulan)
	{
		return $this->db->get_where('service', ['bt' => $bulan])->result_array();
	}
	// untuk menampilkan data service sesuai id
	public function getDataServiceSesuaiId($id)
	{
		return $this->db->get_where('service', ['id' => $id])->row_array();
	}
	// untuk menampilkan data service sesuai id dan bulan
	public function getDataServiceSesuaiBulanDanId($bulan, $id)
	{
		return $this->db->get_where('service', ['id' => $id, 'bt' => $bulan])->row_array();
	}
	// model untuk menampilkan jumalh total untuk thumb
	public function getThumbTotal()
	{
		$aray = [];
		$bulan = $this->db->get('bulan_tahun')->result_array();
		foreach ($bulan as $bln) {
			$total = [];
			$this->db->select_sum('harga_jual');
			$this->db->select_sum('laba');
			$this->db->where('bt', $bln['kode_bulan']);
			$result = $this->db->get('service')->row_array();
			$results = [
				'harga_jual' => $result['harga_jual'],
				'laba' => $result['laba'],
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
	// model untuk menentukan nilai jumlah dari tabel
	public function getTotal($bulan)
	{
		$this->db->select_sum('nominal_blb');
		$this->db->select_sum('harga_jual');
		$this->db->select_sum('laba');
		$this->db->select_sum('nota');
		$this->db->where('bt', $bulan);
		$result = $this->db->get('service')->row_array();
		$results = [
			'nominal_blb' => $result['nominal_blb'],
			'harga_jual' => $result['harga_jual'],
			'laba' => $result['laba'],
			'nota' => $result['nota'],
		];
		return $results;
	}
	// model untuk form validation
	public function formValidationService()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('blb', 'BLB', 'trim');
		$this->form_validation->set_rules('nominal_blb', 'Nominal BLB', 'trim');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
		return $this->form_validation->run();
	}
	// model untuk menambahkan data pada tabel Service sesuai pada bulan tertentu
	public function getTambahData($bulan)
	{
		$tanggalInput = $this->input->post('tanggal', true); // mengambil input tanggal
		$formatted_date = date("d/m/y", strtotime($tanggalInput)); //mengganti format penulisan tanggal
		$data = [
			'tanggal' => html_escape($formatted_date),
			'customer' => html_escape($this->input->post('customer', true)),
			'alamat' => html_escape($this->input->post('alamat', true)),
			'barang' => html_escape($this->input->post('barang', true)),
			'blb' => html_escape($this->input->post('blb', true)),
			'nominal_blb' => $nominalblb = (float) html_escape($this->input->post('nominal_blb', true)),
			'harga_jual' => $hargajual = (float) html_escape($this->input->post('harga_jual', true)),
			'laba' => $hargajual - $nominalblb,
			'ket' => html_escape($this->input->post('ket', true)),
			'nota' => $hargajual,
			'bt' => $bulan
		];
		$this->db->insert('service', $data);
	}
	// model untuk mengahpus data sesuai ID
	public function deleteSatuData($id)
	{
		$this->db->delete('service', ['id' => $id]);
	}
	// model untuk mengupdate data
	public function ubahData($id)
	{
		$dataBaru = [
			'tanggal' => html_escape($this->input->post('tanggal', true)),
			'customer' => html_escape($this->input->post('customer', true)),
			'alamat' => html_escape($this->input->post('alamat', true)),
			'barang' => html_escape($this->input->post('barang', true)),
			'blb' => html_escape($this->input->post('blb', true)),
			'nominal_blb' => html_escape($this->input->post('nominal_blb', true)),
			'harga_jual' => html_escape($this->input->post('harga_jual', true)),
			'laba' => html_escape($this->input->post('laba', true)),
			'ket' => html_escape($this->input->post('ket', true)),
			'nota' => html_escape($this->input->post('nota', true))
		];
		$this->db->where('id', $id);
		$this->db->update('service', $dataBaru);
	}
}
