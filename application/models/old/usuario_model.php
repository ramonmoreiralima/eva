<?php
class Usuario_model extends CI_Model {
	function get_all() {
		// $query = $this->db->query("select * from usuario");
		// tem omesmo efeito de select * from
		// $this->db->where('nome',$nome);
		// $this->db->like('nome','a');
		$query = $this->db->get ( 'usuario' );
		return $query->result ();
	}
	function add_record($options = array()) {
		$this->db->insert ( 'usuario', $options );
		return $this->db->affected_rows ();
	}
	function delete_record() {
		$this->db->where ( 'id', $this->uri->segment ( 3 ) );
		$this->db->delete ( 'usuario' );
		return $this->db->affected_rows ();
	}
	function update_record($options = array()) {
		if (isset ( $options ['nome'] )) {
			$this->db->set ( 'nome', $options ['nome'] );
		}
		if (isset ( $options ['email'] )) {
			$this->db->set ( 'email', $options ['email'] );
		}
		if (isset ( $options ['senha'] )) {
			$this->db->set ( 'senha', $options ['senha'] );
		}
		$this->db->where ( 'id', $options ['id'] );
		$this->db->update ( 'usuario' );
		return $this->db->affected_rows ();
	}
	function get_by_id($id) {
		$this->db->where ( 'id', $id );
		$query = $this->db->get ( 'usuario' );
		return $query->row ( 0 );
	}
	function get_usuario($email, $senha) {
		$this->db->where ( 'email', $email );
		$this->db->where ( 'senha', $senha );
		$query = $this->db->get ( 'usuario' );
		return $query->row ( 0 );
	}
	function login($options = array()) {
		$usuario = get_usuario ( $options ['email'], $options ['senha'] );
		if (! $usuario) {
			return false;
		} else {
			return true;
		}
	}
}
?>