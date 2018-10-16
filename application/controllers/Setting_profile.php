<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_profile extends CI_Controller {
	

	function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');

	}

	public function index()
	{
		$data = array(
					'nav' => 6, 
					's_setting' => 1,
					'title' => 'Setting Profile',
					'jumlah_data' => $this->db->get('profile')->num_rows(),
				);

		$data['js']	= $this->js();
		$this->load->view('include/head',$data);
		$this->load->view('include/header_top',$data);
		$this->load->view('include/header_menu',$data);
		$this->load->view('pages/setting/profile',$data);
		$this->load->view('include/footer',$data);
	}

	public function cek()
	{
		return $this->db->get('profile')->num_rows();
	}

	function js()
	{
		$js = '
			$(document).ready(function(){
			    $("#hide").click(function(){
			        $("p").hide();
			    });
			    $("#show").click(function(){
			        $("p").show();
			    });
			});
			';
	    return $js;
	}
}
