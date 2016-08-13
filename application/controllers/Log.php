<?php
class Log extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
    }

    function in(){
    	$result = $this->Dml_model->one('pengguna','LEFT JOIN biro ON biro.id = id_biro WHERE nik = "'.$_POST['nik'].'" AND password = "'.$_POST['password'].'" AND aktiv = 1', 'pengguna.*, biro.nama biro');
    	

    	$_SESSION['masuk'] = (empty($result)) ? '' : $result ;

    	redirect('');
    }

    function out(){
    	session_destroy();
    	redirect('');
    }

}