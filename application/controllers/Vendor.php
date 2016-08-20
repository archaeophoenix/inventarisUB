<?php
class Vendor extends CI_Controller {

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
    	$data['list'] = $this->Dml_model->read('vendor','ORDER BY id DESC');
		$data['data'] = (empty($id)) ? null : $this->Dml_model->one('vendor','WHERE id = '.$id);

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Membuka Halaman Vendor';
		$this->Dml_model->create('record',$record);

    	$this->load->view('head');
		$this->load->view('form/vendor',$data);
		$this->load->view('foot');
    }

    function submit($id = null){
		unset($_POST['_wysihtml5_mode']);
		if (empty($id)) {
		    $this->Dml_model->create('vendor');
		} else {
			$this->Dml_model->update('vendor','`id` = '.$id);
		}

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Manipulasi Data Vendor';
		$this->Dml_model->create('record',$record);

		redirect('vendor/');
    }
}