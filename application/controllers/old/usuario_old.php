<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login_controller extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/*
	 * private: Atributos ou métodos declarados como private só podem ser acessados dentro do escopo da própria classe em que foram declarados. Ou seja, não podemos acessar a partir de outras classes descendentes. Essa visibilidade é muito comum em atributos e raro em métodos. Na UML representamos o private com um sinal de subtração (-)
	 *
	 * protected: Atributos ou métodos declarados com protected somente podem ser acessadas dentro da própria classe ou a partir de classes descendentes (herdadas). Na UML representamos essa visibilidade através do sinal de sustenido (#).
	 * public: Atributos ou métodos como public podem ser acessados de forma livre, a partir da própria classe, a partir de classes descendentes e a partir de programas que fazem uso dessa classe. Na UML usamos o sinal de adição (+) para representar a visibilidade public.
	 *
	 * Se não declaramos visibilidade em membros (atributos e métodos) de uma classe automaticamente Será do tipo public.
	 */
	public function index() {
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'login_view' );
		$this->load->view ( 'includes/footer_view' );
	}
	function login() {
		$this->form_validation->set_rules ( 'email', 'email', 'trim|required|valid_email|callback__check_login' );
		if ($this->form_validation->run ()) {
			// die('Loguei!');
			$this->load->view ( 'includes/header_view' );
			$this->load->view ( 'includes/menu_view' );
			$this->load->view ( 'dashboard' );
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
