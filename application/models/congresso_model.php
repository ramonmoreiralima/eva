<?php
class Congresso_model extends CI_Model {
	public function index() {
	} 
	function get_congresso_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'congresso' );
		$this->db->where ( 'id_evento = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id,$ata_congresso) {
		$this->db->set('id_evento', $id);
		$this->db->set('ata_congresso', $ata_congresso);
		return $this->db->insert ( 'congresso' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'congresso' );
		return $query->result ();
	}
	function lists() {
		$this->db->select ( 'desc_congresso' );
		$results = $this->db->get ( 'congresso' )->result ();
		$list = array ();
		foreach ( $results as $result ) {
			$list [$result->id_congresso] = $result->desc_congresso;
		}
		return $list;
	}
	/* Consulta Todas as congressos */
	function listar_congresso() {
		$query = $this->db->get ( 'congresso' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_evento', $id );
		$query = $this->db->get ( 'congresso' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_evento', $data ['id_evento'] );
		$this->db->set ( $data );
		return $this->db->update ( 'congresso' );
	}
	function deletar($id) {
		$this->db->where ( 'id_evento', $id );
		return $this->db->delete ( 'congresso' );
	}
}
?>