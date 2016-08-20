<?php
class Pengguna extends CI_Controller {

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
    	$data['list'] = $this->pengguna();
    	$data['biro'] = $this->Dml_model->read('biro','ORDER BY id DESC');
    	$data['izin'] = ['admin','purchaser','penyetuju'];
    	$data['jabatan'] = ['staff', 'kabiroumum', 'kabiro', 'purchaser', 'rektor', 'wareknonakademik', 'keuangan', 'kakeuangan', 'kabag'];
    	$cont = ['id' => '', 'nama' => '', 'gelar' => '', 'tanggal' => '', 'nik' => '', 'password' => '', 'id_biro' => '', 'id_atasan' => '', 'izin' => '', 'status' => '', 'aktiv' => '', 'biro' => ''];
    	$data['data'] = (empty($id)) ? $cont : $this->pengguna($id) ;

		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Membuka Halaman Pengguna';
		$this->Dml_model->create('record',$record);

    	$this->load->view('head');
		$this->load->view('form/pengguna',$data);
		$this->load->view('foot');
    }

    function pengguna($where = null){
		$where = (empty($where)) ? '' : 'AND pengguna.id = '.$where;
		$type = (empty($where)) ? 'read' : 'one';
		return $this->Dml_model->{$type}('pengguna','LEFT JOIN biro ON biro.id = id_biro WHERE aktiv = 1 '.$where.' ORDER BY id_biro, id_atasan ASC','pengguna.*, biro.nama biro');
	}

	function submit(){
		//update menggantikan posisi pengguna
		if (!empty($_POST['id'])) {
			$pengguna = $this->Dml_model->one('pengguna','WHERE id = '.$_POST['id']);
			if($pengguna['id_biro'] != $_POST['id_biro']){
				$this->Dml_model->update('pengguna','aktiv = 1 AND id_biro = '.$_POST['id_biro'].' AND status = '.$_POST['status'],['aktiv' => 0]);
			}
		}

		//get id_atasan
		$id_atasan = $this->Dml_model->one('pengguna','WHERE id_biro = '.$_POST['id_biro'].' AND status = '.($_POST['status']-1),'id');
		$atasan = ($id_atasan['id'] < 2) ? 0 : $id_atasan['id'] ;
		$_POST['id_atasan'] = $atasan;

		$bawahan = null;
		if (!empty($_POST['id'])) {
			if (empty($_POST['password'])) {
				unset($_POST['password']);
			}

			$atasan = $this->Dml_model->one('pengguna','WHERE id = '.$pengguna['id_atasan']);

			if ($pengguna['id_biro'] != $_POST['id_biro']) {
				
				$bawahan = $this->Dml_model->read('pengguna','WHERE id_atasan = '.$_POST['id'],'id');
				
				//update id_atasan bawahan lama ke atasan lama
				if(!empty($bawahan)){
					$flat =  array_map('current', $bawahan);
					$bawah = implode(',',$flat);
					$this->Dml_model->update('pengguna','id in ('.$bawah.')',['id_atasan' => $atasan['id']]);
				}
				
			}
			$this->Dml_model->update('pengguna','id = '.$_POST['id'],$_POST);
		} else {
			unset($_POST['id']);
			//atasan
			$_POST['id'] = $this->Dml_model->create('pengguna',$_POST);
		}

		//update bawahan baru
		if(($_POST['status']+1) > 2 && ($_POST['status']+1) <= 4){
			$this->Dml_model->update('pengguna','aktiv = 1 AND id_biro = '.$_POST['id_biro'].' AND status = '.($_POST['status']+1), ['id_atasan' => $_POST['id']]);
		}


		$record['id_pengguna'] = $_SESSION['masuk']['id'];
		$record['keterangan'] = 'Menipulasi Data Pengguna';
		$this->Dml_model->create('record',$record);
		
		redirect('pengguna/');
	}

	function form($id){
		$url = (empty($id)) ? 'pengguna/' : 'pengguna/index/'.$id ;
    	redirect($url);
	}
}