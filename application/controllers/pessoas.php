<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Pessoas extends CI_Controller {
	function __construct() {
		parent::__construct ();
		/* Carrega o modelo */
		$this->load->model ( 'Pessoas_model', 'model', TRUE );
	}
	function index() {
		$this->load->helper ( 'form' );
		$data ['titulo'] = "CRUD com CodeIgniter | Cadastro de Pessoas";
		$data ['pessoas'] = $this->model->listar ();
		$this->load->view ( 'pessoas_view.php', $data );
	}
	function inserir() {
		
		/* Carrega a biblioteca do CodeIgniter respons�vel pela valida��o dos formul�rios */
		$this->load->library ( 'form_validation' );
		
		/* Define as tags onde a mensagem de erro ser� exibida na p�gina */
		$this->form_validation->set_error_delimiters ( '<span>', '</span>' );
		
		/* Define as regras para valida��o */
		$this->form_validation->set_rules ( 'nome', 'Nome', 'required|max_length[40]' );
		$this->form_validation->set_rules ( 'email', 'E-mail', 'trim|required|valid_email|max_length[100]' );
		
		/* Executa a valida��o e caso houver erro chama a fun��o index do controlador */
		if ($this->form_validation->run () === FALSE) {
			$this->index ();
			/* Sen�o, caso sucesso: */
		} else {
			/* Recebe os dados do formul�rio (vis�o) */
			$data ['nome'] = $this->input->post ( 'nome' );
			$data ['email'] = $this->input->post ( 'email' );
			
			/* Carrega o modelo */
			$this->load->model ( 'Pessoas_model', 'model', TRUE );
			
			/* Chama a fun��o inserir do modelo */
			if ($this->model->inserir ( $data )) {
				redirect ( 'pessoas' );
			} else {
				log_message ( 'error', 'Erro ao inserir a pessoa.' );
			}
		}
	}
	function editar($id) {
		
		/* Aqui vamos definir o t�tulo da p�gina de edi��o */
		$data ['titulo'] = "CRUD com CodeIgniter | Editar Pessoa";
		
		/* Busca os dados da pessoa que ser� editada */
		$data ['dados_pessoa'] = $this->model->editar ( $id );
		
		/* Carrega a p�gina de edi��o com os dados da pessoa */
		$this->load->view ( 'pessoas_edit', $data );
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
						'field' => 'nome',
						'label' => 'Nome',
						'rules' => 'trim|required|max_length[40]' 
				),
				array (
						'field' => 'email',
						'label' => 'E-mail',
						'rules' => 'trim|required|valid_email|max_length[100]' 
				) 
		);
		$this->form_validation->set_rules ( $validations );
		
		/* Executa a valida��o e caso houver erro chama a fun��o editar do controlador novamente */
		if ($this->form_validation->run () === FALSE) {
			$this->editar ( $this->input->post ( 'id' ) );
		} else {
			/* Sen�o obt�m os dados do formul�rio */
			$data ['id'] = $this->input->post ( 'id' );
			$data ['nome'] = ucwords ( $this->input->post ( 'nome' ) );
			$data ['email'] = strtolower ( $this->input->post ( 'email' ) );
			
			/* Executa a fun��o atualizar do modelo passando como par�metro os dados obtidos do formul�rio */
			if ($this->model->atualizar ( $data )) {
				redirect ( 'pessoas' );
			} else {
				log_message ( 'error', 'Erro ao atualizar a pessoa.' );
			}
		}
	}
	function deletar($id) {
		
		/* Executa a fun��o deletar do modelo passando como par�metro o id da pessoa */
		if ($this->model->deletar ( $id )) {
			redirect ( 'pessoas' );
		} else {
			log_message ( 'error', 'Erro ao deletar a pessoa.' );
		}
	}
}