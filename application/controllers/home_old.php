<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	// we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
	function __construct() {
		parent::__construct ();
	} 
	function index() {
		// Registrado
		if ($this->session->userdata ( 'logged_in' )) {
			$session_data = $this->session->userdata ( 'logged_in' );
			$data ['primeiro_nome'] = $session_data ['primeiro_nome'];
			$data ['id_face'] = $session_data ['id_face'];
			// Envia e Recebe da Session
			$this->session->set_userdata ( $data );
			$this->session->userdata ( 'primeiro_nome' );
			$this->session->userdata ( 'id_face' );
			
			$this->load->view ( 'includes/header_view' );
			$this->load->view ( 'includes/menu_view' );
			$this->load->view ( 'home_view' );
			$this->load->view ( 'includes/footer_view' );
		} else {
			// N�o Registrado
			redirect ( 'login', 'refresh' );
		}
	}
	function verifica_sessao() {
		if ($this->session->userdata ( 'logged_in' ) == false) {
			redirect ( 'login' );
		}
	}
	function logout() {
		$this->session->unset_userdata ( 'logged_in' );
		session_destroy ();
		redirect ( 'login', 'refresh' );
	}
}
?>