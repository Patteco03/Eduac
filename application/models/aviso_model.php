<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Aviso_Model extends CI_Model {
	public function getTotal($condicao = array()) {
		$this->db->where ( $condicao );
		$this->db->from ( 'aviso' );
		return $this->db->count_all_results ();
	}

	public function get($condicao = array(), $primeiraLinha = FALSE, $pagina = 0, $limite = LINHAS_PESQUISA_DASHBOARD) {
		$this->db->select('codaviso, tipo, desricao');
		$this->db->where($condicao);
		$this->db->from('aviso');
		
		if ($primeiraLinha) {
			return $this->db->get()->first_row();
		} else {
			if ($limite !== FALSE) {
				$this->db->limit($limite, $pagina);
			}
			return $this->db->get()->result();
		}
	}

	public function post($itens) {
		$res = $this->db->insert ( 'atividades', $itens );
		if ($res) {
			return $this->db->insert_id ();
		} else {
			return FALSE;
		}
	}
	public function delete($codatividades) {
		$this->db->where ( 'codatividades', $codatividades, FALSE );
		return $this->db->delete ( 'atividades' );
	}
	public function update($itens, $codatividades) {
		$this->db->where ( 'codarquivosmodulo', $codatividades, FALSE );
		$res = $this->db->update ( 'atividades', $itens );
		if ($res) {
			return $codatividades;
		} else {
			return FALSE;
		}
	}
}