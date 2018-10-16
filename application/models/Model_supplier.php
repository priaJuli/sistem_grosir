<?php
/**
* 
*/
class Model_supplier extends CI_Model
{
	
	function insert_supplier($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('kd_supplier', $id);
            $this->db->update('supplier', $data);
        } else {
            $this->db->insert('supplier', $data);
        }
    }

    function view_supplier()
    {
        return $this->db->query("SELECT * FROM supplier")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM supplier WHERE kd_supplier='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('kd_supplier', $id);
        $this->db->delete('supplier');
        
    }	
  	
    function buat_kode()   {
          $this->db->select('RIGHT(supplier.kd_supplier,4) as kode', FALSE);
          $this->db->order_by('kd_supplier','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('supplier');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $kodejadi = "SPL-434-".$kodemax;    // hasilnya  ODJ-9921-0001 dst.
          return $kodejadi;  
    }
}

?>