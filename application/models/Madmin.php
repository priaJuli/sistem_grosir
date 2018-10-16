<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	function insert_data($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}

	function tampil_data($tabel)
	{
		$this->db->select('*');
		$query = $this->db->get($tabel);
		return $query->result();
	}

	function update_data($tabel=null, $idfield=null, $data=null, $id=null)
	{
		$this->db->where($idfield ,$id);
		$this->db->update($tabel, $data);
	}

	function delete_data($tabel=null, $idfield=null, $id=null, $img=null)
	{
		$this->db->where($idfield, $id);
		if($idfield == 'id_user'){
			unlink('./assets/uploads/client/'.$img);
		} else {
			unlink('./application/views/uploads/admin/'.$img);
		}
		$this->db->delete($tabel);
	}
	
	function tampil_data_id($tabel=null, $idfield=null, $id=null)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where($idfield, $id);
		return $this->db->get()->row();
	}
}
