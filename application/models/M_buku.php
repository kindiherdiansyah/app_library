<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function view_buku(){
		$query = $this->db
		->from('buku')
		->get();
        return $query;
	}

	public function get_jenis_buku()
	{
		$query = $this->db->get('buku');
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

	public function insert_buku($data)
	{
		$this->db->insert('buku',$data);
	}

	public function edit_data_buku($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data_buku($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_buku($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	
}