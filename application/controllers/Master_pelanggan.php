<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pelanggan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_pelanggan');
	}

	public function index()
	{
		$data = array(
					'nav' 			=> 5, 
					's_master' 		=> 5,
					'title' 		=> 'Master Pelanggan',
					'nav_top'		=> 1,
					'show_pelanggan'=> $this->Model_pelanggan->view_pelanggan('pelanggan'),
					'js'			=> $this->js(),
					'kodeunik' 		=> $this->Model_pelanggan->buat_kode(),
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/master/Master_pelanggan');
		$this->load->view('include/footer');
	}

	function input_data()
	{
		$status_update 	= $this->input->post('status_update');
		$id 			= $this->input->post('kd_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat 		= $this->input->post('alamat');
		$telepon 		= $this->input->post('telepon');
		$keterangan 	= $this->input->post('keterangan');

		if ($status_update) {
			$data = array(
				'nama_pelanggan'=> $nama_pelanggan, 
				'alamat'		=> $alamat,
				'telepon'		=> $telepon,
				'keterangan'	=> $keterangan,
			);
			
			$this->Model_pelanggan->insert_pelanggan($data,$id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		}else{

			$data = array(
				'kd_pelanggan'	=> $id,
				'nama_pelanggan'=> $nama_pelanggan, 
				'alamat'		=> $alamat,
				'telepon'		=> $telepon,
				'keterangan'	=> $keterangan,
			);

			$this->Model_pelanggan->insert_pelanggan($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Input</b> Data Sukses! </div>';
		}
	
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_pelanggan');

	}

	function tampil_pelanggan_edit()
	{
		$id=$this->input->get("kd_pelanggan");
		$query=$this->Model_pelanggan->view_by_id($id);
		echo json_encode($query);
	}

	function delete_pelanggan($id_pelanggan)
	{
		$this->Model_pelanggan->delete($id_pelanggan);
		$msg='<div class="alert alert-warning">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_pelanggan');
	}

	


	function js()
	{
		$js = '
		console.log("cek pertama");
			function edit_pelanggan(kd_pelanggan,status)
		    {
		    	var a = "update";
		    	$("#status_update").val(a);

		        var data = {"kd_pelanggan":kd_pelanggan};
		        myFunction();
		        $.ajax({
		            url : "'.base_url().'Master_pelanggan/tampil_pelanggan_edit/",
		            type : "GET",
		            data : data,
		            success: function(data){
		                $(window).scrollTop(0);
		                var result=JSON.parse(data);
		                $("#kd_pelanggan").val(result.kd_pelanggan);
		                $("#nama_pelanggan").val(result.nama_pelanggan);
		                console.log("cek ");
		                $("#alamat").val(result.alamat);
		                $("#telepon").val(result.telepon);
		                $("#email").val(result.email);
		                $("#keterangan").val(result.keterangan);
		            }
		        });
		    }

		    function confirm_del(id_pelanggan)
	        {
	            bootbox.confirm({ 
	                size: "small",
	                message: "Anda akan menghapus data ini?", 
	                callback: function(result){ 
	                   if (result) 
	                   {
	                       document.location.href = "'.base_url().'Master_pelanggan/delete_pelanggan/"+id_pelanggan;        
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
