<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	// we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
	function __construct() {
		parent::__construct ();
		/* Carrega o modelo */
		$this->load->model ( 'evento_model', 'model', TRUE );
	}
	function index() { 
		// Validação de Session
		if ($this->session->userdata ( 'logged_in' )) {
			$session_data = $this->session->userdata ( 'logged_in' );
			$data ['primeiro_nome'] = $session_data ['primeiro_nome'];
			$data ['id_face'] = $session_data ['id_face'];
                        // Envia e Recebe da Session
			$this->session->set_userdata ( $data );
			$this->session->userdata ( 'primeiro_nome' );
			$this->session->userdata ( 'id_face' );
                        
			$this->load->helper ( 'form' );
			$data ['titulo'] = "Cadastro de Evento";
			//$data ['evento'] = $this->model->listar ();
                        $id = $this->session->userdata ( 'id_face' );
			$data ['evento'] = $this->model->listar_nao_inscrito ($id);
                        $data ['evento1'] = $this->model->listar_recentes ();
			
			$this->load->view ( 'includes/header_view.php' );
			$this->load->view ( 'includes/menu_view.php' );
			$this->load->view ( 'home_view.php', $data );
			$this->load->view ( 'includes/footer_view.php' );
		} else {
			// If no session, redirect to login page
			redirect ( 'login', 'refresh' );
		}
	}
	
	function editar($id) {
	
		/* Aqui vamos definir o titulo da página de edição */
		$data ['titulo'] = "Editar Evento";
		$this->set_id_evento_session($id);
		
		/* Carrega Area model */
		$this->load->model('area_model');
		$areas = $this->area_model->listar_area ();
		/*inicialização da option*/
		$option = '';
		/* Alimenta array com os valores de area */
		foreach ( $areas as $linha ) {
			$option .= "<option value='$linha->desc_area'>$linha->desc_area</option>";
		}
		$data ['area'] = $option;
		
		/* Busca os dados do evento que sera editada */
		$data ['dados_evento'] = $this->model->editar ( $id ); 
		
		//$tp_evento = $this->model->get_tp_evento_by_id ( $id );
		$tp_evento = $this->model->editar ( $id ); 
		foreach ( $tp_evento as $tp ) {
			$option = $tp->tp_evento;
		}
		/* Carrega Modelo tipo de Evento segundo o que for retornado em Evento */
		if($option == "Fórum"){
			//echo"Forum";
			$this->load->model('forum_model');
			$data ['dados_forum'] = $this->forum_model->editar ( $id );
		}
		if($option == "Congresso"){
			//echo"Congresso";
			$this->load->model('congresso_model');
			$data ['dados_congresso'] = $this->congresso_model->editar ( $id );
		}
		if($option == "Simpósio"){
			//echo"Simpósio";
			$this->load->model('simposio_model');
			$data ['dados_simposio'] = $this->simposio_model->editar ( $id );
		} 
		if($option == "Semana Acadêmica"){
			//echo"Semana Acadêmica";
			$this->load->model('semana_academica_model');
			$data ['dados_semana_academica'] = $this->semana_academica_model->editar ( $id );
		}
		
		/* Carrega a página de edição com os dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'evento_edit', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	function cadastrar() {
	
		/* Carrega a página de Cadastramento de dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'evento_insert' );
		$this->load->view ( 'includes/footer_view' );
	}
		
	function inserir() {

		/* Carrega a biblioteca do CodeIgniter respons�vel pela valida��o dos formul�rios */
		$this->load->library ( 'form_validation' );
		
		/* Define as tags onde a mensagem de erro ser� exibida na p�gina */
		$this->form_validation->set_error_delimiters ( '<span>', '</span>' );
		
		/* Define as regras para valida��o */
		$this->form_validation->set_rules ( 'nome_evento', 'Nome', 'required|max_length[50]' );
		$this->form_validation->set_rules ( 'edicao_evento', 'Edicao', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'status_evento', 'Status', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'inicio_evento', 'Inicio', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'fim_evento', 'Fim', 'required|max_length[15]' );
		$this->form_validation->set_rules ( 'dia_up_mat_evento', 'Dia Upload', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'ambito_evento', 'Ambito', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'area_evento', 'Area', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'cnpj_evento', 'Cnpj', 'required|max_length[20]' );
		$this->form_validation->set_rules ( 'tp_evento', 'Tipo', 'required|max_length[20]' );
		// $this->form_validation->set_rules('dia_up_mat_evento','Dia Upload','callback_checkDateFormat');
		
		/* Tipo Evento */
		//$this->form_validation->set_rules ( 'tp_evento', 'Tipo', 'required' );
		/* Forum */
		//$this->form_validation->set_rules ( 'regulamento_forum', 'Regulameto', 'required' );
		//$this->form_validation->set_rules ( 'conclusao_forum', 'Conclusao', 'required' );
		/* Congresso */
		//$this->form_validation->set_rules ( 'ata_congresso', 'Ata', 'required' );
		/* Simposio */
		//$this->form_validation->set_rules ( 'impressao_simposio', 'Impressao', 'required' );
		/* Semana Academica */
		//$this->form_validation->set_rules ( 'categoria', 'Categoria', 'required' );
		
		// $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
				
		/* Executa a Validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run () === FALSE) {
			$this->index ();
			/* Senão, caso sucesso: */
		} else {
			/* Recebe os dados do formulário (visão) */
			$data ['id_evento'] = $this->input->post ( 'id_evento' );
			$data ['nome_evento'] = $this->input->post ( 'nome_evento' );
			$data ['edicao_evento'] = $this->input->post ( 'edicao_evento' );
			$data ['status_evento'] = $this->input->post ( 'status_evento' );
			$data ['inicio_evento'] = $this->input->post ( 'inicio_evento' );
			$data ['fim_evento'] = $this->input->post ( 'fim_evento' );
			$data ['dia_up_mat_evento'] = $this->input->post ( 'dia_up_mat_evento' );
			$data ['ambito_evento'] = $this->input->post ( 'ambito_evento' );
			$data ['area_evento'] = $this->input->post ( 'area_evento' );
			$data ['link_evento'] = $this->input->post ( 'link_evento' );
			$data ['cnpj_evento'] = $this->input->post ( 'cnpj_evento' );
			$data ['img_evento'] = $this->input->post ( 'img_evento' );
			/* Recepção dos dadsos de Forum, Congresso, Simposio ou Semana Academica */
			$tp_evento = $this->input->post ( 'tp_evento' );
			$data ['tp_evento'] = $tp_evento;
			
			/* Forum */
			$regulamento_forum = $this->input->post ( 'regulamento_forum' );
			$conclusao_forum = $this->input->post ( 'conclusao_forum' );
			/* Congresso */
			$ata_congresso = $this->input->post ( 'ata_congresso' );
			/* Simpósio */
			$impressao_simposio = $this->input->post ( 'impressao_simposio' );
			/* Semana Acadêmica */
			$categoria = $this->input->post ( 'categoria' );

			
			/* Chama a funcao inserir do modelo */
			if ($id_evento = $this->model->inserir ( $data )){

				if($tp_evento == "Fórum"){
				
					$this->load->model('forum_model');
					if($this->forum_model->inserir ( $id_evento, $regulamento_forum, $conclusao_forum )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir o Fórum.' );
					}
					
				}
				if($tp_evento == "Congresso"){
					
					$this->load->model('congresso_model');
					if($this->congresso_model->inserir ( $id_evento, $ata_congresso )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir o Congresso.' );
					}
				}
				if($tp_evento == "Simpósio"){
					
					$this->load->model('simposio_model');
					if($this->simposio_model->inserir ( $id_evento, $impressao_simposio )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir o Simpósio.' );
					}
				}
				if($tp_evento == "Semana Acadêmica"){
					
					$this->load->model('semana_academica_model');
					if($this->semana_academica_model->inserir ( $id_evento, $categoria )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir a Semana Acadêmica.' );
					}
				}	
				
				
			} else {
				log_message ( 'error', 'Erro ao inserir o evento.' );
			}
		}
	}
	
	function atualizar() {
		
		/* Carrega a biblioteca do CodeIgniter respons�vel pela validação dos formul�rios */
		$this->load->library ( 'form_validation' );
		
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters ( '<span>', '</span>' );
		
		/*
		 * Aqui estou definindo as regras de validação do formulário, assim como
		 * na função inserir do controlador, porém estou mudando a forma de escrita
		 */
		$validations = array (
				array (
						'field' => 'nome_evento',
						'label' => 'Nome',
						'rules' => 'trim|required|max_length[50]' 
				),
				array (
						'field' => 'edicao_evento',
						'label' => 'Edicao',
						'rules' => 'trim|required|max_length[20]' 
				),
				array (
						'field' => 'status_evento',
						'label' => 'Status',
						'rules' => 'trim|required|max_length[20]' 
				),
				array (
						'field' => 'inicio_evento',
						'label' => 'Inicio',
						'rules' => 'trim|required' 
				),
				array (
						'field' => 'fim_evento',
						'label' => 'Fim',
						'rules' => 'trim|required' 
				),
				array (
						'field' => 'dia_up_mat_evento',
						'label' => 'Dia Upload',
						'rules' => 'trim|required' 
				),
				array (
						'field' => 'ambito_evento',
						'label' => 'Ambito',
						'rules' => 'trim|required|max_length[20]' 
				),
				array (
						'field' => 'area_evento',
						'label' => 'Area',
						'rules' => 'trim|required|max_length[20]' 
				),
				array (
						'field' => 'cnpj_evento',
						'label' => 'Cnpj',
						'rules' => 'trim|required|max_length[20]' 
				),
				array (
						'field' => 'tp_evento',
						'label' => 'Tipo',
						'rules' => 'trim|required|max_length[20]' 
				)  
		);
		$this->form_validation->set_rules ( $validations );
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run () === FALSE) {
			$this->editar ( $this->input->post ( 'id_evento' ) );
		} else {
			/* Senão obtém os dados do formulário */
			$data ['id_evento'] = $this->session->userdata('id_eve');
			$data ['nome_evento'] = ucwords ( $this->input->post ( 'nome_evento' ) );
			$data ['edicao_evento'] = ucwords ( $this->input->post ( 'edicao_evento' ) );
			$data ['status_evento'] = ucwords ( $this->input->post ( 'status_evento' ) );
			$data ['inicio_evento'] = $this->input->post ( 'inicio_evento' );
			$data ['fim_evento'] = $this->input->post ( 'fim_evento' );
			$data ['dia_up_mat_evento'] = $this->input->post ( 'dia_up_mat_evento' );
			$data ['ambito_evento'] = ucwords ( $this->input->post ( 'ambito_evento' ) );
			$data ['area_evento'] = ucwords ( $this->input->post ( 'area_evento' ) );
			$data ['link_evento'] = $this->input->post ( 'link_evento' );
			$data ['cnpj_evento'] = $this->input->post ( 'cnpj_evento' );
			$data ['img_evento'] = $this->input->post ( 'img_evento' );
			/* Recepção dos dadsos de Forum, Congresso, Simposio ou Semana Academica */
			$tp_evento = $this->input->post ( 'tp_evento' );
			$data ['tp_evento'] = $tp_evento;
			// $data['email'] = strtolower($this->input->post('email'));
			
			$data1 ['id_evento'] = $this->session->userdata('id_eve');
						
			/* Executa a função atualizar do modelo passando como parametro os dados obtidos do formulário */
			if ($this->model->atualizar ( $data )) {
				
				if($tp_evento == "Fórum"){
					/* Forum */
					$data1 ['regulamento_forum'] = $this->input->post ( 'regulamento_forum' );
					$data1 ['conclusao_forum'] = $this->input->post ( 'conclusao_forum' );
					
					$this->load->model('forum_model');
					if($this->forum_model->atualizar ( $data1 )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir o Fórum.' );
					}
						
				}
				if($tp_evento == "Congresso"){
					/* Congresso */
					$data1 ['ata_congresso'] = $this->input->post ( 'ata_congresso' );
					
					$this->load->model('congresso_model');
					if($this->congresso_model->atualizar ( $data1 )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir o Congresso.' );
					}
				}
				if($tp_evento == "Simpósio"){
					/* Simpósio */
					$data1 ['impressao_simposio'] = $this->input->post ( 'impressao_simposio' );
					
					$this->load->model('simposio_model');
					if($this->simposio_model->atualizar ( $data1 )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir o Simpósio.' );
					}
				}
				if($tp_evento == "Semana Acadêmica"){
					/* Semana Acadêmica */
					$data1 ['categoria'] = $this->input->post ( 'categoria' );
					
					$this->load->model('semana_academica_model');
					if($this->semana_academica_model->atualizar ( $data1 )){
						redirect ( 'evento' );
					}else {
						log_message ( 'error', 'Erro ao inserir a Semana Acadêmica.' );
					}
				}
				
				redirect ( 'Evento' );
			} else {
				log_message ( 'error', 'Erro ao atualizar o Evento.' );
			}
		}
	}
	function deletar($id) {
		
		/* Executa a função deletar do modelo passando como parametro o id do evento */
		if ($this->model->deletar ( $id )) {
			redirect ( 'Evento' );
		} else {
			log_message ( 'error', 'Erro ao deletar o Evento.' );
		}
	}
	
	function rel_evento() {
		/* Carrega Area model */
		$data ['titulo'] = "Relatórios de Evento";
		$data ['evento'] = $this->model->listar ();
			
		/* Carrega a página de edição com os dados do evento */	
		$this->load->view ( 'includes/header_view.php' );
		$this->load->view ( 'includes/menu_view.php' );
		$this->load->view ( 'rel_evento_view', $data );
		$this->load->view ( 'includes/footer_view.php' );
		
	}
	
	function rel_part_evento($id) {	
		/* Aqui vamos definir o titulo da página de edição */
		$data ['titulo'] = "Relatório de todos Participantes do Evento";
		$this->set_id_evento_session($id);
	
		/* Carrega Area model */
		$this->load->model('evento_model');
		$data ['dados_rel_part_evento'] = $this->evento_model->get_rel_part_evento ($id);
			
		/* Carrega a página de edição com os dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'relatorio/rel_part_evento', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	/* Relatorio das atividades com total de expectadores */
	function rel_ativ_total_expec($id) {
	
		/* Aqui vamos definir o titulo da página de edição */
		$data ['titulo'] = "Relatório de atividades com total de expectadores";
		$this->set_id_evento_session($id);
	
		/* Carrega Area model */
		$this->load->model('evento_model');
		$data ['dados_rel_ativ_total_expec'] = $this->evento_model->get_rel_ativ_total_expec ($id);
			
		/* Carrega a página de edição com os dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'relatorio/rel_ativ_total_expec', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	/* Consulta materiais gastos por evento */
	function rel_gasto_evento($id) {
	
		/* Aqui vamos definir o titulo da página de edição */
		$data ['titulo'] = "Relatório de materiais gastos por evento";
		$this->set_id_evento_session($id);
	
		/* Carrega Area model */
		$this->load->model('evento_model');
		$data ['dados_rel_gasto_evento'] = $this->evento_model->get_rel_gasto_evento ($id);
			
		/* Carrega a página de edição com os dados do evento */
		$this->load->view ( 'includes/header_view' );
		$this->load->view ( 'includes/menu_view' );
		$this->load->view ( 'relatorio/rel_gasto_evento', $data );
		$this->load->view ( 'includes/footer_view' );
	}
	
	/* Verifica formato da data, se a data de entrada é de retorno v�lido True caso contr�rio retorna False. */
	function checkData($date) {
		/*
		 * if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
		 * if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
		 * return true;
		 * else
		 * return false;
		 * } else {
		 * return false;
		 * }
		 */
		/* Verifica se a Data inicial á menor que a data final */
		
		/* Verifica se a Data de Upload á maior que a data inicial e menor que data final */
	}
	
	/* Consulta materiais gastos por evento */
	function inscricao($id) {
		/* Inscreve usuario em evento */
		$this->inscricao_evento($id);

	}
	function set_id_evento_session($id) {
		/* Gurada Id do evento para ser Resgatado Futuramente*/
		$this->session->set_userdata ( 'id_eve', $id );
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