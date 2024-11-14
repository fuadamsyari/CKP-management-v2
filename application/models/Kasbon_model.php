<?php
class Kasbon_model extends CI_Model
{
	public function getTotal($bulan)
	{
		$this->db->select_sum('kasbon');
		$result = $this->db->get('kasbon')->row_array();
		$results = [
			'kasbon' => $result['kasbon'],
		];
		return $results;
	}
}
