<?php
class Harga extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
		
        if (empty($_SESSION['masuk'])) {
            redirect('');
        }
    }

    function index($id = null){
		$data['id'] = $id;
    	$data['list'] = $this->harga();
		$data['data'] = (empty($id)) ? null : $this->harga($id) ;
    	$data['vendor'] = $this->Dml_model->read('vendor','ORDER BY id DESC');

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Membuka Halaman Harga';
		$this->Dml_model->create('record',$record);

    	$this->load->view('head');
		$this->load->view('form/harga',$data);
		$this->load->view('foot');
    }

    function harga($where = null){
		$where = (empty($where)) ? '' : 'AND harga.id = '.$where;
		$type = (empty($where)) ? 'read' : 'one';
		return $this->Dml_model->{$type}('`harga`','JOIN barang ON barang.id = id_barang JOIN vendor ON vendor.id = id_vendor WHERE aktif = 1 '.$where,'harga.*,vendor.nama vendor, barang.nama barang,aktif');
	}

	function submit(){
		extract($_POST);
		$result = $this->Dml_model->one('harga','WHERE aktif = 1 AND id_barang = '.$id_barang.' AND id_vendor = '.$id_vendor.' ORDER BY pembaruan DESC LIMIT 1');
		$aktif['aktif'] = 0;
	    if($result['harga'] != $harga){
	    	$this->Dml_model->update('harga','`id` = '.$result['id'],$aktif);
    	    $this->Dml_model->create('harga',$_POST);
    	}

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Manipulasi Data Harga';
		$this->Dml_model->create('record',$record);

    	redirect('harga/');
	}

	function form($id){
		$url = (empty($id)) ? 'harga/' : 'harga/index/'.$id ;
    	redirect($url);
	}
}