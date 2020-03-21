<?php
class Atividade_evento_model extends CI_Model {
	public function index() {
	}
	function list_atividade_for_id_evento($id) {
		// Retorna todos as atividades vinculadas ao id_evento
		$this->db->select ( '*' );
		$this->db->from ( 'atividade, atividade_evento, evento' );
		$this->db->where ( 'atividade.id_atividade = atividade_evento.id_atividade' );
		$this->db->where ( 'evento.id_evento = atividade_evento.id_evento' );
		$this->db->where ( 'atividade_evento.id_evento = ' . "'" . $id . "'" );
	
		$query = $this->db->get ();
		return $query->result ();
	}
	function inserir($id_atividade, $id_evento) {
		$this->db->set('id_atividade', $id_atividade);
		$this->db->set('id_evento', $id_evento);
		return $this->db->insert ( 'atividade_evento');
	}
	function listar() {
		$query = $this->db->get ( 'atividade_evento' );
		return $query->result ();
	}
	function editar($id_atividade,$id_evento) {
		$this->db->where ( 'id_atividade', $id );
		$this->db->where ( 'id_evento', $id );
		$query = $this->db->get ( 'atividade_evento' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_atividade', $data ['id_atividade'] );
		$this->db->where ( 'id_evento', $data ['id_evento'] );
		$this->db->set ( $data );
		return $this->db->update ( 'atividade_evento' );
	}
	function deletar($id_atividade,$id_evento) {
		$this->db->where ( 'id_atividade', $id_atividade );
		$this->db->where ( 'id_evento', $id_evento );
		return $this->db->delete ( 'atividade_evento' );
	}
}
?>