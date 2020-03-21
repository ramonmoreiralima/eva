<?php 
class Deb_fechado_model extends CI_Model {
	public function index() {
	}
	function get_deb_fechado_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'deb_fechado' );
		$this->db->where ( 'id_atividade = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	function inserir($id, $id_face, $tp_deb_fechado) {
		$this->db->set('id_atividade', $id);
                $this->db->set('id_face', $id_face);
                $this->db->set('tp_deb_fechado', $tp_deb_fechado);
		return $this->db->insert ( 'deb_fechado' );
	}
	function listar() {
		/* Este Metodo Retorna todos os valores para alimentar combo e list */
		$query = $this->db->get ( 'deb_fechado' );
		return $query->result ();
	}
	function editar($id) {
		$this->db->where ( 'id_atividade', $id );
		$query = $this->db->get ( 'deb_fechado' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_atividade', $data ['id_atividade'] );
		$this->db->set ( $data );
		return $this->db->update ( 'deb_fechado' );
	}
	function deletar($id) {
		$this->db->where ( 'id_atividade', $id );
		return $this->db->delete ( 'deb_fechado' );
	}
}
?>