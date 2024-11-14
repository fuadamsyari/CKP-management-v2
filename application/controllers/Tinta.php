<?php
class Tinta extends CI_Controller
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
		$this->load->library('pdf');
	}
	public function index()
	{ // method index untuk menampilkan list atau daftar Bulan tinta pada Tahun tertentu
		$data['title'] = 'Laporan Penjualan Tinta ';
		$data['perbulan'] = $this->Tinta_model->getThumbTotal();
		$data['bulan'] = $this->Pengaturan_model->getBulan();
		$data['tahun'] = $this->Pengaturan_model->getTahun();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Tinta/index', $data);
		$this->load->view('templates/footer');
	}
	public function bulan($bulan)
	{ // method untuk menampilkan data penjualan tinta sesuai bulan
		$data['tinta'] = $this->Tinta_model->getDataTintaSesuaiBulan($bulan);
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['title'] = $this->Bulan_model->getNamaBulan($bulan);
		$data['total'] = $this->Tinta_model->getTotal($bulan);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('Tinta/bulan', $data);
		$this->load->view('templates/footer');
	}
	public function tambah($bulan)
	{ //method untuk menambah data tinta
		$data['tinta'] = $this->Tinta_model->getDataTintaSesuaiBulan($bulan);
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['title'] = $this->Bulan_model->getNamaBulan($bulan);
		$data['total'] = $this->Tinta_model->getTotal($bulan);
		$this->Tinta_model->formValidationTinta();
		if ($this->form_validation->run() ==  FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('Tinta/bulan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Tinta_model->getTambahData($bulan);
			$this->session->set_userdata('flash', 'di Tambahkan');
			redirect('tinta/bulan/' . $bulan);
		}
	}
	public function hapus($bulan, $id)
	{ //method untuk menghapu satu data dari tabel tinta
		$this->Tinta_model->hapusSatuData($id);
		$this->session->set_userdata('flash', 'di Hapus');
		redirect('tinta/bulan/' . $bulan);
	}
	public function ubah($bulan, $id)
	{
		$data['bulan'] = $bulan;
		$data['title'] = 'Ubah Data';
		$data['tinta'] = $this->Tinta_model->getDataTintaSesuaiId($id);
		$this->Tinta_model->formValidationTinta();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('Tinta/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Tinta_model->ubahData($id);
			$this->session->set_userdata('flash', 'di Ubah');
			redirect('tinta/bulan/' . $bulan);
		}
	}
	public function laporan_pdf($bulan)
	{
		// Dapatkan data yang akan ditampilkan
		$data['bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['tinta'] = $this->Tinta_model->getDataTintaSesuaiBulan($bulan);
		$data['total'] = $this->Tinta_model->getTotal($bulan);

		// Load view dan convert ke string
		$html = $this->load->view('tinta/laporan_tinta_pdf', $data, true);

		// Generate PDF menggunakan Dompdf
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("laporan_tinta_" . $bulan . ".pdf", array("Attachment" => 0));
	}
}
