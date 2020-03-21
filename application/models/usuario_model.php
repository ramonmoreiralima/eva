<?php
class Usuario_model extends CI_Model {
	public function index() {
	}
/*
	function login($nome, $senha) {
		$this->db->select ( 'id_face, nome, senha' );
		$this->db->from ( 'usuario' );
		$this->db->where ( 'nome = ' . "'" . $nome . "'" );
		$this->db->where ( 'senha = ' . "'" . MD5 ( $senha ) . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
*/
	function login_face($id) {
		$this->db->select ( 'id_face, primeiro_nome, email' );
		$this->db->from ( 'usuario' );
		$this->db->where ( 'id_face = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function login($email, $senha) {
		$this->db->select ( 'id_face, primeiro_nome, email' );
		$this->db->from ( 'usuario' );
		$this->db->where ( 'email = ' . "'" . $email . "'" );
		//$this->db->where ( 'senha_usuario = ' . "'" . MD5 ( $senha ) . "'" );
		$this->db->where ( 'senha = ' . "'" . ( $senha ) . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($data) {
		return $this->db->insert ( 'usuario', $data );
	}
	function listar() {
		$query = $this->db->get ( 'usuario' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_face', $id );
		$query = $this->db->get ( 'usuario' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_face', $data ['id_face'] );
		$this->db->set ( $data );
		return $this->db->update ( 'usuario' );
	}
	function deletar($id) {
		$this->db->where ( 'id_face', $id );
		return $this->db->delete ( 'usuario' );
	}
}
?>