<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Dashboard extends CI_Controller {
	public function index() {
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'dashboard' );
		$this->load->view ( 'includes/footer_view' );
	}
	function login() {
		$this->form_validation->set_rules ( 'email', 'email', 'trim|required|valid_email|callback__check_login' );
		if ($this->form_validation->run ()) {
			// die('Loguei!');
			$this->load->view ( 'includes/header_view' );
			$this->load->view ( 'login_view' );
			$this->load->view ( 'includes/footer_view' );
		}
	}
	function _check_login($email) {
		if ($this->input->post ( 'senha' )) {
			$this->load->model ( 'usuario_model' );
			$user = $this->usuario_model->get_usuario ( $email, $this->input->post ( 'senha' ) );
			if ($user)
				return true;
		}
		$this->form_validation->set_message ( '_check_login', 'Usuario ou Senha errada(s).' );
		return false;
	}
	function logout() {
		$this->Session->delete ( 'user' );
		$this->Session->destroy ();
		$this->Cookie->delete ( "user" );
		$this->Cookie->destroy ();
		$this->Auth->logout ();
		$this->redirect ( 'login_view' );
		// $this->load->view('login_view');
	}
}
?>