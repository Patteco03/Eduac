<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class UsuarioProduto_Model extends CI_Model {
    public function get($condicao = array()) {
        $this->db->select ( 'dp.codproduto, dp.codusuario' );
        $this->db->where ( $condicao );
        $this->db->from ( 'usuarioproduto dp' );
        
        return $this->db->get ()->result ();
    }
    public function getUsuarioProduto($codproduto) {
        $this->db->select ( 'u.codusuario, u.codproduto' );
        $this->db->select ( 'co.nomeusuario, co.image, co.disciplina' );
        $this->db->from ( 'usuarioproduto u' );
        $this->db->join ('usuario co','u.codusuario = co.codusuario', 'INNER');
        $this->db->where ( "u.codproduto", $codproduto, FALSE );
        
        return $this->db->get ()->result ();
    }
    public function post($itens) {
        $res = $this->db->insert ( 'usuarioproduto', $itens );
    }
    public function delete($codproduto) {
        $this->db->where ( 'codproduto', $codproduto, FALSE );
        return $this->db->delete ( 'usuarioproduto' );
    }
}