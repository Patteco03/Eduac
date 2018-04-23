<?php

if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class Sku_Model extends CI_Model {
	public function getPorSku($codproduto) {
		$this->db->select ( 's.codsku, s.codproduto' );
		$this->db->select ( 'p.nomeproduto, p.valor, p.valorpromocional' );
		$this->db->select ( ' pr.codprodutofoto, pr.produtofotoextensao ');
		$this->db->from ( 'sku s');
		$this->db->from ( 'produto p' );
		$this->db->from ( 'produtofoto pr' );
		$this->db->where ( 'p.codproduto', $codproduto, FALSE );
		$this->db->where ( 'pr.codproduto', $codproduto, FALSE );
		return $this->db->get ()->first_row ();
	}
    
    /**
     * Retorna SKU para produtos simples
     * 
     * @param unknown $codproduto            
     */
    public function getPorProdutoSimples($codproduto) {
        $this->db->select ( 's.codsku, s.codproduto' );
        $this->db->select ( "'Produto Simples' AS nomeatributo", FALSE );
        $this->db->from ( 'sku s' );
        $this->db->where ( 's.codproduto', $codproduto, FALSE );
        return $this->db->get ()->first_row ();
    }
    
    /**
     * Retorna SKUs de produtos com atributos
     * 
     * @param unknown $codproduto            
     */
    public function getPorProdutoAtributo($codproduto) {
        $this->db->select ( 's.codsku, s.codproduto' );
        $this->db->select ( 'a.nomeatributo');
        $this->db->from ( 'sku s' );
        $this->db->from ( 'skuatributo sa' );
        $this->db->from ( 'atributo a' );
        $this->db->where ( 'sa.codsku', 's.codsku', FALSE );
        $this->db->where ( 'a.codatributo', 'sa.codatributo', FALSE );
        
        return $this->db->get ()->result ();
    }
    public function getAtributosDisponiveis($codproduto) {
        $this->db->select ( 'a.nomeatributo, a.codatributo, a.valor, a.valorpromocional' );
        $this->db->from ( 'atributo a' );
        $this->db->where ( "a.codatributo NOT IN (SELECT sa.codatributo FROM skuatributo sa, sku s WHERE sa.codsku = s.codsku AND s.codproduto = {$codproduto})" );
        
        return $this->db->get ()->result ();
    }
    public function post($itens) {
        $res = $this->db->insert ( 'sku', $itens );
        if ($res) {
            return $this->db->insert_id ();
        } else {
            return FALSE;
        }
    }
    public function update($codsku, $itens) {
        $this->db->where ( 'codsku', $codsku, FALSE );
        $res = $this->db->update ( 'sku', $itens );
    }
    public function delete($codsku) {
        $this->db->where ( 'codsku', $codsku, FALSE );
        $res = $this->db->delete ( 'sku' );
    }
    public function postAtributo($itens) {
        $res = $this->db->insert ( 'skuatributo', $itens );
        if ($res) {
            return $this->db->insert_id ();
        } else {
            return FALSE;
        }
    }
}