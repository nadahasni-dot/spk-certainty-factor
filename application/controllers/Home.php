<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('template/landing/landing_header_view');
		$this->load->view('landing/landing_view');
		$this->load->view('template/landing/landing_footer_view');
	}
}
