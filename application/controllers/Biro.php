<?php
class Biro extends CI_Controller {

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
    	$data['list'] = $this->biro();
		$data['data'] = (empty($id)) ? null : $this->biro($id) ;

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Membuka Halaman Biro';
		$this->Dml_model->create('record',$record);

    	$this->load->view('head');
		$this->load->view('form/biro',$data);
		$this->load->view('foot');
    }

    function biro($where = null){
		$where = (empty($where)) ? '' : 'WHERE biro.id = '.$where;
		$type = (empty($where)) ? 'read' : 'one';
		return $this->Dml_model->{$type}('biro',$where);
	}

	function submit(){
		extract($_POST);
		$result = $this->Dml_model->read('biro','WHERE nama = "'.$nama.'"');
		$aktif['aktif'] = 0;
	    if(empty($result)){
	    	if (empty($id)) {
    		    $this->Dml_model->create('biro');
	    	} else {
		    	$this->Dml_model->update('biro','`id` = '.$id);
	    	}
    	}

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Manipulasi Data Biro';
		$this->Dml_model->create('record',$record);

    	redirect('biro/');
	}

	function form($id){
		$url = (empty($id)) ? 'biro/' : 'biro/index/'.$id ;
    	redirect($url);
	}
}