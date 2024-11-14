<?php
class Pengaturan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Service_model');
		$this->load->model('Tinta_model');
		$this->load->model('Bulan_model');
		$this->load->model('Belanja_model');
		$this->load->model('Kasbon_model');
		$this->load->model('Pengaturan_model');
		$this->load->model('Dashboard_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$data['title'] = "Pengaturan";
		// $tahun = $this->db->get_where('bt_selected', ['id' => 1])->row_array('tahun');
		// $data['bulan'] = $this->db->get_where('bulan_tahun', ['kode_bulan' => $tahun['bt']])->row_array('bulan');
		// $data['tahun'] = $tahun;
		$data['bulan'] = $this->Pengaturan_model->getBulan();
		$data['tahun'] = $this->Pengaturan_model->getTahun();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('pengaturan/index', $data);
		$this->load->view('templates/footer');
	}
	public function ubahtahun()
	{
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric|exact_length[4]');
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('pengaturan/');
		} else {
			$tahun = html_escape($this->input->post('tahun'));
			if ($this->Pengaturan_model->ubahtahun($tahun)) {
				$this->session->set_userdata('flash', 'di Hapus');
			} else {
				$this->session->set_userdata('flash', 'gagal di Hapus');
			}
			redirect('pengaturan/');
		}
	}
}
