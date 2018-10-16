<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_supplier');
	}

	public function index()
	{
		$data = array(
					'nav' 			=> 4, 
					's_master' 		=> 4,
					'title' 		=> 'Master supplier',
					'nav_top'		=> 1,
					'show_supplier' => $this->Model_supplier->view_supplier('supplier'),
					'js'			=> $this->js(),
					'kodeunik' 		=> $this->Model_supplier->buat_kode(),
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/master/Master_supplier');
		$this->load->view('include/footer');
	}

	function input_data()
	{
		$status_update 	= $this->input->post('status_update');
		$kd_supplier 	= $this->input->post('kd_supplier');
		$nama_supplier 	= $this->input->post('nama_supplier');
		$alamat 		= $this->input->post('alamat');
		$telepon 		= $this->input->post('telepon');
		$email 			= $this->input->post('email');
		$keterangan 	= $this->input->post('keterangan');

		
		if ($status_update) {
			$data = array(
					'nama'			=> $nama_supplier, 
					'alamat'		=> $alamat,
					'telepon'		=> $telepon,
					'email'			=> $email,
					'keterangan'	=> $keterangan,
			);
			$this->Model_supplier->insert_supplier($data,$kd_supplier);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		}else{
			$data = array(
					'kd_supplier'	=> $kd_supplier, 
					'nama'			=> $nama_supplier, 
					'alamat'		=> $alamat,
					'telepon'		=> $telepon,
					'email'			=> $email,
					'keterangan'	=> $keterangan,
			);
			$this->Model_supplier->insert_supplier($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Input</b> Data Sukses! </div>';
		}
	
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_supplier');

	}

	function tampil_supplier_edit()
	{
		$id=$this->input->get("kd_supplier");
		$query=$this->Model_supplier->view_by_id($id);
		echo json_encode($query);
	}

	function delete_supplier($id_supplier)
	{
		$this->Model_supplier->delete($id_supplier);
		$msg='<div class="alert alert-warning">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_supplier');
	}

	function js()
	{
		$js = '
			function edit_supplier(kd_supplier)
		    {
		    	var a = "update";
		    	$("#status_update").val(a);
		    	
		        var data = {"kd_supplier":kd_supplier};
		        myFunction();
		        $.ajax({
		            url : "'.base_url().'Master_supplier/tampil_supplier_edit/",
		            type : "GET",
		            data : data,
		            success: function(data){
		                $(window).scrollTop(0);
		                var result=JSON.parse(data);
		                $("#kd_supplier").val(result.kd_supplier);
		                $("#nama_supplier").val(result.nama);
		                $("#alamat").val(result.alamat);
		                $("#telepon").val(result.telepon);
		                $("#email").val(result.email);
		                $("#keterangan").val(result.keterangan);
		            }
		        });
		    }

		    function confirm_del(id_supplier)
	        {
	            bootbox.confirm({ 
	                size: "small",
	                message: "Anda akan menghapus data ini?", 
	                callback: function(result){ 
	                   if (result) 
	                   {
	                       document.location.href = "'.base_url().'Master_supplier/delete_supplier/"+id_supplier;        
	                   }  
	                }
	            })    
	        }

		    $(document).ready(function(){
			    $("#myDIV").hide;
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
