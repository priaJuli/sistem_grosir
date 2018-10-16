<?php
/**
* 
*/
class Model_kategori extends CI_Model
{
	
	function insert_kategori($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('id_kategori', $id);
            $this->db->update('kategori', $data);
        } else {
            $this->db->insert('kategori', $data);
        }
    }

    function view_kategori()
    {
        return $this->db->query("SELECT * FROM kategori ORDER BY id_kategori")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
        
    }	
  	
}

?>