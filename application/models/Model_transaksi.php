<?php
/**
* 
*/
class Model_transaksi extends CI_Model
{
	
	function insert_transaksi($data='', $id='')
    {
        if ($id) 
        {
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi', $data);
        } else {
            $this->db->insert('transaksi', $data);
        }
    }

    function view_transaksi()
    {
        return $this->db->query("SELECT * FROM transaksi")->result();
    }

    function view_by_id($id='')
    {
        return $this->db->query("SELECT * FROM transaksi WHERE id_transaksi='$id'")->row();
    }

    function delete($id=null)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
        
    }	

    function search_blog($title){
        $this->db->like('nama_pelanggan', $title , 'both');
        $this->db->order_by('nama_pelanggan', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pelanggan')->result();
    }

    function search_barang($title){
        $this->db->like('kd_barang', $title , 'both');
        $this->db->order_by('kd_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
    }

    function buat_kode()   {
          $this->db->select('RIGHT(transaksi.kd_transaksi,6) as kode', FALSE);
          $this->db->order_by('kd_transaksi','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('transaksi');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $kodejadi = "TSS-".$kodemax;    // hasilnya  ODJ-9921-0001 dst.
          return $kodejadi;  
    }
  	
}

?>