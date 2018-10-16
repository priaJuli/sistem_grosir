<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_transaksi');
		$this->load->model('Model_barang');
		$this->load->model('Model_kategori');
		$this->load->model('Model_supplier');
		$this->load->model('Model_satuan');
	}

	public function index()
	{
		$data = array(
					'nav' 			=> 8, 
					'title' 		=> 'Transaksi',
					'show_barang'	=> $this->Model_barang->view_barang('barang'),
					'js'			=> $this->js(),
					'kategori'		=> $this->Model_kategori->view_kategori('kategori'),
					'satuan'		=> $this->Model_satuan->view_satuan('satuan'),
					'supplier'		=> $this->Model_supplier->view_supplier('supplier'),
					'kodeunik' 		=> $this->Model_transaksi->buat_kode(),
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/transaksi/transaksi');
		$this->load->view('include/footer');
	}

	function input_data()
	{
		$id 			= $this->input->post('id_barang');
		$kd_barang		= $this->input->post('kd_barang');
		$kd_supplier	= $this->input->post('kd_supplier');
		$nama_barang	= $this->input->post('nama_barang');
		$kategori 		= $this->input->post('kategori');
		$harga_beli 	= $this->input->post('harga_beli');
		$harga_jual 	= $this->input->post('harga_jual');
		$satuan 		= $this->input->post('satuan');
		$stok 			= $this->input->post('stok');
		$tanggal		= $this->input->post('tanggal_input');
		$keterangan		= $this->input->post('keterangan');

		$data = array(
					'kd_barang'		=> $kd_barang, 
					'kd_supplier'	=> $kd_supplier, 
					'nama_barang'	=> $nama_barang, 
					'kategori'		=> $kategori,
					'satuan'		=> $satuan,
					'harga_beli'	=> $harga_beli,
					'harga_jual'	=> $harga_jual,
					'stok'			=> $stok,
					'tanggal_input'	=> $tanggal,
					'keterangan'	=> $keterangan,
		);

		if ($id) {
			$this->Model_barang->insert_barang($data,$id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		}else{
			$this->Model_barang->insert_barang($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Input</b> Data Sukses! </div>';
		}
	
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('transaksi');

	}

	function tampil_barang_edit()
	{
		$id=$this->input->get("kd_barang");
		$query=$this->Model_barang->view_by_id($id);
		echo json_encode($query);
	}

	function delete_barang($id_barang)
	{
		$this->Model_barang->delete($id_barang);
		$msg='<div class="alert alert-warning">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('transaksi');
	}

	function get_autocomplete_pelanggan(){
        if (isset($_GET['term'])) {
            $result = $this->Model_transaksi->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_pelanggan;
                echo json_encode($arr_result);
            }
        }
    }

    function get_autocomplete_barang(){
        if (isset($_GET['term'])) {
            $result = $this->Model_transaksi->search_barang($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->kd_barang;
                echo json_encode($arr_result);
            }
        }
    }

    function search(){
        $title=$this->input->get('title');
        $data['data']=$this->blog_model->search_blog($title);
 
        $this->load->view('search_view',$data);
    }

	function js()
	{
		$js = '
			function edit_barang(kd_barang)
		    {
		        var data = {"kd_barang":kd_barang};
		        document.getElementById("kd_barang").readOnly = true;
		        myFunction();
		        $.ajax({
		            url : "'.base_url().'transaksi/tampil_barang_edit/",
		            type : "GET",
		            data : data,
		            success: function(data){
		                $(window).scrollTop(0);
		                var result=JSON.parse(data);
		                $("#id_barang").val(result.id_barang);
		                $("#kd_barang").val(result.kd_barang);
		                $("#kd_supplier").val(result.kd_supplier);
		                $("#nama_barang").val(result.nama_barang);
		                $("#kategori").val(result.kategori);
		                $("#satuan").val(result.satuan);
		                $("#harga_beli").val(result.harga_beli);
		                $("#harga_jual").val(result.harga_jual);
		                $("#stok").val(result.stok);
		                $("#tanggal_input").val(result.tanggal_input);
		                $("#keterangan").val(result.keterangan);
		            }
		        });
		    }

		    function confirm_del(id_barang)
	        {
	            bootbox.confirm({ 
	                size: "small",
	                message: "Anda akan menghapus data ini?", 
	                callback: function(result){ 
	                   if (result) 
	                   {
	                       document.location.href = "'.base_url().'transaksi/delete_barang/"+id_barang;        
	                   }  
	                }
	            })    
	        }

		    $(document).ready(function(){
			    $("#myDIV").hide;
			    $("#sub_title").hide;

			    $( "#nama_pelanggan" ).autocomplete({
	              source: "'.base_url().'transaksi/get_autocomplete_pelanggan/"
	            });

	            $("#kode_barang").autocomplete({
	                source: "'.base_url().'transaksi/get_autocomplete_barang/"
	      
	            });

			});

			function hide_form(){
				var x = document.getElementById("myDIV");
		        x.style.display = "none";
			}

			function myFunction() {
			    var x = document.getElementById("myDIV");
			    	

			    if (x.style.display === "none") {
			        x.style.display = "block";
			    }
			}
			';
	    return $js;
	}
}
