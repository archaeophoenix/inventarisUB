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


        $record['id_pengguna'] = $_SESSION['masuk']['id'];
        $record['keterangan'] = $result['nama'].' Masuk Aplikasi';
        $this->Dml_model->create('record',$record);


    	redirect('');
    }

    function out(){

        $record['id_pengguna'] = $_SESSION['masuk']['id'];
        $record['keterangan'] = $_SESSION['masuk']['nama'].' Keluar Aplikasi';
        $this->Dml_model->create('record',$record);

    	session_destroy();
    	redirect('');
    }

}