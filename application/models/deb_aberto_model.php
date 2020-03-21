<?php
class Deb_aberto_model extends CI_Model {
	public function index() {
	}
	function get_deb_aberto_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'deb_aberto' );
		$this->db->where ( 'id_atividade = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id,$tp_deb_aberto) {
		$this->db->set('id_atividade', $id);
		$this->db->set('tp_deb_aberto', $tp_deb_aberto);
		return $this->db->insert ( 'deb_aberto' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'deb_aberto' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_atividade', $id );
		$query = $this->db->get ( 'deb_aberto' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_atividade', $data ['id_atividade'] );
		$this->db->set ( $data );
		return $this->db->update ( 'deb_aberto' );
	}
	function deletar($id) {
		$this->db->where ( 'id_atividade', $id );
		return $this->db->delete ( 'deb_aberto' );
	}
}
?>