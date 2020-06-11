<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_murid extends CI_Model {

	public function view_murid(){
		$query = $this->db
		->from('murid')
		->get();
        return $query;
	}

	public function get_jenis_murid()
	{
		$query = $this->db->get('murid');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function getAllData($table)
	{
		return $this->db->get($table);
	}

	public function insert_murid($data)
	{
		$this->db->insert('murid',$data);
	}

	public function edit_data_murid($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data_murid($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_murid($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	
}