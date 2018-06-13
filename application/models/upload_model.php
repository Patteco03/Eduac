<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_Model extends CI_Model {

     public function post($itens) {
        $res = $this->db->insert ( 'biblioteca', $itens );
        if ($res) {
            return $this->db->insert_id ();
        } else {
            return FALSE;
        }
    }

    public function get($condicao) {
        $this->db->where ("idbiblioteca = $condicao" );
        $this->db->from  ('biblioteca');
        
        return $this->db->get ()->result ();
    }

    public function limpaDocumentos($idbiblioteca) {
        $this->db->where('idbiblioteca', $idbiblioteca, FALSE);
        $this->db->delete('biblioteca');
    }

}