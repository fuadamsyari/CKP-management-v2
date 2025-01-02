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
		$BRI = $this->input->get_post('BRI');
		$BPD = $this->input->get_post('BPD');
		$cash = $this->input->get_post('cash');
		$BRI = !empty($BRI) ? $BRI : 0;
		$BPD = !empty($BPD) ? $BPD : 0;
		$cash = !empty($cash) ? $cash : 0;
		$this->db->query("UPDATE saldo SET nominal = $BRI WHERE saldo.saldo = 'BRI'");
		$this->db->query("UPDATE saldo SET nominal = $BPD WHERE saldo.saldo = 'BPD'");
		$this->db->query("UPDATE saldo SET nominal = $cash WHERE saldo.saldo = 'cash'");
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
