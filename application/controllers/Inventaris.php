<?php
class Inventaris extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');

        if (empty($_SESSION['masuk'])) {
            redirect('');
        }
    }

    function index(){
    	redirect('report/inventaris');
    }

    function permintaan($id){
    	$import = $this->Dml_model->one('purchase', 'WHERE id = '.$id, 'inventaris');
    	$item = $this->Dml_model->read('item','WHERE id_purchase = '.$id);
    	if($import['inventaris'] == 0){
			foreach ($item as $key => $value) {
				$inventaris['harga'] = $value['harga'];
				$inventaris['masuk'] = $value['jumlah'];
				$inventaris['tanggal'] = date('Y-m-d');
				$inventaris['alokasi'] = $_SESSION['masuk']['biro'];
				$inventaris['id_biro'] = $_SESSION['masuk']['id_biro'];
				$inventaris['id_barang'] = $value['id_barang'];
				$inventaris['id_purchase'] = $id;
				$inventaris['id_pengguna'] = $_SESSION['masuk']['id'];
				$this->Dml_model->create('inventaris', $inventaris);
			}
    	}
    	$permintaan['inventaris'] = 1;

        $record['id_pengguna'] = $_SESSION['masuk']['id'];
        $record['keterangan'] = 'Input Inventaris Dari Report Permintaan';
        $this->Dml_model->create('record',$record);

    	$this->Dml_model->update('purchase', 'id = '.$id, $permintaan);
    	redirect('report/permintaan/'.$id);
    }

    function transaksi($jenis){
    	echo "<pre>";
    	print_r($_POST);
    	extract($_POST);
    
    	foreach ($id_barang as $key => $value) {
    		
    		if($jenis == 'masuk'){
				$inventaris['harga'] = $harga[$key];
				$inventaris['reg'] = $reg[$key];
    		}
			
			$inventaris['id_barang'] = $value;
			$inventaris[$jenis] = $jumlah[$key];
			$inventaris['alokasi'] = $alokasi[$key];
			$inventaris['keterangan'] = $keterangan[$key];
			$inventaris['tanggal'] = date('Y-m-d');
			$inventaris['id_biro'] = $_SESSION['masuk']['id_biro'];
			$inventaris['id_pengguna'] = $_SESSION['masuk']['id'];
			print_r($inventaris);
			if ($edit == 0) {

                $record['id_pengguna'] = $_SESSION['masuk']['id'];
                $record['keterangan'] = 'Input Data Inventaris';
                $this->Dml_model->create('record',$record);

				$this->Dml_model->create('inventaris',$inventaris);
			} else {

                $record['id_pengguna'] = $_SESSION['masuk']['id'];
                $record['keterangan'] = 'Edit Data Inventaris';
                $this->Dml_model->create('record',$record);

				$this->Dml_model->update('inventaris', 'id = '.$id[$key], $inventaris);
			}
    	}
    	redirect('report/inventaris');
    }

    function form($type){
    	$data['edit'] = 0 ;
    	$data['jenis'] = $type;
    	/*echo "<pre>";
    	echo $type;
    	print_r($_POST);*/
    	if (isset($_POST) && !empty($_POST['id'])) {
    		$id = implode(',', $_POST['id']);
    		$id_barang = implode(',', $_POST['id_barang']);
    		$cols = ', '.$type.' jumlah';
    		$sisa = $this->Dml_model->read('inventaris','WHERE id_barang in ('.$id_barang.') GROUP BY id_barang ORDER BY id_barang ASC','id_barang, SUM(masuk-keluar) sisa');
    		$inventaris = $this->Dml_model->read('inventaris' ,'JOIN barang ON barang.id = id_barang JOIN pengguna ON pengguna.id = id_pengguna WHERE inventaris.id in ('.$id.') ORDER BY id_barang ASC', 'inventaris.id_barang, barang.nama barang, barang.merk, inventaris.id, inventaris.alokasi, inventaris.reg, inventaris.harga, inventaris.keterangan'.$cols);
    		$data['inventaris'] = array_replace_recursive($inventaris, $sisa);
    		$data['edit'] = 1;
    	}
		/*echo $id;
		print_r($data);
		die();*/

        $record['id_pengguna'] = $_SESSION['masuk']['id'];
        $record['keterangan'] = 'Membuka Form Inventaris';
        $this->Dml_model->create('record',$record);

    	$this->load->view('head');
		$this->load->view('form/inventaris',$data);
		$this->load->view('foot');
    }
}