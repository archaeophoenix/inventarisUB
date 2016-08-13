<?php
class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
    }

    function index(){
        if (empty($_SESSION['masuk'])) {
            $this->load->view('login');
        } else {
            redirect('purchase/');
        }
    }

    function barang($param = null){
    	$cols = '';
    	switch ($param) {
    		case 'harga':
    			$join = 'JOIN harga ON barang.id = id_barang WHERE aktif = 1 GROUP BY barang.id' ;
    		break;
    		case 'inventaris':
    			$join = 'JOIN inventaris ON barang.id = id_barang GROUP BY barang.id HAVING SUM(masuk-keluar) > 0' ;
    			$cols = ',SUM(masuk-keluar) sisa, masuk, keluar';
    		break;
    		default:
    			$join = '' ; 
			break;
    	}
    	$barang = $this->Dml_model->read('barang',$join,'barang.*'.$cols);
		$term = $_GET[ "term" ];
		$result = array();
		foreach ($barang as $company) {
			$company[ "label" ] = $company["nama"].' ('.$company["merk"].')';
			$companyLabel = $company[ "label" ];
			if ( strpos( strtoupper($companyLabel), strtoupper($term) ) !== false ) {
				array_push( $result, $company );
			}
		}

		echo json_encode($result);
    }

    function status($id){
    	$data = $this->Dml_model->one('purchase','WHERE id = '.$id,'id, status');
    	$status['status'] = ($data['status'] == 1) ? 0 : 1 ;
    	$this->Dml_model->update('purchase','`id` = '.$id,$status);
    	echo json_encode($status);
    }

    function oi (){
    	echo'<pre>';
    	print_r($_SERVER);
    }

}
