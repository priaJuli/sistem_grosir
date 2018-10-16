<?php
/**
* 
*/
class Model_barang extends CI_Model
{
	
	function insert_barang($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('id_barang', $id);
            $this->db->update('barang', $data);
        } else {
            $this->db->insert('barang', $data);
        }
    }

    function view_barang()
    {
        return $this->db->query("SELECT * FROM barang")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM barang WHERE id_barang='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
        
    }	
  	
}

?>