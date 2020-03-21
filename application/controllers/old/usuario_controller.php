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
	 * private: Atributos ou métodos declarados como private só podem ser acessados dentro do escopo da própria classe em que foram declarados. Ou seja, não podemos acessar a partir de outras classes descendentes. Essa visibilidade é muito comum em atributos e raro em métodos. Na UML representamos o private com um sinal de subtração (-)
	 *
	 * protected: Atributos ou métodos declarados com protected somente podem ser acessadas dentro da própria classe ou a partir de classes descendentes (herdadas). Na UML representamos essa visibilidade através do sinal de sustenido (#).
	 * public: Atributos ou métodos como public podem ser acessados de forma livre, a partir da própria classe, a partir de classes descendentes e a partir de programas que fazem uso dessa classe. Na UML usamos o sinal de adição (+) para representar a visibilidade public.
	 *
	 * Se não declaramos visibilidade em membros (atributos e métodos) de uma classe automaticamente Será do tipo public.
	 */
	public function index() {
		$this->load->view ( 'home_view' );
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
			redirect ( 'usuario_controller' );
		}
	}
	function apagar_usuario() {
		$this->load->model ( 'usuario_model' );
		if ($this->usuario_model->delete_record ()) {
			$this->session->set_flashdata ( 'msg', 'Registro Apagado!' );
			redirect ( 'usuario_controller' );
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
				redirect ( 'usuario_controller' );
			}
		}
		$this->load->view ( 'update_view', $data );
	}
}
