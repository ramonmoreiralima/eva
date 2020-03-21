<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Home extends CI_Controller {
	
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
	public function index() {
		// $this->load->view('welcome_message');
		// echo("Tutorial");
		// $usuario="Ramon Moreira Lima";
		// $this->bemvindoUsuario($usuario);
		/*
		 * $data= array(
		 * 'titulo'=>'Tutorial',
		 * 'usuario'=>'Ramon Lima'
		 * );
		 */
		// carragamento automatico no config/autoload.php
		// $this->load->helper('form');
		// $this->load->model('usuario_model');
		// $data['usuarios'] = $this->usuario_model->get_all();
		// $this->load->view('main_view',$data);
		$this->load->view ( 'login_view' );
	}
	function create_usuario() {
		$this->load->model ( 'usuario_model' );
		$data = array (
				'nome' => $this->input->post ( 'nome' ),
				'email' => $this->input->post ( 'email' ),
				'senha' => $this->input->post ( 'senha' ) 
		);
		if ($this->usuario_model->add_record ( $data )) {
			$this->session->set_flashdata ( 'msg', 'Criado com Sucesso!' );
			redirect ( 'maincontroller' );
		}
	}
	function apagar_usuario() {
		$this->load->model ( 'usuario_model' );
		if ($this->usuario_model->delete_record ()) {
			$this->session->set_flashdata ( 'msg', 'Registro Apagado!' );
			redirect ( 'maincontroller' );
		} else {
			
			die ( 'Deu erro!!' );
		}
	}
	function editar_usuario($id) {
		$this->load->model ( 'usuario_model' );
		$data ['usuario'] = $this->usuario_model->get_by_id ( $id );
		$this->form_validation->set_rules ( 'nome', 'nome', 'trim|required' );
		if ($this->form_validation->run ()) {
			$_POST ['id'] = $id;
			if ($this->usuario_model->update_record ( $_POST )) {
				redirect ( 'maincontroller' );
			}
		}
		$this->load->view ( 'update_view', $data );
	}
	function login() {
		$this->form_validation->set_rules ( 'email', 'email', 'trim|required|valid_email|callback__check_login' );
		if ($this->form_validation->run ()) {
			die ( 'Loguei!' );
		}
		$this->load->view ( 'login_view' );
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
}
