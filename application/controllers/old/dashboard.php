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
	 * private: Atributos ou m�todos declarados como private s� podem ser acessados dentro do escopo da pr�pria classe em que foram declarados. Ou seja, n�o podemos acessar a partir de outras classes descendentes. Essa visibilidade � muito comum em atributos e raro em m�todos. Na UML representamos o private com um sinal de subtra��o (-)
	 *
	 * protected: Atributos ou m�todos declarados com protected somente podem ser acessadas dentro da pr�pria classe ou a partir de classes descendentes (herdadas). Na UML representamos essa visibilidade atrav�s do sinal de sustenido (#).
	 * public: Atributos ou m�todos como public podem ser acessados de forma livre, a partir da pr�pria classe, a partir de classes descendentes e a partir de programas que fazem uso dessa classe. Na UML usamos o sinal de adi��o (+) para representar a visibilidade public.
	 *
	 * Se n�o declaramos visibilidade em membros (atributos e m�todos) de uma classe automaticamente Ser� do tipo public.
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
