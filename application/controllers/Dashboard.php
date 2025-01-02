<?php
class Dashboard extends CI_Controller
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
	{
		$data['title'] = "Dasboard";
		$data['gaji'] = 3000000;
		$data['kuliah'] = 3000000;
		$tahun = $this->db->get_where('bt_selected', ['id' => 1])->row_array('tahun');
		$bulan = $data['bulan'] = $tahun['bt'];
		$data['nama_bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['nama_tahun'] = $tahun;
		$data['service'] = $this->Service_model->getTotal($bulan);
		$data['tinta'] = $this->Tinta_model->getTotal($bulan);
		$data['belanja'] = $this->Belanja_model->getTotal($bulan);
		$data['total_kasbon'] = $this->Kasbon_model->getTotal($bulan);
		$data['sisa_saldo'] = $this->db->get_where('saldo', ['saldo' => 'Sisa Saldo'])->row_array();
		$data['BRI'] = $this->db->get_where('saldo', ['saldo' => 'BRI'])->row_array();
		$data['BPD'] = $this->db->get_where('saldo', ['saldo' => 'BPD'])->row_array();
		$data['cash'] = $this->db->get_where('saldo', ['saldo' => 'cash'])->row_array();
		$data['kasbon'] = [
			'fuad' => $this->db->get_where('kasbon', ['id' => 1])->row_array(),
			'other' => $this->db->get_where('kasbon', ['id' => 2])->row_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('dashboard/index',);
		$this->load->view('templates/footer');
	}

	public function ubahsisasaldo()
	{
		$this->Dashboard_model->ubahsisasaldo();
		redirect(base_url());
	}
	public function ubahsaldo()
	{
		$this->Dashboard_model->ubahsaldo();
		redirect(base_url());
	}
	public function ubahkasbon()
	{
		$this->Dashboard_model->ubahkasbon();
		redirect(base_url());
	}

	public function ubahbulan()
	{
		$this->Dashboard_model->ubahbulan();
		redirect(base_url());
	}
	public function laporan_dashboard_pdf()
	{
		// Ambil data yang akan ditampilkan di PDF
		$data['title'] = "Dashboard PDF";
		$data['gaji'] = 3000000;
		$data['kuliah'] = 3000000;
		$tahun = $this->db->get_where('bt_selected', ['id' => 1])->row_array('tahun');
		$bulan = $data['bulan'] = $tahun['bt'];
		$data['nama_bulan'] = $this->Bulan_model->getBulan($bulan);
		$data['nama_tahun'] = $tahun;
		$data['service'] = $this->Service_model->getTotal($bulan);
		$data['tinta'] = $this->Tinta_model->getTotal($bulan);
		$data['belanja'] = $this->Belanja_model->getTotal($bulan);
		$data['total_kasbon'] = $this->Kasbon_model->getTotal($bulan);
		$data['sisa_saldo'] = $this->db->get_where('saldo', ['saldo' => 'Sisa Saldo'])->row_array();
		$data['ATM'] = $this->db->get_where('saldo', ['saldo' => 'ATM'])->row_array();
		$data['Cash'] = $this->db->get_where('saldo', ['saldo' => 'Cash'])->row_array();
		$data['kasbon'] = [
			'fuad' => $this->db->get_where('kasbon', ['id' => 1])->row_array(),
			'other' => $this->db->get_where('kasbon', ['id' => 2])->row_array()
		];
		// Load view ke dalam variabel dan konversi menjadi string
		$html = $this->load->view('dashboard/laporan_dashboard_pdf', $data, true);

		// Menggunakan DOMPDF untuk generate PDF
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("laporan_dashboard_pdf.pdf", array("Attachment" => 0)); // 0 untuk menampilkan di browser
	}
}
