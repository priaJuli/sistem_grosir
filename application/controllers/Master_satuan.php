<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_satuan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_satuan');
	}

	public function index()
	{
		$data = array(
					'nav' 			=> 3, 
					's_master' 		=> 3,
					'title' 		=> 'Master Satuan',
					'nav_top'		=> 1,
					'show_satuan' => $this->Model_satuan->view_satuan('satuan'),
					'js'			=> $this->js(),
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/master/Master_satuan');
		$this->load->view('include/footer');
	}

	function input_data()
	{
		$nama_satuan = $this->input->post('nama_satuan');
		$id = $this->input->post('id_satuan');

		$data = array('nama_satuan' => $nama_satuan, );

		if ($id) {
			$this->Model_satuan->insert_satuan($data,$id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		}else{
			$this->Model_satuan->insert_satuan($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Input</b> Data Sukses! </div>';
		}
	
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_satuan');

	}

	function tampil_satuan_edit()
	{
		$id=$this->input->get("id_satuan");
		$query=$this->Model_satuan->view_by_id($id);
		echo json_encode($query);
	}

	function delete_satuan($id_satuan)
	{
		$this->Model_satuan->delete($id_satuan);
		$msg='<div class="alert alert-warning">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->index($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_satuan');
	}

	function js()
	{
		$js = '
			function edit_satuan(id_satuan)
		    {
		        var data = {"id_satuan":id_satuan};
		        myFunction();
		        $.ajax({
		            url : "'.base_url().'Master_satuan/tampil_satuan_edit",
		            type : "GET",
		            data : data,
		            success: function(data){
		                $(window).scrollTop(0);
		                var result=JSON.parse(data);
		                $("#id_satuan").val(result.id_satuan);
		                $("#nama_satuan").val(result.nama_satuan);
		            }
		        });
		    }

		    function confirm_del(id_satuan)
	        {
	            bootbox.confirm({ 
	                size: "small",
	                message: "Anda akan menghapus data ini?", 
	                callback: function(result){ 
	                   if (result) 
	                   {
	                       document.location.href = "'.base_url().'Master_satuan/delete_satuan/"+id_satuan;        
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
