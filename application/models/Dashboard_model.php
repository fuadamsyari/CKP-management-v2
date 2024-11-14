<?php
final class Dashboard_model extends CI_Model
{

	public function ubahsisasaldo()
	{
		$data = ['nominal' => html_escape($this->input->get_post('sisa_saldo'))];
		$this->db->where('saldo', 'Sisa Saldo');
		$this->db->update('saldo', $data);
	}
	public function ubahsaldo()
	{
		$id2 = $this->input->get_post('ATM');
		$id3 = $this->input->get_post('Cash');
		$id2 = !empty($id2) ? $id2 : 0;
		$id3 = !empty($id3) ? $id3 : 0;
		$this->db->query("UPDATE saldo SET nominal = $id2 WHERE saldo.id = 2");
		$this->db->query("UPDATE saldo SET nominal = $id3 WHERE saldo.id = 3");
	}
	public function ubahkasbon()
	{
		$id1 = $this->input->get_post('fuad');
		$id2 = $this->input->get_post('other');
		$id1 = !empty($id1) ? $id1 : 0;
		$id2 = !empty($id2) ? $id2 : 0;
		$this->db->query("UPDATE kasbon SET kasbon = $id1 WHERE kasbon.id = 1");
		$this->db->query("UPDATE kasbon SET kasbon = $id2 WHERE kasbon.id = 2");
	}
	public function ubahbulan()
	{
		$bulan = ['bt' => $this->input->post('bulan')];
		$this->db->where('id', 1);
		$this->db->update('bt_selected', $bulan);
	}
}
