<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Arquivo_Model extends CI_Model {
	public function get($condicao) {
		$this->db->where ("codarquivosmodulo = $condicao" );
		$this->db->from ( 'arquivosmodulo' );
		
		return $this->db->get ()->result ();
	}
	public function getArquivosDisponiveis($codmodulo) {
		$this->db->select ( 'm.codarquivosmodulo, m.name, m.type, m.tmp_name, m.size, m.status, m.tipo, m.aulanome, m.folder' );
		$this->db->select ('p.codmodulo, p.nomemodulo, p.descricaomodulo');
		$this->db->from ( 'arquivosmodulo m' );
		$this->db->join ('modulo p','p.codmodulo = m.codmodulo', 'INNER');
		$this->db->where("p.codmodulo = $codmodulo");
		
		return $this->db->get ()->result ();

	}
	public function post($itens) {
		$res = $this->db->insert ( 'arquivosmodulo', $itens );
		if ($res) {
			return $this->db->insert_id ();
		} else {
			return FALSE;
		}
	}
	public function delete($codarquivosmodulo) {
		$this->db->where ( 'codarquivosmodulo', $codarquivosmodulo, FALSE );
		return $this->db->delete ( 'arquivosmodulo' );
	}
	public function update($itens, $codarquivosmodulo) {
		$this->db->where ( 'codarquivosmodulo', $codarquivosmodulo, FALSE );
		$res = $this->db->update ( 'arquivosmodulo', $itens );
		if ($res) {
			return $codarquivosmodulo;
		} else {
			return FALSE;
		}
	}
}