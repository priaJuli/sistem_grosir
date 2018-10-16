<?php
/**
* 
*/
class Model_pelanggan extends CI_Model
{
	
	function insert_pelanggan($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('kd_pelanggan', $id);
            $this->db->update('pelanggan', $data);
        } else {
            $this->db->insert('pelanggan', $data);
        }
    }

    function view_pelanggan()
    {
        return $this->db->query("SELECT * FROM pelanggan")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM pelanggan WHERE kd_pelanggan='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('kd_pelanggan', $id);
        $this->db->delete('pelanggan');
        
    }	

  	function buat_kode()   {
          $this->db->select('RIGHT(pelanggan.kd_pelanggan,4) as kode', FALSE);
          $this->db->order_by('kd_pelanggan','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
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
          $kodejadi = "PL-947-".$kodemax;    // hasilnya  ODJ-9921-0001 dst.
          return $kodejadi;  
    }
}

?>