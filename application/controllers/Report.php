<?php
class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
    }

    function putem($idpurchase){
		return $this->Dml_model->read('item','LEFT JOIN vendor ON vendor.id = id_vendor JOIN barang ON id_barang = barang.id
			LEFT JOIN harga ON harga.id = item.id_harga
			WHERE id_purchase = '.$idpurchase.' ORDER BY id_barang ASC','item.id, item.id_barang, item.jumlah,item.reg,item.keterangan, barang.nama, barang.merk, barang.spesifikasi,type,item.harga budget,terima,total,vendor.nama vendor, item.id_vendor,nego,harga.harga,"" as "alokasi"');
	}

	function purchase($id){
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN biro ON id_biro = biro.id JOIN pengguna kab ON kab.id = kabiro JOIN pengguna pur ON pur.id = purchaser WHERE purchase.id = '.$id,'purchase.id,purchase.tanggal,ref,biro.nama biro,purchase.status,kab.nama kabiro,kab.nik nik_kabiro,pur.nama staff,pur.nik nik_staff');
		$data['purchase']['item'] = $this->putem($id);
		$this->load->view('head');
		$this->load->view('report/purchase',$data);
		$this->load->view('foot');
	}

	function permintaan($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN biro ON id_biro = biro.id JOIN pengguna kab ON kab.id = kabiro JOIN pengguna pur ON pur.id = purchaser WHERE purchase.id = '.$id,'purchase.id,purchase.tanggal, type, ref, biro.nama biro ,purchase.status, kab.nama kabiro,kab.nik nik_kabiro,pur.nama purchaser,pur.nik nik_purchaser, kab.nama atasan,kab.nik nik_atasan,pur.nama pengaju,pur.nik nik_pengaju ,note');
		$inventaris = $this->Dml_model->read('inventaris','WHERE id_purchase = '.$id,'id');
		$data['inventaris'] = (empty($inventaris)) ? 0 : 1 ;
		$data['purchase']['item'] = $this->putem($id);
		$this->load->view('head');
		$this->load->view('report/permintaan',$data);
		$this->load->view('foot');
	}

	function order($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN pengguna kab ON kab.id = kabiro JOIN pengguna kak ON kak.id = kakeuangan WHERE purchase.id = '.$id,'purchase.id, purchase.to, phone, fax, attn, dates, po, delivery, payment, other, signature, sname, sdate, kak.nama kakeuangan, kak.nik nik_kakeuangan, kab.nama kabiro, kab.nik nik_kabiro, ref');
		$data['purchase']['item'] = $this->putem($id);
		$this->load->view('head');
		$this->load->view('report/order',$data);
		$this->load->view('foot');
	}

	function postord($id){
		$_POST['dates'] = date("Y-m-d",strtotime($_POST['dates']));
		$_POST['sdate'] = date("Y-m-d",strtotime($_POST['sdate']));
		$_POST['level'] = 5;
		$this->Dml_model->update('purchase','id = '.$id,$_POST);
		redirect('report/order/'.$id);
	}

	function pembayaran($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN pengguna pen ON purchaser = pen.id JOIN pengguna war ON wareknonakademik = war.id JOIN pengguna rek ON rektor = rek.id JOIN pengguna keu ON keuangan = keu.id JOIN pengguna kak ON kakeuangan = kak.id WHERE purchase.id = '.$id,'purchase.id,pen.nama pengaju, pen.nik nik_pengaju, war.nama wareknonakademik, war.nik nik_wareknonakademik, rek.nama rektor, rek.nik nik_rektor, keu.nama keuangan, keu.nik nik_keuangan, kak.nama kakeuangan, kak.nik nik_kakeuangan,akun,kepada,dari,nomor,tanggalbayar,perihal,purchase.nama,bank,rekening'); 
		$atasan =  $this->Dml_model->one('pengguna pur','JOIN pengguna ata ON pur.id_atasan = ata.id WHERE pur.nik = '.$data['purchase']['nik_pengaju'],'ata.nama atasan, ata.nik nik_atasan');
		$data['purchase'] = array_replace_recursive($data['purchase'],$atasan);
		$data['purchase']['item'] = $this->putem($id);
/*		foreach ($data['purchase']['item'] as $key => $value) {
			$data['purchase']['item'][$key] = $this->Dml_model->one('harga','WHERE id_vendor = '.$value['id_vendor'].' AND id_barang = '.$value['id_barang']);
		}*/
		/*echo "<pre>";
		print_r($data);die();*/
		$this->load->view('head');
		$this->load->view('report/pembayaran',$data);
		$this->load->view('foot');
	}

	function postpem($id){
		$_POST['tanggalbayar'] = date("Y-m-d",strtotime($_POST['tanggalbayar']));
		$_POST['level'] = 6 ;
		$this->Dml_model->update('purchase','id = '.$id,$_POST);
		redirect('report/pembayaran/'.$id);
	}

	function canvas($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN biro ON id_biro = biro.id JOIN pengguna kab ON kabiro = kab.id JOIN pengguna pur ON purchaser = pur.id WHERE purchase.id = '.$id,'purchase.id,purchase.tanggal,ref,biro.nama biro,purchase.status,kab.nama kabiro,kab.nik nik_kabiro,pur.nama purchaser,pur.nik nik_purchaser,note,ket');

		$data['item'] = $this->putem($id);

		$where = '';
		foreach ($data['item'] as $key => $value) {
			$where .= ($key == 0) ? $value['id_barang'] : ','.$value['id_barang'];
		}
		
		$data['vendor'] = $this->Dml_model->read('harga','JOIN vendor ON id_vendor = vendor.id WHERE id_barang in ('.$where.') GROUP BY id_vendor ORDER BY harga ASC LIMIT 3','vendor.nama vendor,id_vendor,harga.id');

		if(empty($data['vendor'])){
			$this->load->view('head');
			$this->load->view('kosong');
			$this->load->view('foot');
		} else {
			foreach ($data['item'] as $key => $value) {
				foreach ($data['vendor'] as $k => $val) {
					$res = $this->Dml_model->one('harga','WHERE id_barang = '.$value['id_barang'].' AND id_vendor = '.$val['id_vendor'].' ORDER by id_vendor ASC');
					$data['item'][$key]['hrg'][$k] = (empty($res)) ? ['id'=> 0 ,'id_vendor'=> 0 ,'id_barang'=> 0 ,'pembaruan'=> 0 ,'harga'=> 0 ,'aktif'=> 0] : $res ;
					if(!empty($edit)){
						$select = $this->Dml_model->one('harga','JOIN vendor ON id_vendor = vendor.id WHERE id_barang = '.$value['id_barang'].' AND id_vendor = '.$val['id_vendor'].' ORDER by id_vendor ASC','harga.id, id_vendor, vendor.nama vendor');
						if (!empty($select)) {
							$data['item'][$key]['select'][] = $select;
						}
					}
				}

			}
			/*echo "<pre>";
			print_r($data);die();*/
			$this->load->view('head');
			$this->load->view('report/canvas',$data);
			$this->load->view('foot');
		}
	}

	function postcan($id){
		extract($_POST);
		foreach ($id_vendor as $key => $value) {
			// echo $key.' -> '.$value.'<br>';
			$item['id_vendor'] = $value;
			$item['id_harga'] = $id_harga[$key];
			$item['total'] = $total[$key];
			$item['nego'] = $nego[$key];
			$this->Dml_model->update('item','id = '.$key,$item);
		}

		$purchase['ket'] = json_encode($ket) ;
		$purchase['note'] = $note ;
		$purchase['level'] = 4 ;
		$this->Dml_model->update('purchase','id = '.$id,$purchase);
		redirect('report/canvas/'.$id);
	}

	function terima($id = null, $edit = null){
		$data['id'] = $id;
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','WHERE id = '.$id,'id,serah, nik_serah, terima,nik_terima, tanggal_terima');
		$putem = $this->putem($id);
		$inventaris = $this->Dml_model->read('inventaris','WHERE id_purchase = '.$id.' ORDER BY id_barang ASC','id_barang, alokasi');
		$data['purchase']['item'] = (empty($inventaris)) ? $putem : array_replace_recursive($putem, $inventaris);
		$this->load->view('head');
		$this->load->view('report/terima',$data);
		$this->load->view('foot');
	}

	function postter($id){
		// echo "<pre>";print_r($_POST);die();
		extract($_POST);
		$terima['level'] = 7 ;
		$terima['tanggal_terima'] = date("Y-m-d",strtotime($terima['tanggal_terima']));
		$this->Dml_model->update('purchase','id = '.$id,$terima);

		foreach ($alokasi as $key => $value) {
			if(!empty($check)){
				unset($check);
			}
			$check['terima'] = 1;
			$check['reg'] = $reg[$key];
			$check['keterangan'] = $keterangan[$key];
			$this->Dml_model->update('item','id = '.$key,$check);

			unset($check['terima']);

			$check['alokasi'] = $value;
			$check['harga'] = $harga[$key];
			$check['masuk'] = $masuk[$key];
			$check['id_barang'] = $id_barang[$key];
			$check['id_purchase'] = $id_purchase[$key];
			$check['tanggal'] = $terima['tanggal_terima'];
			$check['id_pengguna'] = $_SESSION['masuk']['id'];
			$check['id_biro'] = $_SESSION['masuk']['id_biro'];
			$this->Dml_model->create('inventaris', $check);
		}
		redirect('report/terima/'.$id);
	}

	function valid($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN biro ON id_biro = biro.id JOIN pengguna keu ON keu.id = keuangan JOIN pengguna pur ON pur.id = purchaser WHERE purchase.id = '.$id,'purchase.id,purchase.tanggal,ref,ket,biro.nama biro,dekan,nik_dekan,pustaka,nik_pustaka,purchase.status,keu.nama keuangan,keu.nik nik_keuangan,pur.nama staff,pur.nik nik_staff');
		$data['purchase']['item'] = $this->putem($id);
		$this->load->view('head');
		$this->load->view('report/valid',$data);
		$this->load->view('foot');
	}

	function postval($id){
		$ket = json_decode($_POST['ket'][0],true);
		unset($_POST['ket'][0]);
		$_POST['ket'] = json_encode(array_replace_recursive($_POST['ket'],$ket));
		$_POST['level'] = 8 ;
		$this->Dml_model->update('purchase','id = '.$id,$_POST);
		redirect('report/valid/'.$id);
	}

	function biro($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase','JOIN biro ON id_biro = biro.id JOIN pengguna kab ON kab.id = kabiro JOIN pengguna pur ON pur.id = purchaser WHERE purchase.id = '.$id,'purchase.id, deskripsi, fasilitas, keterangan, estimasi, prioritas, pengadaan ,input,purchase.tanggal,ref,biro.nama biro,purchase.status,kab.nama kabiro,kab.nik nik_kabiro,pur.nama staff,pur.nik nik_staff');
		$this->load->view('head');
		$this->load->view('report/biro',$data);
		$this->load->view('foot');
	}

	function kinerja($id = null, $edit = null){
		$data['id'] = $id;
		$data['edit'] = $edit;
		$data['evaluasi'] = $this->Dml_model->one('evaluasi','RIGHT JOIN vendor ON id_vendor = vendor.id WHERE vendor.id = '.$id,'evaluasi.*, vendor.nama vendor, vendor.id id_vendor');
		if(empty($data['evaluasi']['tanggal']) && $edit != 'edit'){
			redirect('report/kinerja/'.$id.'/edit');
		}
		$data['bobot'] = ['25','20','25','15','15'];
		$data['kategori'] = ['mutu', 'waktu', 'harga', 'bayar', 'respon'];
		$data['kinerja'] = ['Mutu Produk / jasa', 'Waktu Kedatangan', 'Harga', 'Pembayaran', 'Fleksibilitas dan Respon'];
		$data['penilaian'] = [['Melebihi persyaratan yang ditetapkan','Memenuhi persyaratan yang ditetapkan','Material memenuhi sebagian ditetapkan','Tidak memenuhi persyaratan yang ditetapkan'] , ['Sebelum deadline','Tepat waktu','Terlambat 1-7 hari','Terlambat melebihi 7 hari'], ['Lebih murah > 10% dari supplier lain','Lebih murah < 10% dari supplier lain','Sama dari supplier lain','Lebih mahal dari supplier lain'], ['45 hari','30 hari','Kurang dari 30 hari','Tunai'], ['Tanggapan sangat baik dan tindak lanjut memuaskan','Tanggapan cukup baik dan tindak lanjut memuaskan','Tanggapan lambat dan tindak lanjut memuaskan','Tanggapan lambat dan tindak lanjut tidak memuaskan']];
		$this->load->view('head');
		$this->load->view('report/kinerja',$data);
		$this->load->view('foot');
	}

	function check($id = null, $edit = null){
		$data['id'] = $id;
		$data['edit'] = $edit;
		$data['checkx'] = $this->Dml_model->one('evaluasi','RIGHT JOIN vendor ON id_vendor = vendor.id WHERE vendor.id = '.$id,'evaluasi.*, vendor.nama vendor, vendor.id id_vendor');
		// echo"<pre>";print_r($data['checkx']);die();
		if(empty($data['checkx']['ctanggal']) && $edit != 'edit'){
			redirect('report/check/'.$id.'/edit');
		}
		$data['kategori'] = ['cwaktu', 'sesuai', 'jumlah', 'tepat', 'baru', 'fungsi'];
		$data['choice'] = ['Ya', 'Tidak'];
		$data['check'] = ['Apakah barang yang dibeli akan datang sesui dengan waktu yang telah di tentukan','Apakah jenis dan spesifikasi barang yang datang sudah sesuai dengan Purchase Order','Apakah jumlah barang yang diterima sudah sesuai dengan Purchase Order','Apakah barang diterima tepat waktu','Apakah barang di terima dalam kondisi baru','Apakah barang yang diterima sudah berfungsi dengan baik'];
		$this->load->view('head');
		$this->load->view('report/check',$data);
		$this->load->view('foot');
	}

	function postkin($id){
		$type = $_POST['type'];
		$tanggal = ($type == 'kinerja') ? 'tanggal' : 'ctanggal' ;
		unset($_POST['type']);
		$_POST['id_vendor'] = $id;
		if(!empty($_POST[$tanggal])){
			$_POST[$tanggal] = date("Y-m-d",strtotime($_POST[$tanggal]));
		}
		$result = $this->Dml_model->one('evaluasi','WHERE id_vendor = '.$id);
		if(empty($result)){
			$this->Dml_model->create('evaluasi',$_POST);
		} else {
			$this->Dml_model->update('evaluasi','id_vendor = '.$id,$_POST);
		}
		redirect('report/'.$type.'/'.$id);
	}

	function supplier($edit, $tahun, $bulan, $jenis = 0){
		if(empty($bulan) || empty($tahun) || empty($edit)){
			redirect('report/supplier/list/'.date('Y').'/'.date('m'));
		}
		$data['edit'] = $edit ;
		$data['jenis'] = ['Barang / Jasa','Barang','Jasa'];
		$data['param'] = ['edit' => $edit,'tahun' => $tahun, 'bulan' => $bulan, 'jenis' => $jenis];
		$jenis = ($jenis == 0) ? '' : 'AND jenis = '.$jenis ;
		$buat = $this->Dml_model->one('supplier','WHERE tahun = '.$tahun.' AND bulan = '.$bulan,'id, buat, nik_buat, setuju, nik_setuju');
		$data['buat'] = (empty($buat)) ? ['id' => '', 'buat' => '', 'nik_buat' => '', 'setuju' => '', 'nik_setuju' => ''] : $buat ;
		$data['tahun'] = $this->Dml_model->read('evaluasi','','DISTINCT(YEAR(tanggal)) tahun');
		$data['evaluasi'] = $this->Dml_model->read('evaluasi','JOIN vendor ON id_vendor = vendor.id WHERE YEAR(tanggal) = '.$tahun.' AND MONTH(tanggal) = '.$bulan.' '.$jenis,'vendor.id id, nama, kontak, hp, tanggal, jenis, mutu, waktu, harga, bayar, respon, evaluasi, syarat');
		$data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$this->load->view('head');
		$this->load->view('report/supplier',$data);
		$this->load->view('foot');
	}

	function postsup(){
		extract($_POST);
		$result = $this->Dml_model->one('supplier','WHERE tahun = '.$tahun.' AND bulan = '.$bulan);
		if(empty($result)){
			$this->Dml_model->create('supplier',$_POST);
		} else {
			$this->Dml_model->update('supplier','WHERE tahun = '.$tahun.' AND bulan = '.$bulan,$_POST);
		}
		redirect('report/supplier/list/'.date('Y').'/'.date('m'));
	}

	function postmem($id){
		$_POST['level'] = 2;
		$this->Dml_model->update('purchase','id = '.$id,$_POST);
		redirect('report/memo/'.$id);
	}

	function memo($id = null, $edit = null){
		$data['edit'] = $edit;
		$data['purchase'] = $this->Dml_model->one('purchase', 'JOIN biro ON id_biro = biro.id JOIN pengguna kab ON kab.id = kabiro JOIN pengguna pur ON pur.id = purchaser JOIN pengguna kae ON kae.id = kakeuangan JOIN pengguna war ON wareknonakademik = war.id JOIN pengguna kag ON kabag = kag.id JOIN pengguna rek ON rektor = rek.id WHERE purchase.id = '.$id, 'purchase.id, purchase.tanggal, nomor, ref, biro.nama biro, purchase.status, kab.nama atasan, kab.nik nik_atasan, pur.nama pengaju, pur.gelar glr_pengaju, pur.nik nik_pengaju, war.nama wareknonakademik, war.gelar glr_wareknonakademik, war.nik nik_wareknonakademik,  kag.nama kabag, kag.gelar glr_kabag, rek.nama rektor, rek.gelar glr_rektor, rek.nik nik_rektor, kae.nama kakeuangan, kae.gelar glr_kakeuangan, note, nomemo, memo, purchasing');
		$data['purchase']['item'] = $this->putem($id);
		$this->load->view('head');
		$this->load->view('report/memo',$data);
		$this->load->view('foot');
	}

	function inventaris($bulan, $tahun, $jenis){
    	if(empty($bulan) || empty($tahun)){
			redirect('report/inventaris/'.date('m').'/'.date('Y').'/sisa');
		}
		$data['param'] = ['tahun' => $tahun, 'bulan' => $bulan, 'jenis' => $jenis];
		$data['jenis'] = [['label' => 'Barang Masuk', 'value' => 'masuk'], ['label' => 'Barang Keluar', 'value' => 'keluar'], ['label' => 'Sisa Barang', 'value' => 'sisa']];
    	$data['tahun'] = $this->Dml_model->read('inventaris','','DISTINCT(YEAR(tanggal)) tahun');
		$data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$cols = '';
		$where = '';
		$value = '';
		if($jenis == 'sisa'){
			$cols = ', SUM(masuk - keluar) sisa';
			$where = ' GROUP BY id_barang';
		} else {
			$cols = ', '.$jenis.' sisa';
			$value = $jenis.' != 0 AND';
		}

		$data['inventaris'] = $this->Dml_model->read('inventaris','JOIN biro ON biro.id = id_biro JOIN barang ON barang.id = id_barang JOIN pengguna ON pengguna.id = id_pengguna WHERE '.$value.' MONTH(inventaris.tanggal) = '.$bulan.' AND YEAR(inventaris.tanggal) = '.$tahun.$where, 'pengguna.nama pengguna, barang.nama barang, biro.nama biro, inventaris.id, id_purchase, id_barang, inventaris.tanggal, inventaris.keterangan'.$cols);
		$this->load->view('head');
		$this->load->view('report/inventaris',$data);
		$this->load->view('foot');
	}
	
	function stok($id = null, $edit = null){
		$data['id'] = $id;
		$data['edit'] = $edit;
		$this->load->view('head');
		$this->load->view('report/stok',$data);
		$this->load->view('foot');
	}

	function poststo(){
		$q = [['oi'=>'qw','we'=>'aw','si'=>'qf'],['oi'=>'zx','we'=>'xc','si'=>'cvf']];
		$w = [['we'=>'aw','si'=>'iwskdfh'],['we'=>'xc','si'=>'skjdhksddhf']];
		$e = array_replace_recursive($q, $w);
		echo "<pre>";
		print_r($q);
		print_r($w);
		print_r($e);
	}

}

/*revisi
input barang
input purchase
*/
/*
[3]['kabiro']				[1]['kabiro']
[9]['kabag']				[2]['kabag']
[1]['staff']				[3]['staff']
[2]['kabiroumum']			[4]['kabiroumum']
[0]['kabagumum']			[5]['kabagumum']
[4]['purchaser']			[6]['purchaser']
[5]['rektor']				[7]['rektor']
[6]['wareknonakademik']		[8]['wareknonakademik']
[7]['keuangan']				[9]['keuangan']
[8]['kakeuangan']			[0]['kakeuangan']




1 ['staff']
2 ['kabiroumum']
3 ['kabiro']
9 ['kabag']
4 ['purchaser']
5 ['rektor']
6 ['wareknonakademik']
7 ['keuangan']
8 ['kakeuangan']


pembagian penyetujuan report
login
adendum = upload

mcdelivery
14045
*/