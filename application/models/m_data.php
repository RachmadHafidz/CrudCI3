<?php 
	//menampilkan data
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}
	//menginput data
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	//menghapus data
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	//mengedit data
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
	//mengupdate data
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}
