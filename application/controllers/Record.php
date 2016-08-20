<?php
class Record extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
		
		if (empty($_SESSION['masuk'])) {
			redirect('');
		}
	}

	function index($bulan, $tahun){
		if(empty($bulan) || empty($tahun)){
			redirect('record/index/'.date('m').'/'.date('Y'));
		}

		$data['param'] = ['tahun' => $tahun, 'bulan' => $bulan];
		$data['tahun'] = $this->Dml_model->read('record','','DISTINCT(YEAR(tanggal)) tahun');
		$data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$data['record'] = $this->Dml_model->read('record','JOIN pengguna ON id_pengguna = pengguna.id WHERE MONTH(record.tanggal) = '.$bulan.' AND YEAR(record.tanggal) = '.$tahun,'record.*, pengguna.nama pengguna');

		$this->load->view('head');
		$this->load->view('form/record',$data);
		$this->load->view('foot');
	}
}