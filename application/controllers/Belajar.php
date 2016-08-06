<?php
class Belajar extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
    }

    function index(){
    	$data = $this->data();
    	echo "<pre>";
        echo json_encode($data);
    }

    function data(){
    	// echo "hi";
        return $this->Dml_model->read('vendor');
        // print_r($data);
    }


    function form(){
        echo '<form method="post" action="'.base_url().'/belajar/submit/">a : <input type="text" name="a"><br>b : <input type="text" name="b"><br><input type="submit"></form>';
    }

    function barang(){
        echo "<pre>";
        $data = $this->Dml_model->read('barang');
        print_r($data);
    }

    function addarray(){
        $edit = 'edit';
        echo "<pre>";
        $where = '';

        $barang = $this->Dml_model->read('barang','LIMIT 3');
        print_r($barang);
        
        foreach ($barang as $key => $value) {
            $where .= ($key == 0) ? $value['id'] : ','.$value['id'];
        }

        echo '<br>'.$where.'<br><br>';

        $vendor = $this->Dml_model->read('harga','JOIN vendor ON id_vendor = vendor.id WHERE id_barang in ('.$where.') GROUP BY id_vendor ORDER BY harga ASC LIMIT 3','vendor.nama vendor,id_vendor,harga.id');

        print_r($vendor);
        echo '<br><br>';

        foreach ($barang as $key => $value) {

            foreach ($vendor as $k => $val) {

                $res = $this->Dml_model->one('harga','WHERE id_barang = '.$value['id'].' AND id_vendor = '.$val['id_vendor'].' ORDER by id_vendor ASC');
                
                $barang[$key]['hrg'][$k] = (empty($res)) ? ['id'=> 0 ,'id_vendor'=> 0 ,'id_barang'=> 0 ,'pembaruan'=> 0 ,'harga'=> 0 ,'aktif'=> 0] : $res ;
                
                if(!empty($edit)){
                    $select = $this->Dml_model->one('harga','JOIN vendor ON id_vendor = vendor.id WHERE id_barang = '.$value['id'].' AND id_vendor = '.$val['id_vendor'].' ORDER by id_vendor ASC','harga.id, id_vendor, vendor.nama vendor');
                    
                    if (!empty($select)) {
                        $barang[$key]['select'][] = $select;
                    }
                }
            }
        }
        print_r($barang);
    }

    function submit(){
        echo "<pre>";
        print_r($_POST);
        unset($_POST['a']);
        echo "<br>";
        print_r($_POST);
    }

    function aray(){
        echo "<pre>";
        $string = '';
        $data1 = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
        print_r($data1);
        echo "<br><br>";
        foreach ($data1 as $key => $value) {
            $string .= ($key == 0) ? $value : ','.$value ;
            echo $string.'<br>';
        }
        echo $string;
        /*$data2 = ['q' => 'w', 'e' => 'r', 't' => 'y', 'u' => 'i', 'o' => 'p'];
        $data3 = [['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'],['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p']];
        $data4 = [['q' => 'w', 'e' => 'r', 't' => 'y', 'u' => 'i', 'o' => 'p'],['q' => 'w', 'e' => 'r', 't' => 'y', 'u' => 'i', 'o' => 'p']];


        echo "1 dimensi default key";
        print_r($data1);
        echo "<br>";
        echo "1 dimensi string key";
        print_r($data2);
        echo "<br>";
        echo "2 dimensi default key";
        print_r($data3);
        echo $data3[0][0];
        echo "<br>";
        echo "2 dimensi string key";
        print_r($data4);*/
    }

}