<?php
class Purchase extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
    }

    function item($data = null){
	    return $this->Dml_model->create('item',$data);
	}

	function deitem($id){
	    return $this->Dml_model->delete('item',$id);
	}

    function putem($idpurchase){
		return $this->Dml_model->read('item','JOIN `barang` ON `id_barang` = `barang`.`id` WHERE `id_purchase` = '.$idpurchase,'`item`.`id`, `item`.`id_barang`, `item`.`jumlah`, `barang`.`nama`, `barang`.`merk`, `barang`.`spesifikasi`,`type`,`harga`');
	}

    function form($id = null){
		$data['purchase'] = (empty($id)) ? null : $this->Dml_model->one('purchase','JOIN biro ON id_biro = biro.id JOIN pengguna staff ON purchaser = staff.id JOIN pengguna kabiro ON kabiro = kabiro.id WHERE `purchase`.`id` = '.$id,'`purchase`.`id`,`purchase`.`tanggal`,`ref`,`biro`.`nama` `biro`,`purchase`.`status`,`purchase`.`purchasing`,`purchase`.`type`,`kabiro`.`nama` `kabiro`,`kabiro`.`nik` `nik_kabiro`,`staff`.`nama` `staff`,`staff`.`nik` `nik_staff`');
		if ($data['purchase']['status'] == 1) {
			redirect('purchase/');
		}
		$data['purchase']['item'] =  (empty($id)) ? null : $this->putem($id);
		$this->load->view('head');
		$this->load->view('form/purchase',$data);
		$this->load->view('foot');
    }

    function submit($id = null){
		/*echo "<pre>";
		print_r($_POST);die();*/
		/*1staff
		2kabiroumum
		3kabiro
		4purchaser
		5rektor
		6wareknonakademik
		7keuangan
		8kakeuangan*/
		// $purchase = array();
		extract($_POST);
    	$ttd = [2 => 'kabiroumum', 3 => 'kabiro', 5 => 'rektor', 6 => 'wareknonakademik', 7 => 'keuangan', 8 => 'kakeuangan', 9 => 'kabag'];
    	foreach ($ttd as $key => $value) {
    		$where = ($key == 2 || $key == 3) ? 'WHERE status = '.$key.' AND id_biro = '.$_SESSION['masuk']['id_biro'].' AND aktiv = 1 ORDER BY tanggal DESC LIMIT 1' : 'WHERE status = '.$key.' AND aktiv = 1 ORDER BY tanggal DESC LIMIT 1' ;
    		$valId = $this->Dml_model->one('pengguna',$where,'id');
    		$purchase[$value] = $valId['id'];
    	}
		$purchase['ref'] = $ref;
		$purchase['type'] = $type;
		$purchase['purchasing'] = $purchasing;
		$purchase['purchaser'] = $_SESSION['masuk']['id'];//4
		$purchase['id_biro'] = $_SESSION['masuk']['id_biro'];
		$purchase['tanggal'] = $this->Dml_model->dates($tanggal);

		if (empty($id)) {
	    	unset($purchase['id']);
		    $lastId = $this->Dml_model->create('purchase',$purchase);
		    $item['id_purchase'] = $lastId;
			
		} else {
		    $this->Dml_model->update('purchase','`id` = '.$id,$purchase);
			$this->deitem(array('id_purchase' => $id));
		    $item['id_purchase'] = $id;
		}
		
	    foreach ($id_barang as $key => $value) {
		    $item['id_barang'] = $value;
		    $item['jumlah'] = $jumlah[$key];
		    $item['harga'] = $harga[$key];
		    $this->item($item);
	    }
		redirect('purchase/');
    }

    function index($bulan, $tahun){
    	if(empty($bulan) || empty($tahun)){
			redirect('purchase/index/'.date('m').'/'.date('Y'));
		}
		$data['param'] = ['tahun' => $tahun, 'bulan' => $bulan];
    	$data['tahun'] = $this->Dml_model->read('purchase','','DISTINCT(YEAR(tanggal)) tahun');
		$data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    	$data['list'] = $this->Dml_model->read('purchase','JOIN biro ON id_biro = biro.id WHERE MONTH(tanggal) = '.$bulan.' AND YEAR(tanggal) = '.$tahun, 'purchase.id, purchasing, type, level, tanggal, ref, status, biro.nama biro, ket');
    	$data['link'] = [['Memo','memo'], ['Permintaan','permintaan'], ['Canvas','canvas'], ['Purchase','purchase'], ['Order','order'], ['Pembayaran','pembayaran'], ['Penerimaan','terima'], ['Validasi','valid'], ['Form Biro','biro']];
    	$this->load->view('head');
		$this->load->view('form/purchaselist',$data);
		$this->load->view('foot');
    }

}