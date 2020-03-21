<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Dashboard extends CI_Controller {
	
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
	public function verifica_sessao() {
		if ($this->session->userdata ( 'logado' ) == false) {
			redirect ( 'dashboard/login' );
			echo "1";
		}
	}
	public function check_login() {
		echo $email = $this->input->post ( 'email' );
		echo $senha = $this->input->post ( 'senha' );
		
		if (empty ( $email ) and empty ( $senha )) {
			return true;
		} else {
			return false;
		}
	}
	public function index() {
		if ($this->check_login () == true) {
			$this->load->view ( 'includes/header_view' );
			$this->load->view ( 'includes/menu_view' );
			$this->load->view ( 'dashboard' );
			$this->load->view ( 'includes/footer_view' );
		} else {
			$this->load->view ( 'includes/header_view' );
			$this->load->view ( 'login_view' );
			$this->load->view ( 'includes/footer_view' );
		}
	}
	public function logout() {
		$this->session->sess_destroy ();
		redirect ( 'dashboard' );
	}
}
