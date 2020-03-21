<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Inicio extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	function index() {
		// $this->load->helper('form');
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'inicio_view' );
		$this->load->view ( 'includes/footer_view' );
	}
}

?>