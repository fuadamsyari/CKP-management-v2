<?php
// File: application/libraries/Pdf.php
require_once FCPATH . 'vendor/autoload.php'; // Load autoload dari Composer
use Dompdf\Dompdf;

class Pdf extends Dompdf
{
	public function __construct()
	{
		parent::__construct();
	}
}
