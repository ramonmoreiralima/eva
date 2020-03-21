<?php
class Forum_model extends CI_Model {
	public function index() {
	} 
	function get_forum_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'forum' );
		$this->db->where ( 'id_evento = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id,$regulamento_forum,$conclusao_forum) {
                $this->db->set('id_evento', $id);
		$this->db->set('regulamento_forum', $regulamento_forum);
                $this->db->set('conclusao_forum', $conclusao_forum);
		return $this->db->insert ( 'forum' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'forum' );
		return $query->result ();
	}
	function lists() {
		$this->db->select ( 'desc_forum' );
		$results = $this->db->get ( 'forum' )->result ();
		$list = array ();
		foreach ( $results as $result ) {
			$list [$result->id_forum] = $result->desc_forum;
		}
		return $list;
	}
	/* Consulta Todas as forums */
	function listar_forum() {
		$query = $this->db->get ( 'forum' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_evento', $id );
		$query = $this->db->get ( 'forum' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_evento', $data ['id_evento'] );
		$this->db->set ( $data );
		return $this->db->update ( 'forum' );
	}
	function deletar($id) {
		$this->db->where ( 'id_evento', $id );
		return $this->db->delete ( 'forum' );
	}
}
?>