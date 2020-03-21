<?php
class Simposio_model extends CI_Model {
	public function index() {
	} 
	function get_simposio_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'simposio' );
		$this->db->where ( 'id_evento = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id,$impressao_simposio) {
		$this->db->set('id_evento', $id);
		$this->db->set('impressao_simposio', $impressao_simposio);
		return $this->db->insert ( 'simposio' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'simposio' );
		return $query->result ();
	}
	function lists() {
		$this->db->select ( 'desc_simposio' );
		$results = $this->db->get ( 'simposio' )->result ();
		$list = array ();
		foreach ( $results as $result ) {
			$list [$result->id_simposio] = $result->desc_simposio;
		}
		return $list;
	}
	/* Consulta Todas as simposios */
	function listar_simposio() {
		$query = $this->db->get ( 'simposio' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_evento', $id );
		$query = $this->db->get ( 'simposio' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_evento', $data ['id_simposio'] );
		$this->db->set ( $data );
		return $this->db->update ( 'simposio' );
	}
	function deletar($id) {
		$this->db->where ( 'id_evento', $id );
		return $this->db->delete ( 'simposio' );
	}
}
?>