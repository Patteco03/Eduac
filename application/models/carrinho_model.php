<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrinho_Model extends CI_Model {

    public function getTotal($condicao = array()) {
        $this->db->where($condicao);
        $this->db->from('carrinho');
        return $this->db->count_all_results();
    }

    public function get($condicao = array()) {
        $this->db->select('c.codcarrinho, c.datahoracompra, c.valorcompra, c.codproduto');
        $this->db->select('c.codcomprador, c.situacao, c.observacao');
        $this->db->select('c.codformapagamento,');
        $this->db->select("DATE_FORMAT(c.datahoracompra, '%d/%c/%Y %H:%i') AS data", FALSE);
        $this->db->select('co.nomecomprador,');
        $this->db->select('p.nomeproduto,');
        $this->db->where($condicao);
        $this->db->from('carrinho c');
        $this->db->join ('comprador co', 'c.codcomprador = co.codcomprador', 'INNER' );
        $this->db->join ('produto p', 'c.codproduto = p.codproduto', 'INNER' );


        return $this->db->get()->result();

    }

    public function post($itens) {
        $res = $this->db->insert('carrinho', $itens);
        if ($res) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function update($itens, $codcarrinho) {
        $this->db->where('codcarrinho', $codcarrinho, FALSE);
        $res = $this->db->update('carrinho', $itens);
        if ($res) {
            return $codcarrinho;
        } else {
            return FALSE;
        }
    }

    public function delete($codatributo) {
        $this->db->where('codatributo', $codatributo, FALSE);
        return $this->db->delete('atributo');
    }
}