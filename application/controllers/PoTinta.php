<?php
class PoTinta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Service_model');
		$this->load->model('Tinta_model');
		$this->load->model('Bulan_model');
		$this->load->model('Belanja_model');
		$this->load->model('PoTinta_model');
		$this->load->model('Kasbon_model');
		$this->load->model('Pengaturan_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pdf');
	}
	public function index()
	{ // method untuk menampilkan list dari po
		$data['title'] = "PreOrder Tinta";
		$data['po'] = $this->PoTinta_model->getAllPo();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('potinta/index', $data);
		$this->load->view('templates/footer');
	}
	public function show($po_ke)
	{ //method untuk menampilkan list tinta per po
		$data['title'] = 'P0-' . $po_ke;
		$data['tinta'] = $this->PoTinta_model->getAllPoTinta($po_ke);
		$data['po_ke'] =  $po_ke;
		$data['po_list'] = $this->PoTinta_model->getPolist($po_ke);
		$data['total'] = $this->PoTinta_model->getTotal($po_ke);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('potinta/show', $data);
		$this->load->view('templates/footer');
	}
	public function tambah($po_ke)
	{ // method untuk menambah list tinta per po
		$data['title'] = 'P0-' . $po_ke;
		$data['tinta'] = $this->PoTinta_model->getAllPoTinta($po_ke);
		$data['po_ke'] =  $po_ke;
		$data['po_list'] = $this->PoTinta_model->getPolist($po_ke);
		$this->PoTinta_model->getTambahData($po_ke);
		$this->session->set_userdata('flash', 'di Tambahkan');
		redirect('potinta/show/' . $po_ke);
	}
	public function hapus($po_ke, $id)
	{ // method untuk menghapus datu data sesuai id
		$this->PoTinta_model->hapusSatuData($id);
		$this->session->set_userdata('flash', 'di Hapus');
		redirect('potinta/show/' . $po_ke);
	}
	public function ubah($po_ke, $id)
	{ // method untuk mengubah data
		$data['po_ke'] = $po_ke;
		$data['title'] = 'Ubah Data';
		$data['tinta'] = $this->PoTinta_model->getPotintaSesuaiId($id);
		// Cek apakah form telah di-submit dengan metode POST
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// Jika form di-submit, jalankan fungsi untuk mengubah data
			$this->PoTinta_model->ubahData($id);
			$this->session->set_userdata('flash', 'di Ubah');
			redirect('potinta/show/' . $po_ke);
		}
		// Jika tidak, tampilkan halaman edit terlebih dahulu
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('PoTinta/ubah', $data);
		$this->load->view('templates/footer');
	}

	public function tambahpo()
	{ //method untuk menamabh p
		$this->form_validation->set_rules('po_ke', 'Po Ke', 'trim|required|callback_unique_check');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
		$data = [
			'po_ke' => html_escape($this->input->post('po_ke', true)),
			'tgl_po' => html_escape($this->input->post('tanggal', true))
		];
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('flash', 'gagal di Tambahkan');
			redirect('potinta');
		} else {
			$this->PoTinta_model->getTambahPo($data);
			$this->session->set_userdata('flash', 'di Tambahkan');
			redirect('potinta');
		}
	}
	public function unique_check($str)
	{
		$query = $this->db->get_where('po_list', array('po_ke' => $str));
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('unique_check', 'Isian {field} sudah ada dalam database');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function hapuspo()
	{
		$this->PoTinta_model->getHapusPo();
		$this->session->set_userdata('flash', 'di Tambahkan');
		redirect('potinta');
	}
	public function laporan_pdf($po_ke)
	{
		// Dapatkan data yang akan ditampilkan
		$data['po_list'] = $this->PoTinta_model->getPolist($po_ke);
		$data['tinta'] = $this->PoTinta_model->getAllPoTinta($po_ke);
		$data['total'] = $this->PoTinta_model->getTotal($po_ke);

		// Load view dan convert ke string
		$html = $this->load->view('potinta/laporan_po_pdf', $data, true);

		// Generate PDF menggunakan Dompdf
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		$this->pdf->stream("laporan_po_tinta_" . $po_ke . ".pdf", array("Attachment" => 0));
	}
}
