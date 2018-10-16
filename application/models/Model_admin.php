<?php
/**
* 
*/
class Model_admin extends CI_Model
{
	
	function insert_admin($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('id_admin', $id);
            $this->db->update('admin', $data);
        } else {
            $this->db->insert('admin', $data);
        }
    }

    function view_admin()
    {
        return $this->db->query("SELECT * FROM admin")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM admin WHERE id_admin='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('id_admin', $id);
        $this->db->delete('admin');
        
    }	
  	
}

?>