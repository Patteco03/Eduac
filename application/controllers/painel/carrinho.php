<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Carrinho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = LAYOUT_DASHBOARD;
        $this->load->model('Comprador_Model', 'CompradorM');
        $this->load->model('Carrinho_Model', 'CarrinhoM');


    }

    public function index()
    {
        $data = array();
        $data ['URLADICIONAR'] = site_url('painel/carrinho/adicionar');
        $data ['URLLISTAR'] = site_url('painel/carrinho');
        $data ['BLC_DADOS'] = array();
        $data ['BLC_SEMDADOS'] = array();
        $data ['BLC_PAGINAS'] = array();

        $res = $this->CarrinhoM->get(array(), FALSE);

        if ($res) {
            foreach ($res as $r) {
                $data ['BLC_DADOS'] [] = array(
                    "URLRESUMO" => site_url('painel/carrinho/resumo/' . $r->codcarrinho),
                    "CODPEDIDO" => $r->codcarrinho,
                    "DATA" => $r->data,
                    "NOMECOMPRADOR" => $r->nomecomprador,
                    "PRODUTO" => $r->nomeproduto,
                    "STATUS" => ($r->situacao == '1') ? 'Ativo' : 'Inativo',
                    "BTNINFO" => ($r->situacao == '1') ? 'success' : 'danger',
                    "VALOR" => number_format($r->valorcompra, 2, ",", ".")
                );
            }
        } else {
            $data ['BLC_SEMDADOS'] [] = array();
        }

        $this->parser->parse('painel/carrinho_listar', $data);
    }

    private function setURL(&$data)
    {
        $data ['URLLISTAR'] = site_url('painel/carrinho');
        $data ['ACAOFORM'] = site_url('painel/carrinho/salvar');
    }

    public function adicionar()
    {
        $data = array();
        $data ['ACAO'] = 'Novo';
        $data ['codcomprador'] = '';
        $data ['nomecomprador'] = '';
        $data ['cpfcomprador'] = '';
        $data ['cepcomprador'] = '';
        $data ['enderecocomprador'] = '';
        $data ['cidadecomprador'] = '';
        $data ['ufcomprador'] = '';
        $data ['emailcomprador'] = '';
        $data ['telefonecomprador'] = '';
        $data ['sexocomprador'] = '';
        $data ['senhacomprador'] = '';

        $this->setURL($data);

        $this->parser->parse('painel/carrinho_form', $data);
    }

    public function resumo($codcarrinho)
    {
        $this->load->model('Produto_Model', 'ProdutoM');
        $this->load->model('FormaPagamento_Model', 'FormaPagamento');

        $carrinho = $this->CarrinhoM->get(array(
            "c.codcarrinho" => $codcarrinho
        ), TRUE);

        if (!$carrinho) {
            $this->session->set_flashdata('erro', 'Carrinho não existente.');
            redirect('conta');
        }

        $data = array();


        $data ["CODCARRINHO"] = $codcarrinho;


        $data ["DATA"] = null;
        $data ["NOMEFORMAPAGAMENTO"] = null;
        $data ["VALORFINALCOMPRA"] = null;
        $data ["NOMECOMPRADOR"] = null;
        $data ["ENDERECOCOMPRADOR"] = null;
        $data ["CIDADECOMPRADOR"] = null;
        $data ["UFCOMPRADOR"] = null;
        $data ["CEPCOMPRADOR"] = null;
        $data ["URLSITUACAO"] = site_url('painel/carrinho/atualizapedido');
        $data ["URLFORMAPAGAMENTO"] = site_url('painel/carrinho/atualizaformadepagamento');
        $data ["SITUACAO_1"] = '';
        $data ["SITUACAO_2"] = '';
        $data ["SITUACAO_3"] = '';
        $data ["SITUACAO_4"] = '';
        $data ["SITUACAO_"] = null;


        $data ["BLC_DADOS"] = array();

        $data ["BLC_FORMADEPAGAMENTO"] = array();


        if ($carrinho) {

            foreach ($carrinho as $c) {

                $infocomprador = $this->CompradorM->get(array("codcomprador" => $c->codcomprador));

                if ($infocomprador) {

                    foreach ($infocomprador as $com) {

                        $data ["NOMECOMPRADOR"] = $com->nomecomprador;
                        $data ["ENDERECOCOMPRADOR"] = $com->enderecocomprador;
                        $data ["CIDADECOMPRADOR"] = $com->cidadecomprador;
                        $data ["UFCOMPRADOR"] = $com->ufcomprador;
                        $data ["CEPCOMPRADOR"] = $com->cepcomprador;
                        # code...
                    }
                    # code...
                }

                $infoproduto = $this->ProdutoM->get(array("codproduto" => $c->codproduto));

                if ($infoproduto) {

                    foreach ($infoproduto as $if) {

                       $data ["BLC_DADOS"][] = array(
                            'NOMEPRODUTO' =>$if->nomeproduto,
                       );
                        # code...
                   }
                    # code...
               }

               $data ["DATA"] = date("Y-m-d H:i:s");
               $data ["VALORFINALCOMPRA"] = number_format($c->valorcompra, 2, ",", ".");
               $data ["SITUACAO_" . $c->situacao] = 'selected="selected"';

               $paga = $this->FormaPagamento->get(array("codformapagamento" => $c->codformapagamento));

               if ($paga) {

                foreach ($paga as $pg) {


                    $data ["CODFORMAPAGAMENTO"] = $pg->codformapagamento;
                    $data ["NOMEFORMAPAGAMENTO"] = $pg->nomeformapagamento;
                    $data ["DESCONTO"] = $pg->descontoformapagamento;
                    $data ["PARCELAS"] = $pg->maximoparcelasformapagamento;


                    $valorfinalcompra = null;

                    $numParcelas = null;

                    if ($c->codformapagamento > 0) {
                        $valorfinalcompra = $c->valorfinalcompra - $pg->descontoformapagamento;

                        if ($pg->maximoparcelasformapagamento > 0) {
                            $numParcelas = $valorfinalcompra / $pg->maximoparcelasformapagamento;
                        }

                    } else {
                        $valorfinalcompra = $c->valorcompra;
                    }


                }


            } else {

                $data ["NOMEFORMAPAGAMENTO"] = null;
                $data ["DESCONTO"] = null;
                $data ["PARCELAS"] = null;

            }


            $selectformpagamento = $this->FormaPagamento->get(array(), FALSE);

            if ($selectformpagamento) {

                foreach ($selectformpagamento as $fs) {

                    if ($fs->habilitaformapagamento == 'S') {
                        $data ["BLC_FORMADEPAGAMENTO"] [] = array(

                            "codformapagamento" => $fs->codformapagamento,
                            "NOME" => $fs->nomeformapagamento,
                            "DESCONTO" => $fs->descontoformapagamento,
                            "PARCELAS" => $fs->maximoparcelasformapagamento,
                            "sel_tipoformapagamento" => ($c->codformapagamento == $fs->codformapagamento) ? 'selected="selected"' : null

                        );
                    }

                }

            }

        }


    }

    $this->parser->parse("painel/resumo", $data);
}

public function atualizapedido()
{
    $codcarrinho = $this->input->post("codcarrinho");
    $situacao = $this->input->post("situacao");

    $itens = array();
    $itens ["situacao"] = $situacao;
    $this->CarrinhoM->update($itens, $codcarrinho);
    $this->session->set_flashdata('sucesso', 'Carrinho atualizado.');

    $descricao = "";

    switch ($situacao) {
        case "1" :
        $descricao = "Pagamento confirmado";
        break;
        case "2" :
        $descricao = "Aguardando Pagamento";
        break;
        case "3" :
        $descricao = "Pagamento recusado";
        break;
        case "4" :
        $descricao = "Cancelado";
        break;
    }

    $carrinho = $this->CarrinhoM->get(array(
        "c.codcarrinho" => $codcarrinho
    ), TRUE);

    $comprador = $this->CompradorM->get(array(
        "codcomprador" => $carrinho->codcomprador
    ), TRUE);

    $this->load->library("email");
    $this->email->from("contato@faculdadenortesul.com.br", "Facudade Nortesul");
    $this->email->to($comprador->emailcomprador);
    $this->email->subject("Seu Pedido {$codcarrinho} foi {$descricao}.");
    $this->email->message("O Pedido {$codcarrinho} foi {$descricao}.");
    $this->email->send();

    redirect('painel/carrinho/resumo/' . $codcarrinho);
}

public function atualizaformadepagamento()
{
    $codcarrinho = $this->input->post("codcarrinho");
    $situacao = $this->input->post("formapagamento");

    $itens = array();
    $itens ["codformapagamento"] = $situacao;
    $this->CarrinhoM->update($itens, $codcarrinho);
    $this->session->set_flashdata('sucesso', 'Forma de Pagamento Alterada.');


    redirect('painel/carrinho/resumo/' . $codcarrinho);
}

}