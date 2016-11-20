<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('_test');
	}

	public function abc($a='',$b='',$c='')
	{
		$data= $a . $b . $c;
		$variable = $this->load->view('_test_abc', array('kata' => $data), TRUE);
		echo $variable;
	}
}
