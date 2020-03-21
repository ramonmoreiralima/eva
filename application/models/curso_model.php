<?php 
class Curso_model extends CI_Model {
	public function index() {
	}
	function get_curso_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'curso' );
		$this->db->where ( 'id_atividade = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id,$pre_requisito) {
		$this->db->set('id_atividade', $id);
		$this->db->set('pre_requisito', $pre_requisito);
		return $this->db->insert ( 'curso' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'curso' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_atividade', $id );
		$query = $this->db->get ( 'curso' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_atividade', $data ['id_atividade'] );
		$this->db->set ( $data );
		return $this->db->update ( 'curso' );
	}
	function deletar($id) {
		$this->db->where ( 'id_atividade', $id );
		return $this->db->delete ( 'curso' );
	}
}
?>