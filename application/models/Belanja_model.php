<?php
class Belanja_model  extends CI_Model
{
	// model untuk menampilkan semua dafastar belanja berdasarkan bulan
	public function getDataBelanjaBerdasarkanBulan($bulan)
	{
		return $this->db->get_where('daftar_belanja', ['bt' => $bulan])->result_array();
	}
	public function getDataBelanjaBerdasarId($id)
	{
		return $this->db->get_where('daftar_belanja', ['id' => $id])->row_array();
	}
	// tabel untuk menampilkan jumlah
	public function getTotal($bulan)
	{
		$this->db->select_sum('belanja_1');
		$this->db->select_sum('belanja_2');
		$this->db->where('bt', $bulan);
		$result = $this->db->get('daftar_belanja')->row_array();
		$results = [
			'belanja_1' => $result['belanja_1'],
			'belanja_2' => $result['belanja_2']
		];
		return $results;
	}
	// model untuk menampilkan total untuk thum setiap bulanya
	public function getThumbTotal()
	{
		$aray = [];
		$bulan = $this->db->get('bulan_tahun')->result_array();
		foreach ($bulan as $bln) {
			$total = [];
			$this->db->select_sum('belanja_1');
			$this->db->select_sum('belanja_2');
			$this->db->where('bt', $bln['kode_bulan']);
			$result = $this->db->get('daftar_belanja')->row_array();
			$results = [
				'belanja_1' => $result['belanja_1'],
				'belanja_2' => $result['belanja_2']
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
	public function formValidationBelanja()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
		return $this->form_validation->run();
	}
	public function getTambahData($bulan)
	{
		$tanggalInput = html_escape($this->input->post('tanggal', true)); // mengambil input tanggal
		$formatted_date = date("d/m/y", strtotime($tanggalInput)); //mengganti format penulisan tanggal

		$data = [
			'tanggal' => $formatted_date,
			'belanja_1' => html_escape($this->input->post('belanja_1', true)),
			'belanja_2' => html_escape($this->input->post('belanja_2', true)),
			'ket' => html_escape($this->input->post('ket', true)),
			'bt' => $bulan
		];

		return $this->db->insert('daftar_belanja', $data);
	}
	public function deleteSatuData($id)
	{
		$this->db->delete('daftar_belanja', ['id' => $id]);
	}
	public function getUbahData($bulan, $id)
	{
		$tanggalInput = html_escape($this->input->post('tanggal', true)); // mengambil input tanggal
		$formatted_date = date("d/m/y", strtotime($tanggalInput)); //mengganti format penulisan tanggal

		$data = [
			'tanggal' => $formatted_date,
			'belanja_1' => html_escape($this->input->post('belanja_1', true)),
			'belanja_2' => html_escape($this->input->post('belanja_2', true)),
			'ket' => html_escape($this->input->post('ket', true)),
			'bt' => $bulan
		];
		$this->db->where('id', $id);
		return $this->db->update('daftar_belanja', $data);
	}
}
