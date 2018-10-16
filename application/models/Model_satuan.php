<?php
/**
* 
*/
class Model_satuan extends CI_Model
{
	
	function insert_satuan($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('id_satuan', $id);
            $this->db->update('satuan', $data);
        } else {
            $this->db->insert('satuan', $data);
        }
    }

    function view_satuan()
    {
        return $this->db->query("SELECT * FROM satuan order by id_satuan")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM satuan WHERE id_satuan='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('id_satuan', $id);
        $this->db->delete('satuan');
        
    }	
  	
}

?>