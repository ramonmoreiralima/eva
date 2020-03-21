<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Atividade extends CI_Controller {
		
	function __construct() {
		parent::__construct ();
		/* Carrega o modelo */
		$this->load->model ( 'atividade_model', 'model', TRUE );
	}
	function index() {
		/*// Validação de Session
		if ($this->session->userdata ( 'logged_in' )) {
			
			$this->load->helper ( 'form' );
			$data ['titulo'] = "CRUD com CodeIgniter | Cadastro de Atividade";
			$data ['atividade'] = $this->model->get_atividade_by_id ();
			
			$this->load->view ( 'includes/header_view.php' );
			$this->load->view ( 'includes/menu_view.php' );
			$this->load->view ( 'atividade_view.php', $data );
			$this->load->view ( 'includes/footer_view.php' );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}*/
	}
	/* ===== Metodos Auxiliares ===== */
	function editar($id) {
	
		/* Aqui vamos definir o titulo da página de edição */
		$data ['titulo'] = "Editar Atividade";
		$this->set_id_atividade_session($id);
	
		/* Busca os dados da atividade que será editada */
		$data ['dados_atividade'] = $this->model->editar ( $id );
		
		/*inicialização da option*/
		$option = '';
		$tp_atividade = $this->model->editar ( $id );
		foreach ( $tp_atividade as $tp ) {
			$option = $tp->tp_atividade;
		}
		
		/* Carrega Modelo tipo de Evento segundo o que for retornado em Evento */
		if($option == "Deb Aberto"){
			$this->load->model('deb_aberto_model');
			$data ['dados_deb_aberto'] = $this->deb_aberto_model->editar ( $id );
		}
		if($option == "Deb Fechado"){
			$this->load->model('deb_fechado_model');
			$data ['dados_deb_fechado'] = $this->deb_fechado_model->editar ( $id );
		}
		if($option == "Curso"){
			$this->load->model('curso_model');
			$data ['dados_curso'] = $this->curso_model->editar ( $id );
		}
			
		/* Carrega a pagina de edição com os dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'atividade_edit', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	function cadastrar() {
	
		/* Carrega a página de Cadastramento de dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'atividade_insert' );
		$this->load->view ( 'includes/footer_view' );
	}
	function listar_inscrito($id) { /* <- ID do Evento */
		/* Carrega Atividade_evento_model */ 
		$this->load->model('atividade_model');
		// Validação de Session
		if ($this->session->userdata ( 'logged_in' )) {
			
			$this->load->helper ( 'form' );
			$data ['titulo'] = "Minhas Atividades";
			// Chama o metodo que lista todas as atividades pelo $id do evento passado por paramentor
			//$data ['atividade'] = $this->atividade_evento_model->list_atividade_for_id_evento ( $id );
                        $id_face = $this->session->userdata ( 'id_face' );
			$data ['atividade'] = $this->atividade_model->listar_inscrito( $id ,$id_face );
                        
                        //$this->set_id_atividade_session($id);
			$this->set_id_evento_session($id);
			
			$this->load->view ( 'includes/header_view.php' );
			$this->load->view ( 'includes/menu_view.php' );
			$this->load->view ( 'atividade_view.php', $data );
			$this->load->view ( 'includes/footer_view.php' );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
        function listar($id) { /* <- ID do Evento */
		/* Carrega Atividade_evento_model */ 
		$this->load->model('atividade_model');
		// Validação de Session
		if ($this->session->userdata ( 'logged_in' )) {
			
			$this->load->helper ( 'form' );
			$data ['titulo'] = "Atividades do Evento";
			// Chama o metodo que lista todas as atividades pelo $id do evento passado por paramentor
			//$data ['atividade'] = $this->atividade_evento_model->list_atividade_for_id_evento ( $id );
                        $id_face = $this->session->userdata ( 'id_face' );
			$data ['atividade'] = $this->atividade_model->listar( $id );
                        //$this->set_id_atividade_session($id);
			$this->set_id_evento_session($id);
			
			$this->load->view ( 'includes/header_view.php' );
			$this->load->view ( 'includes/menu_view.php' );
			$this->load->view ( 'atividade_view.php', $data );
			$this->load->view ( 'includes/footer_view.php' );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	function listar_nao_inscrito($id) { /* <- ID do Evento */
		/* Carrega Atividade_evento_model */ 
		$this->load->model('atividade_model');
		// Validacao de Session
		if ($this->session->userdata ( 'logged_in' )) {
			
			$this->load->helper ( 'form' );
			$data ['titulo'] = "Atividades Disponiveis Para Inscricao";
			// Chama o metodo que lista todas as atividades pelo $id do evento passado por paramentor
			//$data ['atividade'] = $this->atividade_evento_model->list_atividade_for_id_evento ( $id );
                        $id_face = $this->session->userdata ( 'id_face' );
			$data ['atividade'] = $this->atividade_model->listar_nao_inscrito( $id ,$id_face );
                        //$this->set_id_atividade_session($id);
			$this->set_id_evento_session($id);
			
			$this->load->view ( 'includes/header_view.php' );
			$this->load->view ( 'includes/menu_view.php' );
			$this->load->view ( 'atividade_view.php', $data );
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
		$this->form_validation->set_rules ( 'nome_atividade', 'Nome', 'required|max_length[50]' );
		$this->form_validation->set_rules ( 'data_atividade', 'Data', 'required' );
		$this->form_validation->set_rules ( 'hora_atividade', 'Hora', 'required' );
		$this->form_validation->set_rules ( 'desc_atividade', 'Desc' );
		$this->form_validation->set_rules ( 'link_atividade', 'Link', 'required');
		$this->form_validation->set_rules ( 'status_atividade', 'Status', 'required|max_length[10]' );
		$this->form_validation->set_rules ( 'vagas_atividade', 'Vagas', 'required|max_length[10]' );
		$this->form_validation->set_rules ( 'tp_atividade', 'Vagas', 'required|max_length[20]' );
		
		// $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
		
		/* Executa a validação e caso houver erro chama a fun��o index do controlador */
		if ($this->form_validation->run () === FALSE) {
			$this->index ();
			/* Sen�o, caso sucesso: */
		} else {
			/* Recebe os dados do formulário (vis�o) */
			$nome_atividade = $this->input->post ( 'nome_atividade' );
			$data ['nome_atividade'] = $nome_atividade;
			
			$data_atividade = $this->input->post ( 'data_atividade' );
			$data ['data_atividade'] = $data_atividade;
			
			$hora_atividade = $this->input->post ( 'hora_atividade' );
			$data ['hora_atividade'] = $hora_atividade;
			
			$data ['desc_atividade'] = $this->input->post ( 'desc_atividade' );
			$data ['link_atividade'] = $this->input->post ( 'link_atividade' );
			$data ['status_atividade'] = $this->input->post ( 'status_atividade' );
			$data ['vagas_atividade'] = $this->input->post ( 'vagas_atividade' );
					
			/* Recepção dos dadsos de Forum, Congresso, Simposio ou Semana Academica */
			$tp_atividade = $this->input->post ( 'tp_atividade' );
			$data ['tp_atividade'] = $tp_atividade;
			// $data['email'] = strtolower($this->input->post('email'));
			
			/* Deb Aberto */
			$tp_deb_aberto = $this->input->post ( 'tp_deb_aberto' );
			/* Deb Fechado */
			$tp_deb_fechado = $this->input->post ( 'tp_deb_fechado' );
			$id_face = $this->input->post ( 'id_face' );
			/* Curso */
			$pre_requisito = $this->input->post ( 'pre_requisito' );
			
			/* id_atividade recebe o valor inteiro retornado pela chama da função inserir do modelo
			 * que tem o objetivo de inseriri os dados no modelo e receber o id_atividade que 
			 * acabou de ser cadastrada.  */
			if ($id_atividade = $this->model->inserir ( $data )) {
				
				/* Resgata id_evento da Sessão para Listar novamente */
				$id_evento = $this->session->userdata ('id_eve');
				
				/* Chama a funcao inserir do modelo */
				/* Insert id_atividade e id_evento no modelo atividade_evento */
				$this->load->model('atividade_evento_model');
				if ($this->atividade_evento_model->inserir ( $id_atividade, $id_evento )) {
				
					if($tp_atividade == "Deb Aberto"){
				
						$this->load->model('deb_aberto_model');
						if($this->deb_aberto_model->inserir ( $id_atividade, $tp_deb_aberto )){
							redirect ( 'Atividade/listar_nao_inscrito/'.$id_evento);
						}else {
							log_message ( 'error', 'Erro ao inserir o Deb Aberto.' );
						}
							
					}
					if($tp_atividade == "Deb Fechado"){
							
						$this->load->model('deb_fechado_model');
						if($this->deb_fechado_model->inserir ( $id_atividade, $id_face, $tp_deb_fechado )){
							redirect ( 'Atividade/listar_nao_inscrito/'.$id_evento);
						}else {
							log_message ( 'error', 'Erro ao inserir o Deb Fechado.' );
						}
					}
					if($tp_atividade == "Curso"){
							
						$this->load->model('curso_model');
						if($this->curso_model->inserir ( $id_atividade, $pre_requisito )){
							redirect ( 'Atividade/listar_nao_inscrito/'.$id_evento);
						}else {
							log_message ( 'error', 'Erro ao inserir o Curso.' );
						}
					}else {
							log_message ( 'error', 'Erro ao inserir a AtividadeEvento.' );
						}
				}
				
			} else {
				log_message ( 'error', 'Erro ao inserir o evento.' );
			}
		}
	}
	function atualizar() {
		
		/* Carrega a biblioteca do CodeIgniter respons�vel pela validação dos formulários */
		$this->load->library ( 'form_validation' );
		
		/* Define as tags onde a mensagem de erro ser� exibida na página */
		$this->form_validation->set_error_delimiters ( '<span>', '</span>' );
		
		/*
		 * Aqui estou definindo as regras de valida��o do formulário, assim como
		 * na função inserir do controlador, por�m estou mudando a forma de escrita
		 */
		$validations = array (
				array (
						'field' => 'nome_atividade',
						'label' => 'Nome',
						'rules' => 'trim|required|max_length[50]' 
				),
				array (
						'field' => 'data_atividade',
						'label' => 'Data',
						'rules' => 'trim|required' 
				),
				array (
						'field' => 'hora_atividade',
						'label' => 'Hora',
						'rules' => 'trim|required' 
				),	
                                array (
						'field' => 'link_atividade',
						'label' => 'Link',
						'rules' => 'trim|required' 
				),
				array (
						'field' => 'status_atividade',
						'label' => 'Status',
						'rules' => 'trim|required|max_length[10]' 
				),
				array (
						'field' => 'vagas_atividade',
						'label' => 'Vagas',
						'rules' => 'trim|required|max_length[10]' 
				),
				array (
						'field' => 'tp_atividade',
						'label' => 'Tipo',
						'rules' => 'trim|required|max_length[20]' 
				)  
		);
		$this->form_validation->set_rules ( $validations );
		
		/* Executa a validação e caso houver erro chama a fun��o editar do controlador novamente */
		if ($this->form_validation->run () === FALSE) {
			$this->editar ( $this->input->post ( 'id_evento' ) );
		} else {
			/* Senão obtém os dados do formul�rio */
			$data ['id_atividade'] = $this->session->userdata('id_ativ');
			$data ['nome_atividade'] = ucwords ( $this->input->post ( 'nome_atividade' ) );
			$data ['data_atividade'] = $this->input->post ( 'data_atividade' );
			$data ['hora_atividade'] = $this->input->post ( 'hora_atividade' );
			$data ['desc_atividade'] = $this->input->post ( 'desc_atividade' );
			$data ['link_atividade'] = $this->input->post ( 'link_atividade' );
			$data ['status_atividade'] = ucwords ( $this->input->post ( 'status_atividade' ) );
			$data ['vagas_atividade'] = $this->input->post ( 'vagas_atividade' );
			// $data['email'] = strtolower($this->input->post('email'));
			/* Recepção dos dadsos de Forum, Congresso, Simposio ou Semana Academica */
			$tp_atividade = $this->input->post ( 'tp_atividade' );
			$data ['tp_atividade'] = $tp_atividade;
			// $data['email'] = strtolower($this->input->post('email'));
				
			$data1 ['id_atividade'] = $this->session->userdata('id_ativ');
			
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formul�rio */
			if ($this->model->atualizar ( $data )) {
				/* Resgata id_evento da Sessão para Listar novamente */
				$id_evento = $this->session->userdata ('id_eve');
				
				if($tp_atividade == "Deb Aberto"){
					/* Deb Aberto */
					$data1 ['tp_deb_aberto'] = $this->input->post ( 'tp_deb_aberto' );
					
					$this->load->model('deb_aberto_model');
					if($this->deb_aberto_model->atualizar ( $data1 )){
						redirect ( 'Atividade/listar_nao_inscrito/'.$id_evento);
					}else {
						log_message ( 'error', 'Erro ao inserir o Deb Aberto.' );
					}
				
				}
				if($tp_atividade == "Deb Fechado"){
					/* Deb Fechado */
					$data1 ['tp_deb_fechado'] = $this->input->post ( 'tp_deb_fechado' );
					$data1 ['id_face'] = $this->input->post ( 'id_face' );
					
					$this->load->model('deb_fechado_model');
					if($this->deb_fechado_model->atualizar ( $data1 )){
						redirect ( 'Atividade/listar_nao_inscrito/'.$id_evento);
					}else {
						log_message ( 'error', 'Erro ao inserir o Deb Fechado.' );
					}
				}
				if($tp_atividade == "Curso"){
					/* Curso */
					$data1 ['pre_requisito'] = $this->input->post ( 'pre_requisito' );
					
					$this->load->model('curso_model');
					if($this->curso_model->atualizar ( $data1 )){
						redirect ( 'Atividade/listar_nao_inscrito/'.$id_evento);
					}else {
						log_message ( 'error', 'Erro ao inserir o Curso.' );
					}
				}
				
				
			} else {
				log_message ( 'error', 'Erro ao atualizar o Atividade.' );
			}
		}
	}
	function deletar($id) {
		
		/* Executa a função que deletar do modelo passando como parâmetro o id do evento */
		if ($this->model->deletar ( $id )) {
			/* Resgata id_evento da Sessão para Listar novamente */
				$id = $this->session->userdata ('id_eve');
				redirect ( 'Atividade/listar_nao_inscrito/'.$id);
		} else {
			log_message ( 'error', 'Erro ao deletar o Atividade.' );
		}
	}
	
	function set_id_atividade_session($id) {
		/* Gurada Id do evento para ser Resgatado Futuramente*/
		$this->session->set_userdata ( 'id_ativ', $id );
	}
	function set_id_evento_session($id) {
		/* Gurada Id do evento para ser Resgatado Futuramente*/
		$this->session->set_userdata ( 'id_eve', $id );
	}

}