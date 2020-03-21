<?php
class Semana_academica_model extends CI_Model {
	public function index() { 
	}
	function get_semana_academica_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'semana_academica' );
		$this->db->where ( 'id_evento = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id,$categoria) {
		$this->db->set('id_evento', $id);
		$this->db->set('categoria', $categoria);
		return $this->db->insert ( 'semana_academica' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'semana_academica' );
		return $query->result ();
	}
	function lists() {
		$this->db->select ( 'desc_semana_academica' );
		$results = $this->db->get ( 'semana_academica' )->result ();
		$list = array ();
		foreach ( $results as $result ) {
			$list [$result->id_semana_academica] = $result->desc_semana_academica;
		}
		return $list;
	}
	/* Consulta Todas as semana_academicas */
	function listar_semana_academica() {
		$query = $this->db->get ( 'semana_academica' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_evento', $id );
		$query = $this->db->get ( 'semana_academica' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_evento', $data ['id_semana_academica'] );
		$this->db->set ( $data );
		return $this->db->update ( 'semana_academica' );
	}
	function deletar($id) {
		$this->db->where ( 'id_evento', $id );
		return $this->db->delete ( 'semana_academica' );
	}
}
?>