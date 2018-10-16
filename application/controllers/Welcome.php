<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = array(
					'nav' 		=> 1, 
					's_master' 	=> 1,
					'title' 	=> 'Data Barang',
					'nav_top'	=> 1,
				);

		$this->load->view('include/head');
		$this->load->view('include/header_top');
		$this->load->view('include/header_menu',$data);
		$this->load->view('include/body');
		$this->load->view('include/footer');
	}
}
