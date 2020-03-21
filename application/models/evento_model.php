<?php
class Evento_model extends CI_Model {
	public function index() {
	}
	
	/*
	 * function login($nome, $senha) {
	 * $this -> db -> select('id_face, nome, senha');
	 * $this -> db -> from('usuario');
	 * $this -> db -> where('nome = ' . "'" . $nome . "'");
	 * $this -> db -> where('senha = ' . "'" . MD5($senha) . "'");
	 * $this -> db -> limit(1);
	 *
	 * $query = $this -> db -> get();
	 *
	 * if($query -> num_rows() == 1)
	 * {
	 * return $query->result();
	 * }
	 * else
	 * {
	 * return false;
	 * }
	 *
	 * }
	 */
	
	function get_tp_evento_by_id($id) {
		$this->db->select ( 'tp_evento' );
		$this->db->from ( 'evento' );
		$this->db->where ( 'id_evento = ' . "'" . $id . "'" );
		$this->db->limit ( 1 );
			
		$query = $this->db->get ();
	
		if ($query->num_rows () == 1) {
			return $query->result ();
		} else {
			return false;
		}
	}
    /* Consulta todos Participantes do Evento */
    function get_rel_part_evento($id) {
		$this->db->select ( 'usuario.primeiro_nome,
                    usuario.ultimo_nome,
                    atividade.nome_atividade,
                    atividade.tp_atividade,
                    evento.id_evento,
                    evento.nome_evento,
                    participacao.id_participacao' );
		$this->db->from ( 'participacao' );
        $this->db->join('usuario', 'participacao.id_face = usuario.id_face', 'left');
        $this->db->join('atividade', 'participacao.id_atividade = atividade.id_atividade', 'left');
        $this->db->join('evento', 'participacao.id_evento = evento.id_evento', 'left');
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
		$this->db->order_by('usuario.primeiro_nome','asc');
                
		$query = $this->db->get ();
	
		if ($query->num_rows () != 0) {
			return $query->result ();
		} else {
			return false;
		}
	}
	
	/* Relatorio das atividades com total de expectadores */
	function get_rel_ativ_total_expec($id) {
		$this->db->select ( 'atividade.id_atividade,
			atividade.nome_atividade,
			atividade.data_atividade,                       
			atividade.hora_atividade,
			atividade.tp_atividade, count(*) as "total"' );
		$this->db->from ( 'atividade,participacao,usuario,evento' );
		$this->db->where ( 'participacao.id_face = usuario.id_face' );
		$this->db->where ( 'participacao.id_atividade = atividade.id_atividade' );
		$this->db->where ( 'participacao.id_evento = evento.id_evento' );
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
		$this->db->group_by('atividade.id_atividade');
	
		$query = $this->db->get ();
	
		if ($query->num_rows () != 0) {
			return $query->result ();
		} else {
			return false;
		}
	}
	
	/* Consulta materiais gastos por evento */
	function get_rel_gasto_evento($id) {
		$this->db->select ( 'participacao.id_participacao,
			participacao_requer_material.quantidade, 	
			material.nome_material,
			material.preco_material' );
		$this->db->from ( 'participacao,participacao_requer_material,material' );
		$this->db->where ( 'participacao_requer_material.id_participacao=participacao.id_participacao' );
		$this->db->where ( 'participacao_requer_material.sku=material.sku' );
		$this->db->where ( 'participacao.id_evento = ' . "'" . $id . "'" );
	
		$query = $this->db->get ();
	
		if ($query->num_rows () != 0) {
			return $query->result ();
		} else {
			return false;
		}
	}
	
	function inserir($data) {
		$this->db->insert ( 'evento', $data );
		/* Função insert_id(), tem a função de retornar o ultimo registro cadastrado, ultimo valor
		 * incrementado */
		$last_id = $this->db->insert_id(); 
		return $last_id;
	}
	function listar() {
		$query = $this->db->get ( 'evento' );
		return $query->result ();
	}
	/* Consulta os 4 Primeiros Registros */
	function listar_recentes() {
		$this->db->select ( '*' );
		$this->db->order_by ( "inicio_evento", "asc" );
		// $this->db->from('evento');
		$query = $this->db->get ( 'evento', 4 );
		return $query->result ();
	}
        
        /* Consulta os Eventos Inscritos pelo Usuario */
	function listar_inscrito($id) {
                $this->db->distinct ('distinct evento.id_evento');
		$this->db->select ( 'evento.*' );
		$this->db->from ( 'evento,participacao,usuario' );
		$this->db->where ( 'participacao.id_evento = evento.id_evento' );
		$this->db->where ( 'participacao.id_face = usuario.id_face' );
		$this->db->where ( 'participacao.id_face = ' . "'" . $id . "'" );
	
		$query = $this->db->get ();
	
		if ($query->num_rows () != 0) {
			return $query->result ();
		} else {
			return false;
		}
	}
        /* Consulta os Eventos Nao Inscritos pelo Usuario */
	function listar_nao_inscrito($id) {
                
                /* Sub Query */
                $this->db->distinct ('distinct evento.id_evento');
		$this->db->select ( 'evento.id_evento' );
		$this->db->from ( 'evento,participacao,usuario' );
		$this->db->where ( 'participacao.id_evento = evento.id_evento' );
		$this->db->where ( 'participacao.id_face = usuario.id_face' );
		$this->db->where ( 'participacao.id_face = ' . "'" . $id . "'" );
                $subQuery =  $this->db->get_compiled_select();
                
                /* Query */
                $this->db->select ( 'evento.*' );
                $this->db->from ( 'evento' );
                $this->db->where ( 'evento.id_evento NOT IN ' . "(" . $subQuery . ")");


                $query = $this->db->get ();
		return $query->result ();
                
		/*$query = $this->db->get ();
	
		if ($query->num_rows () != 0) {
			return $query->result ();
		} else {
			return false;
		}*/
	}
	function editar($id) {
		$this->db->where ( 'id_evento', $id );
		$query = $this->db->get ( 'evento' );
		return $query->result ();
	}
	function atualizar($data) {
		$this->db->where ( 'id_evento', $data ['id_evento'] );
		$this->db->set ( $data );
		return $this->db->update ( 'evento' );
	}
	function deletar($id) {
		$this->db->where ( 'id_evento', $id );
		return $this->db->delete ( 'evento' );
	}
}
?>