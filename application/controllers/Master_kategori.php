<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kategori');
	}

	public function index()
	{
		$data = array(
					'nav' 		=> 2, 
					's_master' 	=> 2,
					'title' 	=> 'Master Kategori',
					'nav_top'	=> 1,
					'show_kategori' => $this->Model_kategori->view_kategori('kategori'),
					'js'		=> $this->js(),
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/master/Master_kategori');
		$this->load->view('include/footer');
	}

	function input_data()
	{
		$nama_kategori = $this->input->post('nama_kategori');
		$id = $this->input->post('id_kategori');

		$data = array('nama_kategori' => $nama_kategori, );

		if ($id) {
			$this->Model_kategori->insert_kategori($data,$id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		}else{
			$this->Model_kategori->insert_kategori($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Input</b> Data Sukses! </div>';
		}
	
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_kategori');

	}

	function tampil_kategori_edit()
	{
		$id=$this->input->get("id_kategori");
		$query=$this->Model_kategori->view_by_id($id);
		echo json_encode($query);
	}

	function delete_kategori($id_kategori)
	{
		$this->Model_kategori->delete($id_kategori);
		$msg='<div class="alert alert-warning">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_kategori');
	}

	function js()
	{
		$js = '
			function edit_kategori(id_kategori)
		    {
		        var data = {"id_kategori":id_kategori};
		        myFunction();
		        $.ajax({
		            url : "'.base_url().'Master_kategori/tampil_kategori_edit",
		            type : "GET",
		            data : data,
		            success: function(data){
		                $(window).scrollTop(0);
		                var result=JSON.parse(data);
		                $("#id_kategori").val(result.id_kategori);
		                $("#nama_kategori").val(result.nama_kategori);
		            }
		        });
		    }

		    function confirm_del(id_kategori)
	        {
	            bootbox.confirm({ 
	                size: "small",
	                message: "Anda akan menghapus data ini?", 
	                callback: function(result){ 
	                   if (result) 
	                   {
	                       document.location.href = "'.base_url().'Master_kategori/delete_kategori/"+id_kategori;        
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
