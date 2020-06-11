<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

	public function view_peminjaman(){
		$query = $this->db
		->from('peminjaman')
		->join('murid', 'murid.murid_nip = peminjaman.nip_murid')
		->get();
        return $query;
	}

	public function insert_peminjaman($data)
	{
		$this->db->insert('peminjaman',$data);
	}

	public function insert_peminjaman_dtl($data)
	{
		$this->db->insert('peminjaman_detail',$data);
	}


    public function dd_murid()
	{
		$query = $this->db->get('murid');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_detail1($table,$id_table,$id) {
		$this->db->where($id_table,$id);
		$query = $this->db->get($table);
		$isi=$query->row_array();
		return $isi;
		// return $query->result();
	}
	function get_detail2($table,$id_table,$id) {
		$this->db->where($id_table,$id);
		$query =$this->db
		->from($table)
		->join('buku', 'buku.buku_id = peminjaman_detail.buku_id_d')
		->get();
		return $query->result();
	}


}