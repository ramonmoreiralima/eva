<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'usuario_model', '', TRUE );
	}
	function index() {
		// This method will have the credentials validation
		$this->load->library ( 'form_validation' );
		
		// Login Face
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required' );
		// $this->form_validation->set_rules ( 'id', 'Id', 'trim|required|callback_check_database_face' );
		$this->form_validation->set_rules ( 'senha', 'Senha', 'trim|required|callback_check_database' );
		
		if ($this->form_validation->run () == FALSE) {
			// Field validation failed. User redirected to login page
			// $this->load->view('inicio_view');
			redirect ( 'inicio', 'refresh' );
		} else {
			// Go to private area
			redirect ( 'home', 'refresh' );
		}
	}
	/*
	function check_database_face($id) {
		// Field validation succeeded. Validate against database
		// $nome = $this->input->post('nome');
		
		// query the database
		$result = $this->usuario_model->login_face ( $id );
		
		if ($result) {
			$sess_array = array ();
			foreach ( $result as $row ) {
				$sess_array = array (
						'id_face' => $row->id_face,
						'primeiro_nome' => $row->primeiro_nome 
				);
				$this->session->set_userdata ( 'logged_in', $sess_array );
			}
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'check_database_face', 'Gostaria de Vincular Sua Conta Facebook, Com Nosso Sistema?' );
			return false;
		}
	}
	*/
	
	 function check_database($email,$senha){

	  //Field validation succeeded. Validate against database
	  $email = $this->input->post('email');
	  $senha = $this->input->post('senha');
	  
	  //query the database
	  $result = $this->usuario_model->login($email, md5($senha));
	  //$result = $this->usuario_model->login($email, $senha);
	  // Se login Funcionou Joga usuario para a Session

	  if($result){
	  	$sess_array = array();
	  	foreach($result as $row){
	  		$sess_array = array(
	  			//'id_usuario' => $row->id_usuario,
	  			//'nome_usuario' => $row->nome_usuario,
	  			//'email_usuario' => $row->email_usuario
				'id_face' => $row->id_face,
				'primeiro_nome' => $row->primeiro_nome 
	  		);
	  		$this->session->set_userdata('logged_in', $sess_array);
	  	}
	  	return TRUE;
	  }else{
	  	$this->form_validation->set_message('check_database', 'Login ou Senha Incorreta');
	  	return false;
	  }

	}
	
}
?>