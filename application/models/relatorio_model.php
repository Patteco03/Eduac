<?php

if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class Relatorio_Model extends CI_Model {


    /**
     * Número de Produtos criados
     * 
     * @param unknown $codproduto            
     */
    public function getNumProduto() {    
        $this->db->select('count(codproduto) AS quantidadeProduto');
        $this->db->from('produto');
        return $this->db->get ()->first_row ();
    }
    
    /**
     * Número de compradores
     * 
     * @param unknown $codcomprador            
     */
    public function getNumComprador() {
        $this->db->select('count(codcomprador) AS quantidadeComprador');
        $this->db->from('comprador');
        $this->db->where('status = 1');
        return $this->db->get ()->first_row ();
    }
    
    /**
     * Número de vendas mensais
     * 
     * @param unknown $mes            
     */
    public function getVendasMensais($condicao = array()) {
        $this->db->select('count(codcomprador) as quantidade');
        $this->db->from('carrinho');
        $this->db->where($condicao); 
        return $this->db->get ()->first_row ();
    }

}