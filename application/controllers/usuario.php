<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Usuario extends CI_Controller {
	function __construct() {
		parent::__construct ();
		/* Carrega o modelo */
		$this->load->model ( 'usuario_model', 'model', TRUE );
	}
	function index() {
		// Valida��o de Session
		if ($this->session->userdata ( 'logged_in' )) {
			
			$this->load->helper ( 'form' );
			$data ['titulo'] = "Cadastro de Usuario";
			$data ['usuario'] = $this->model->listar ();
			
			$this->load->view ( 'includes/header_view.php' );
			$this->load->view ( 'includes/menu_view.php' );
			$this->load->view ( 'usuario_view.php', $data );
			$this->load->view ( 'includes/footer_view.php' );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	function inserir() {
		
		/* Carrega a biblioteca do CodeIgniter respons�vel pela valida��o dos formul�rios */
		$this->load->library ( 'form_validation' );
		
		/* Define as tags onde a mensagem de erro ser� exibida na p�gina */
		$this->form_validation->set_error_delimiters ( '<span>', '</span>' );
		
		/* Define as regras para valida��o */
		$this->form_validation->set_rules ( 'primeiro_nome', 'Nome', 'required|max_length[50]' );
		$this->form_validation->set_rules ( 'ultimo_nome', 'Ultimo Nome', 'required|max_length[50]' );
		$this->form_validation->set_rules ( 'email', 'E-mail', 'trim|required|valid_email|max_length[50]' );
		
		/* Executa a valida��o e caso houver erro chama a fun��o index do controlador */
		if ($this->form_validation->run () === FALSE) {
			$this->index ();
			/* Sen�o, caso sucesso: */
		} else {
			/* Recebe os dados do formul�rio (vis�o) */
			$data ['id_face'] = $this->input->post ( 'id_face' );
			$data ['primeiro_nome'] = $this->input->post ( 'primeiro_nome' );
			$data ['ultimo_nome'] = $this->input->post ( 'ultimo_nome' );
			$data ['email'] = $this->input->post ( 'email' );
			
			/* Carrega o modelo */
			// $this->load->model('usuario_model', 'model', TRUE);
			
			/* Chama a fun��o inserir do modelo */
			if ($this->model->inserir ( $data )) {
				redirect ( 'usuario' );
			} else {
				log_message ( 'error', 'Erro ao inserir o usuario.' );
			}
		}
	}
	function editar($id) {
		
		/* Aqui vamos definir o t�tulo da p�gina de edi��o */
		$data ['titulo'] = "Editar Usuario";
		
		/* Busca os dados do usuario que ser� editada */
		$data ['dados_usuario'] = $this->model->editar ( $id );
		
		/* Carrega a p�gina de edi��o com os dados do usuario */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'usuario_edit', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	function atualizar() {
		
		/* Carrega a biblioteca do CodeIgniter respons�vel pela valida��o dos formul�rios */
		$this->load->library ( 'form_validation' );
		
		/* Define as tags onde a mensagem de erro ser� exibida na p�gina */
		$this->form_validation->set_error_delimiters ( '<span>', '</span>' );
		
		/*
		 * Aqui estou definindo as regras de valida��o do formul�rio, assim como
		 * na fun��o inserir do controlador, por�m estou mudando a forma de escrita
		 */
		$validations = array (
				array (
						'field' => 'primeiro_nome',
						'label' => 'Nome',
						'rules' => 'trim|required|max_length[50]' 
				),
				array (
						'field' => 'ultimo_nome',
						'label' => 'Ultimo Nome',
						'rules' => 'trim|required|max_length[50]' 
				),
				array (
						'field' => 'email',
						'label' => 'E-mail',
						'rules' => 'trim|required|valid_email|max_length[50]' 
				) 
		);
		$this->form_validation->set_rules ( $validations );
		
		/* Executa a valida��o e caso houver erro chama a fun��o editar do controlador novamente */
		if ($this->form_validation->run () === FALSE) {
			$this->editar ( $this->input->post ( 'id' ) );
		} else {
			/* Sen�o obt�m os dados do formul�rio */
			$data ['id_face'] = $this->input->post ( 'id_face' );
			$data ['primeiro_nome'] = ucwords ( $this->input->post ( 'primeiro_nome' ) );
			$data ['ultimo_nome'] = ucwords ( $this->input->post ( 'ultimo_nome' ) );
			$data ['email'] = strtolower ( $this->input->post ( 'email' ) );
			
			/* Executa a fun��o atualizar do modelo passando como par�metro os dados obtidos do formul�rio */
			if ($this->model->atualizar ( $data )) {
				redirect ( 'usuario' );
			} else {
				log_message ( 'error', 'Erro ao atualizar o usuario.' );
			}
		}
	}
	function deletar($id) {
		
		/* Executa a fun��o deletar do modelo passando como par�metro o id do usuario */
		if ($this->model->deletar ( $id )) {
			redirect ( 'usuario' );
		} else {
			log_message ( 'error', 'Erro ao deletar o usuario.' );
		}
	}
}