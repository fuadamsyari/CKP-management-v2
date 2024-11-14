<?php
class PoTinta_model extends CI_Model
{
	// model untuk menampilkan semua data po
	public function getAllPo()
	{
		$this->db->order_by('po_ke', 'asc');
		return $this->db->get('po_list')->result_array();
	}
	// model untuk menampilkan semua data po Tinta
	public function getAllPoTinta($po_ke)
	{
		return $this->db->get_where('po_tinta', ['po_ke' => $po_ke])->result_array();
	}
	// model untuk menampilkan data tinta sesuai dengan id
	public function getPotintaSesuaiId($id)
	{
		return $this->db->get_where('po_tinta', ['id' => $id])->row_array();
	}
	// model untuk menampilkan po list
	public function getPolist($po_ke)
	{
		return $this->db->get_where('po_list', ['po_ke' => $po_ke])->row_array();
	}
	// form validation untuk input po tinta
	// public function formValidationPoTinta()
	// {
	// 	return $this->form_validation->run();
	// }
	// modedel untuk menambahkan data
	public function getTambahData($po_ke)
	{
		$data = [
			'warna' => html_escape($this->input->post('warna', true)),
			'tinta' => html_escape($this->input->post('tinta', true)),
			'modal' => 30000,
			'po_ke' => $po_ke
		];
		return $this->db->insert('po_tinta', $data);
	}
	// model untuk menghapus data tinta per po tinta sesuai dengan id nya
	public function hapusSatuData($id)
	{
		return $this->db->delete('po_tinta', ['id' => $id]);
	}
	// model untuk mengubah data tinta per po tinta sesuai dengan id nya
	public function ubahData($id)
	{
		$dataBaru = [
			'warna' => $this->input->post('warna'),
			'tinta' => $this->input->post('tinta'),
		];
		$this->db->where('id', $id);
		$this->db->update('po_tinta', $dataBaru);
	}
	// model untuk menambah list po list
	public function getTambahPo($data)
	{
		return $this->db->insert('po_list', $data);
	}
	public function getHapusPo()
	{
		$this->form_validation->set_rules('po_ke', 'Po Ke', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			return redirect('potinta');
		} else {
			$po_ke = $this->input->post('po_ke');
			$this->db->delete('po_tinta', ['po_ke' => $po_ke]);
			$this->db->delete('po_list', ['po_ke' => $po_ke]);
			return;
		}
	}
	public function getTotal($po_ke)
	{
		$this->db->select_sum('modal');
		$this->db->where('po_ke', $po_ke);
		$result = $this->db->get('po_tinta')->row_array();
		$results = [
			'modal' => $result['modal']
		];
		return $results;
	}
}
