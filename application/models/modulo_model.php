<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Modulo_Model extends CI_Model {

    public function get($condicao = array()) {
        $this->db->where ( $condicao );
        $this->db->from ( 'modulo' );

        return $this->db->get ()->result ();
    }

    public function getModulosDisponiveis($codproduto) {
        $this->db->select ( 'm.nomemodulo, m.codmodulo, m.statusmodulo, m.descricaomodulo' );
        $this->db->select ('p.codproduto, p.nomeproduto');
        $this->db->from ( 'modulo m' );
        $this->db->join ('produto p','p.codproduto = m.codproduto', 'INNER');
        $this->db->where("p.codproduto = $codproduto");

        return $this->db->get ()->result ();
    }
    
    public function getModulosDisponiveisParaUsuarios($condicao = array()) {
    	$this->db->select ( 'm.nomemodulo, m.codmodulo, m.statusmodulo, m.descricaomodulo' );
    	$this->db->select ('p.codproduto, p.nomeproduto');
    	$this->db->from ( 'modulo m' );
    	$this->db->join ('produto p','p.codproduto = m.codproduto', 'INNER');
    	$this->db->where($condicao);
    
    	return $this->db->get ()->result ();
    }
    
	public function post($itens) {
		$res = $this->db->insert ( 'modulo', $itens );
		if ($res) {
			return $this->db->insert_id ();
		} else {
			return FALSE;
		}
	}
	public function delete($codmodulo) {
		$this->db->where ( 'codmodulo', $codmodulo, FALSE );
		return $this->db->delete ( 'modulo' );
	}
	public function update($itens, $codmodulo) {
		$this->db->where ( 'codmodulo', $codmodulo, FALSE );
		$res = $this->db->update ( 'modulo', $itens );
		if ($res) {
			return $codmodulo;
		} else {
			return FALSE;
		}
	}
}