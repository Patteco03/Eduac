<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compradorfoto_Model extends CI_Model {

	public function get($condicao) {		
		$this->db->select('p.codcompradorfoto, p.compradorfotoextensao, p.codcomprador');
		$this->db->select('f.nomecomprador');
		$this->db->from('compradorfoto p');
		$this->db->join ('comprador f','f.codcomprador = p.codcomprador', 'INNER');
		$this->db->where("f.codcomprador = $condicao");
		
		return $this->db->get ()->result ();
	}

	public function post($itens) {
		$res = $this->db->insert('compradorfoto', $itens);
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}

	public function delete($codcompradorfoto, $codcomprador) {
		$this->db->where('codcompradorfoto', $codcompradorfoto, FALSE);
		$this->db->where('codcomprador', $codcomprador, FALSE);
		return $this->db->delete('compradorfoto');
	}
}