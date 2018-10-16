<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin');
	}

	public function index()
	{
		$data = array(
					'nav' 			=> 6, 
					's_master' 		=> 6,
					'title' 		=> 'Master admin',
					'nav_top'		=> 1,
					'show_admin' => $this->Model_admin->view_admin('admin'),
					'js'			=> $this->js(),
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/master/Master_admin');
		$this->load->view('include/footer');
	}

	function input_data()
	{
		$id 		= $this->input->post('id_admin');
		$nama_admin = $this->input->post('nama_admin');
		$nik 		= $this->input->post('nik');
		$jabatan	= $this->input->post('jabatan');
		$password 	= $this->input->post('password');

		$data = array(
					'nik'			=> $nik, 
					'nama_admin'	=> $nama_admin, 
					'jabatan'		=> $jabatan,
					'password'		=> $password,
		);

		if ($id) {
			$this->Model_admin->insert_admin($data,$id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		}else{
			$this->Model_admin->insert_admin($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Input</b> Data Sukses! </div>';
		}
	
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_admin');

	}

	function tampil_admin_edit()
	{
		$id=$this->input->get("id_admin");
		$query=$this->Model_admin->view_by_id($id);
		echo json_encode($query);
	}

	function delete_admin($id_admin)
	{
		$this->Model_admin->delete($id_admin);
		$msg='<div class="alert alert-warning">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_admin');
	}

	function js()
	{
		$js = '
			function edit_admin(id_admin)
		    {
		        var data = {"id_admin":id_admin};
		        myFunction();
		        $.ajax({
		            url : "'.base_url().'Master_admin/tampil_admin_edit/",
		            type : "GET",
		            data : data,
		            success: function(data){
		                $(window).scrollTop(0);
		                var result=JSON.parse(data);
		                $("#id_admin").val(result.id_admin);
		                $("#nik").val(result.nik);
		                $("#nama_admin").val(result.nama_admin);
		                $("#jabatan").val(result.jabatan);
		                $("#password").val(result.password);
		            }
		        });
		    }

		    function confirm_del(id_admin)
	        {
	            bootbox.confirm({ 
	                size: "small",
	                message: "Anda akan menghapus data ini?", 
	                callback: function(result){ 
	                   if (result) 
	                   {
	                       document.location.href = "'.base_url().'Master_admin/delete_admin/"+id_admin;        
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
