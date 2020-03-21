<?php
class Atividade_model extends CI_Model {
	public function index() {
	}
	
	function get_atividade_by_id($id) {
		$this->db->select ( '*' );
		$this->db->from ( 'atividade' );
		$this->db->where ( 'id_atividade = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
	/*function list_atividade_for_id_evento($id) {
		// Retorna todos as atividades vinculadas ao id_evento 
		$this->db->select ( '*' );
		$this->db->from ( 'atividade, atividade_evento, evento' );
		$this->db->where ( 'atividade.id_atividade = atividade_evento.id_atividade' );
		$this->db->where ( 'evento.id_evento = atividade_evento.id_evento' );
		$this->db->where ( 'atividade_evento.id_evento = ' . "'" . $id . "'" );
		// $this -> db -> where('id_atividade = ' . "'" . $id . "'");
		// $this -> db -> limit(1);
		
		$query = $this->db->get ();
		return $query->result ();
	}*/
	function get_id_atividade($nome_atividade, $data_atividade, $hora_atividade) {
		$this->db->select ( 'id_atividade' );
		$this->db->from ( 'atividade' );
		$this->db->where ( 'nome_atividade = ' . "'" . $nome_atividade . "'" );
		$this->db->where ( 'data_atividade = ' . "'" . $data_atividade . "'" );
		$this->db->where ( 'hora_atividade = ' . "'" . $hora_atividade . "'" );

		$this->db->limit ( 1 );
		
		$query = $this->db->get ();
		
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
		
	}
	function inserir($data) {
		$this->db->insert ( 'atividade', $data );
		/* Função insert_id(), tem a função de retornar o ultimo registro cadastrado, ultimo valor
		 * incrementado */
		$last_id = $this->db->insert_id(); 
		return $last_id;
	}
	function listar_old() {
		$query = $this->db->get ( 'atividade' );
		return $query->result ();
	}
        function listar_inscrito_old ($id,$id_face) {
		$this->db->select ( 'atividade.*' );
		$this->db->from ( 'atividade, participacao, evento' );
		$this->db->where ( 'participacao.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'participacao.id_evento = evento.id_evento ' );
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
                $this->db->where ( 'participacao.id_face = ' . "'" . $id_face . "'" );
            		
		$query = $this->db->get ();
		return $query->result ();
	}
        function listar($id) {
		$this->db->select ( 'atividade.*' );
		$this->db->from ( 'atividade, atividade_evento, evento' );
		$this->db->where ( 'atividade_evento.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'atividade_evento.id_evento = evento.id_evento ' );
		$this->db->where ( 'atividade_evento.id_evento = ' . "'" . $id . "'" );
            		
		$query = $this->db->get ();
		return $query->result ();
	}
        function listar_nao_inscrito($id,$id_face) {
                
                /* Sub Query */
                $this->db->distinct ('distinct atividade.id_atividade');
		$this->db->select ( 'atividade.id_atividade' );
		$this->db->from ( 'atividade,participacao,evento' );
		$this->db->where ( 'participacao.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'participacao.id_evento = evento.id_evento' );
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
                $this->db->where ( 'participacao.id_face = ' . "'" . $id_face . "'" );
                $subQuery =  $this->db->get_compiled_select();
                
                /* Query */
                $this->db->select ( 'atividade.*' );
                $this->db->from ( 'evento,atividade_evento,atividade' );
                $this->db->where ( 'atividade_evento.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'atividade_evento.id_evento = evento.id_evento' );
                $this->db->where ( 'atividade_evento.id_atividade not in' . "(" . $subQuery . ")");   
                $this->db->where ( 'atividade_evento.id_evento = ' . "'" . $id . "'" );
                
		$query = $this->db->get ();
		return $query->result ();
	}
        function listar_inscrito($id,$id_face) {
                
                /* Sub Query */
                $this->db->distinct ('distinct atividade.id_atividade');
		$this->db->select ( 'atividade.id_atividade' );
		$this->db->from ( 'atividade,participacao,evento' );
		$this->db->where ( 'participacao.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'participacao.id_evento = evento.id_evento' );
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
                $this->db->where ( 'participacao.id_face = ' . "'" . $id_face . "'" );
                $subQuery =  $this->db->get_compiled_select();
                
                /* Query */
                $this->db->select ( 'atividade.*' );
                $this->db->from ( 'evento,atividade_evento,atividade' );
                $this->db->where ( 'atividade_evento.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'atividade_evento.id_evento = evento.id_evento' );
                $this->db->where ( 'atividade_evento.id_atividade in' . "(" . $subQuery . ")");   
                $this->db->where ( 'atividade_evento.id_evento = ' . "'" . $id . "'" );
                
		$query = $this->db->get ();
		return $query->result ();
	}
        function listar_nao_inscrito_old($id,$id_face) {
                
                /* Sub Query */
		$this->db->select ( 'atividade.id_atividade' );
		$this->db->from ( 'atividade, participacao, evento' );
		$this->db->where ( 'participacao.id_atividade = atividade.id_atividade' );
		$this->db->where ( 'participacao.id_evento = evento.id_evento' );
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
                $this->db->where ( 'participacao.id_face <> ' . "'" . $id_face . "'" );
                $subQuery =  $this->db->get_compiled_select();
                
                /* Query */
                $this->db->select ( 'atividade.*' );
                $this->db->from ( 'atividade, atividade_evento, evento' );
                $this->db->where ( 'atividade_evento.id_atividade = atividade.id_atividade' );
                $this->db->where ( 'atividade_evento.id_evento = evento.id_evento' );
                $this->db->where ( 'atividade_evento.id_atividade in ' . "(" . $subQuery . ")");   
	
		$query = $this->db->get ();
		return $query->result ();
	}
        
	function editar($id) {
		$this->db->where ( 'id_atividade', $id );
		$query = $this->db->get ( 'atividade' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_atividade', $data ['id_atividade'] );
		$this->db->set ( $data );
		return $this->db->update ( 'atividade' );
	}
	function deletar($id) {
		$this->db->where ( 'id_atividade', $id );
		return $this->db->delete ( 'atividade' );
	}
}
?>