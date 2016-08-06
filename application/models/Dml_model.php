<?php
class Dml_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function field($table){
    	return $this->db->query("DESCRIBE ".$table)->result_array();
    }

    function create($table, $data = array()){
    	if(empty($data)){
    		$Field = $this->field($table);
            foreach($Field as $Fields){
                if($Fields['Type'] != 'timestamp'){
                    $data[$Fields['Field']] = $_REQUEST[$Fields['Field']];
                }
            }
    	}
    	$this->db->insert($table, $data);
    	return $this->db->insert_id();
    }

    function read($table, $condition = null, $fields = "*"){
    	return $this->db->query("SELECT $fields FROM $table $condition")->result_array();
    }

    function update($table,$where,$data){
    	if(empty($data)){
    		$Field = $this->field($table);
            foreach($Field as $Fields){
                if($Fields['Type'] != 'timestamp'){
                    $data[$Fields['Field']] = $_POST[$Fields['Field']];
                }
            }
    	}
        $this->db->update($table, $data, $where);
    }

    function delete($table, $where){
        $this->db->delete($table, $where); 
    }

    function upload($data, $url = null, $rename = null){
        $files = $_FILES[$data];
        $name = $files['name'];
        move_uploaded_file($files['tmp_name'], "$url/".$name);
        if (!is_null($rename)) {
            $tipe = explode(".", $name);
            $rename = $rename.".".end($tipe);
            rename("$url/".$name, "$url/".$rename);
            $files['name'] = $rename;
            $name = $rename;
        }
        chmod("$url/".$name, 0777);
        return $files;
    }

    function one($table, $condition = null, $fields = "*"){
        return $this->db->query("SELECT $fields FROM $table $condition")->row_array();
    }

    function dates($data){
        $date = date("Y-m-d",strtotime($data));
        return $date;
    }

    /*function reading($table, $id = null){
        $where = (empty($id)) ? 'ORDER BY id DESC' : 'WHERE id = '.$id;
        $type = (empty($id)) ? 'read' : 'one';
        return $this->{$type}($table,$where);
    }*/

}