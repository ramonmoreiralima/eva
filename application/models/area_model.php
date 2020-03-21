<?php
class Area_model extends CI_Model {
	public function index() {
	}
	function get_area_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'area' );
		$this->db->where ( 'id_area = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	public function retorna_areas() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$this->db->order_by ( "desc_area", "asc" );
		$consulta = $this->db->get ( "area" );
		return $consulta;
	}
	function inserir($data) {
		return $this->db->insert ( 'area', $data );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'area' );
		return $query->result ();
	}
	function lists() {
		$this->db->select ( 'desc_area' );
		$results = $this->db->get ( 'area' )->result ();
		$list = array ();
		foreach ( $results as $result ) {
			$list [$result->id_area] = $result->desc_area;
		}
		return $list;
	}
	/* Consulta Todas as Areas */
	function listar_area() {
		$query = $this->db->get ( 'area' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_area', $id );
		$query = $this->db->get ( 'area' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_area', $data ['id_area'] );
		$this->db->set ( $data );
		return $this->db->update ( 'area' );
	}
	function deletar($id) {
		$this->db->where ( 'id_area', $id );
		return $this->db->delete ( 'area' );
	}
}
?>