<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Carrinho extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $CI = &get_instance();
        $CI->config->load("mercadopago", TRUE);
        $config = $CI->config->item('mercadopago');
        $this->load->library('Mercadopago', $config);

        $this->layout = SINGLE_LOJA;
        $this->load->model("Sku_Model", "SkuM");
        $this->load->model("Produto_Model", "ProdutoM");
        $this->load->model("ProdutoFoto_Model", "ProdutoFotoM");
    }

    public function index()
    {
        $carrinho = $this->session->userdata("carrinho");

        if (!$carrinho) {
            $carrinho = array();
        } else {
            $carrinho = unserialize($carrinho);
        }

        $data = array();
        $data ["BLC_PRODUTOS"] = array();
        $data ["BLC_FINALIZAR"] = array();
        $data ["BLC_SEMPRODUTOS"] = array();
        $data ["ACAO"] = 'Meu carrinho - Realização do pedido';
        $data ["CONTINUAR"] = $_SERVER['HTTP_REFERER'];

        if (sizeof($carrinho) === 0) {
            $data ["BLC_SEMPRODUTOS"] [] = array();
        } else {

            if ($carrinho) {
                foreach ($carrinho as $codproduto => $quantidade) {

                    $infoproduto = $this->ProdutoM->get(array(
                        "codproduto" => $codproduto
                    ), TRUE);

                    $filtroFoto = array(
                        "p.codproduto" => $codproduto
                    );

                    $foto = $this->ProdutoFotoM->get($filtroFoto, TRUE);

                    $url = base_url("assets/img/foto-indisponivel.jpg");

                    if ($foto) {
                        $url = base_url("assets/img/produto/150x150/" . $foto->codprodutofoto . "." . $foto->produtofotoextensao);
                    }

                    if (($infoproduto->valorpromocional > 0) && ($infoproduto->valor > $infoproduto->valorpromocional)) {
                        $valorFinal = $infoproduto->valorpromocional;
                    } else {
                        $valorFinal = $infoproduto->valor;
                    }

                    $valorTotal += $valorFinal * $quantidade;

                    $data ["BLC_PRODUTOS"] [] = array(
                        "URLFOTO"       => $url,
                        "NOMEPRODUTO"   => $infoproduto->nomeproduto,
                        "VALOR"         => number_format($valorFinal, 2, ",", "."),
                        "URLREMOVEQTD"  => ci_site_url("carrinho/remove/" . $codproduto)
                    );

                }
            }

            $data ["BLC_FINALIZAR"] [] = array(
                "VALORTOTAL"    => number_format($valorTotal, 2, ",", "."),
                "URLFINALIZAR"  => ci_site_url('carrinho/pagamento')
            );
        }


        $this->parser->parse("carrinho", $data);
    }


    /**
     * Adiciona um produto ao carrinho
     */
    public function adicionar()
    {

        $codproduto = $this->input->post('codproduto');

        $carrinho = $this->session->userdata("carrinho");

        if (!$carrinho) {
            $carrinho = array();
        } else {
            $carrinho = unserialize($carrinho);
        }

        $infoProduto = $this->ProdutoM->get(array(
            "codproduto" => $codproduto
        ), TRUE);

        if ($infoProduto) {

            if (!isset($carrinho[$codproduto])) {
                $carrinho[$codproduto] = 1;
            } else {
                $carrinho[$codproduto] += 1;
            }


        } else {
            $this->session->set_flashdata('erro', 'Não é possivel adicionar produto.');
        }


        $carrinho = serialize($carrinho);
        $this->session->set_userdata("carrinho", $carrinho);

        redirect('carrinho');

    }

    public function remove($codproduto)
    {

        $carrinho = $this->session->userdata("carrinho");

        if (!$carrinho) {
            $carrinho = array();
        } else {
            $carrinho = unserialize($carrinho);
        }

        unset ($carrinho [$codproduto]);

        $carrinho = serialize($carrinho);
        $this->session->set_userdata("carrinho", $carrinho);

        redirect("carrinho");
    }

    public function pagamento()
    {
        clienteLogado(true);

        $carrinho = $this->session->userdata("carrinho");
        $comprador = $this->session->userdata("index");

        $data = array();
        $data ["BLC_PRODUTOS"] = array();
        $data ["BLC_DADOSCOMPRADOR"] = array();
        $data ["ACAO"] = '';
        $config = null;

        $resumo = array();

        $valorFinal = null;
        $valorTotal = null;

        if (!$carrinho) {
            $carrinho = array(); 
        } else {
            $carrinho = unserialize($carrinho);
        }

        if (sizeof($carrinho) === 0) {
            $this->session->set_flashdata('erro', 'Seu carrinho está vazio.');
        } else {
            if ($carrinho) {
                foreach ($carrinho as $codproduto => $quantidade) {

                    $infoproduto = $this->ProdutoM->get(array(
                        "codproduto" => $codproduto
                    ), TRUE);

                    if (($infoproduto->valorpromocional > 0) && ($infoproduto->valor > $infoproduto->valorpromocional)) {
                        $valorFinal = $infoproduto->valorpromocional;
                    } else {
                        $valorFinal = $infoproduto->valor;
                    }

                    $valorTotal += $valorFinal * $quantidade;

                    $resumo [] = array(
                        'descricao'     => $infoproduto->nomeproduto,
                        'valorUni'      => number_format($valorFinal, 2, '.', ''),
                        'quantidade'    => $quantidade
                    );

                    $this->load->model("Comprador_Model", "CompradorM");

                    $infocomprador = $this->CompradorM->get(array(
                        "codcomprador" => $comprador ['codcomprador']
                    ));

                    foreach ($infocomprador as $in) {
                        $cpemail    = $in->emailcomprador;
                        $cpcpf      = $in->cpfcomprador;
                        $cpfirtname = $this->split_name($in->nomecomprador);
                        $cpstreet   = $in->enderecocomprador;
                        $cpcity     = $in->cidadecomprador;
                        $cpuf       = $in->ufcomprador;
                    }

                }
            }

        }


        // insere produtos no formulario
        $data ['BLC_PRODUTOS'][] = array(
            'valor'           => number_format($valorTotal, 2, '.', ''),
            'email'           => $comprador['emailcomprador'],
            'BLC_RESUMO'      => $resumo,
            'VALIDAPAGAMENTO' => ci_site_url('carrinho/finalizar')
        );

        $preference_data = array(
            "transaction_amount" => $valorTotal,
            "description"        => "Pagamento boleto bancário",
            "payment_method_id" => "bolbradesco",
            "payer" => array(
                "first_name"    => $cpfirtname['first_name'],
                "last_name"     => $cpfirtname['last_name'],
                "email"         => $cpemail,
                "identification" => array(
                    "type"   => "CPF",
                    "number" => $cpcpf
                ),
                "address" => array(
                    "street_name"   => $cpstreet,
                    "street_number" => 123,
                    "zip_code"      => "1430",
                    "city"          => $cpcity,
                    "federal_unit"  => $cpuf,
                    "neighborhood"  => $cpcity,

                )
            ),
            "notification_url" => "https://faculdadenortesul.com.br/home/carrinho/notifications",
        );

        $payment = $this->mercadopago->post("/v1/payments", $preference_data);

        $data['GERABOLETO'] = ($payment["response"]["transaction_details"]["external_resource_url"]);


        $this->parser->parse("formapagamento", $data);

    }

    public function finalizar()
    {

        clienteLogado(true);
        $carrinho = $this->session->userdata("carrinho");
        $comprador = $this->session->userdata("index");

        $data = array();
        $data['BLC_DADOS'] = array();
        $codP = null;
        $valorTotal = null;

        if (!$carrinho) {
            $carrinho = array();
        } else {
            $carrinho = unserialize($carrinho);
        }

        if (sizeof($carrinho) === 0) {
            $this->session->set_flashdata('erro', 'Seu carrinho está vazio.');
        } else {
            if ($carrinho) {
                foreach ($carrinho as $codproduto => $quantidade) {

                    $infoproduto = $this->ProdutoM->get(array(
                        "codproduto" => $codproduto
                    ), TRUE);

                    if (($infoproduto->valorpromocional > 0) && ($infoproduto->valor > $infoproduto->valorpromocional)) {
                        $valorFinal = $infoproduto->valorpromocional;
                    } else {
                        $valorFinal = $infoproduto->valor;
                    }

                    $valorTotal += $valorFinal * $quantidade;

                }
            }

        }

        $payment_array = array(
            "transaction_amount" => intval($_POST['amount']), //valor da compra
            "token"              => $_POST['token'], //token gerado pelo javascript da index.php
            "description"        => "Compra de Cursos da Faculdade Nortesul", //descrição da compra
            "installments"       => intval($_POST['installments']), //parcelas
            "payment_method_id"  => $_POST['paymentMethodId'], //forma de pagamento (visa, master, amex...)
            "payer" => array("email" => $_POST['email']), //e-mail do comprador
            "statement_descriptor" => "Faculdade Nortesul" //nome para aparecer na fatura do cartão do cliente
        );

        $payment = $this->mercadopago->post("/v1/payments", $payment_array);

        //If the payment's transaction amount is equal (or bigger) than the merchant order's amount you can release your items
        if ($payment["status"] == 200 || $payment["status"] == 201) {

            $descricao = "";
            $situacao = null;

            switch ($payment["response"]["status"]) {
                case "approved" :
                $descricao = "Pagamento confirmado";
                $situacao = 1;
                break;
                case "in_process" :
                $descricao = "Aguardando Pagamento";
                $situacao = 2;
                break;
                case "rejected" :
                $descricao = "Pagamento recusado";
                $situacao = 3;
                break;
                case "cancelled" :
                $descricao = "Cancelado";
                $situacao = 4;
                break;
                case "pending" :
                $descricao = "O usuário não concluiu o processo de pagamento.";
                $situacao = 5;
                break;
                case "refunded" :
                $descricao = "(estado terminal) O pagamento foi devolvido ao usuário.";
                $situacao = 5;
                break;
                case "in_mediation" :
                $descricao = "Foi iniciada uma disputa para o pagamento.";
                $situacao = 6;
                break;
            }

            $statusDetail = $payment["response"]["status_detail"];

            $messagemError = null;

            switch ($statusDetail) {
                case 'cc_rejected_bad_filled_card_number':
                $messagemError = 'Verifique o número do cartão.';
                break;

                case 'cc_rejected_bad_filled_date':
                $messagemError = 'Verifique a data de validade.';
                break;

                case 'cc_rejected_bad_filled_other':
                $messagemError = 'Revise os dados.';
                break;

                case 'cc_rejected_bad_filled_security_code':
                $messagemError = 'Revise o código de segurança.';
                break;

                case 'cc_rejected_blacklist':
                $messagemError = 'Não foi possível processar o pagamento.';
                break;

                case 'cc_rejected_call_for_authorize':
                $messagemError = 'Você precisa autorizar com payment_method_id o pagamento de amount ao MercadoPago';
                break;

                case 'cc_rejected_card_disabled':
                $messagemError = ' 	Ligue para payment_method_id e ative o seu cartão.
                O telefone está no verso do seu cartão de crédito.';
                break;

                case 'cc_rejected_card_error':
                $messagemError = 'Não foi possível processar o pagamento.';
                break;

                case 'cc_rejected_duplicated_payment':
                $messagemError = 'Você já fez um pagamento desse valor.
                Se você precisa pagar novamente, use outro cartão ou outro meio de pagamento.';
                break;

                case 'cc_rejected_high_risk':
                $messagemError = 'Você já fez um pagamento desse valor.
                Se você precisa pagar novamente, use outro cartão ou outro meio de pagamento.';
                break;

                case 'cc_rejected_duplicated_payment':
                $messagemError = 'O seu pagamento foi recusado.
                Recomendamos que você pague com outros meios de pagamento oferecidos, preferencialmente à vista.';
                break;

                case 'cc_rejected_insufficient_amount':
                $messagemError = 'O seu payment_method_id não tem limite suficiente.';
                break;

                case 'cc_rejected_invalid_installments':
                $messagemError = 'payment_method_id não processa pagamentos em installments parcelas.';
                break;

                case 'cc_rejected_max_attempts':
                $messagemError = 'Você atingiu o limite de tentativas permitidas.
                Use outro cartão ou outro meio de pagamento.';
                break;

                case 'cc_rejected_other_reason':
                $messagemError = 'ID do método de pagamento não foi processado.';
                break;

                default:
                $messagemError = 'Ocorreu um error, pagamento não confirmado';
                break;
            }

            $this->load->model("Carrinho_Model", "CarrinhoM");

            if ($payment["response"]["status"] == 'approved') {

                $objeto = array(
                    "datahoracompra"    => date("Y-m-d H:i:s"),
                    "valorcompra"       => $valorTotal,
                    "codcomprador"      => $comprador ["codcomprador"],
                    "situacao"          => $situacao,
                    "observacao"        => $descricao,
                    "codformapagamento" => 1,
                    "codproduto"        => $codproduto

                );

                $codCarrinho = $this->CarrinhoM->post($objeto);

                if ($codCarrinho){
                    $this->session->unset_userdata('carrinho');
                    $this->session->set_flashdata('sucesso', 'pagamento confirmado.');
                    redirect('conta/perfil');
                }else{
                    $this->session->set_flashdata('erro', 'Ocorreu um erro.');
                    redirect('carrinho/pagamento');
                }


            } elseif ($payment["response"]["status"] == 'rejected') {
                $this->session->set_flashdata('erro', '' . $messagemError);
                redirect('carrinho/pagamento');

            } elseif ($payment["response"]["status"] == 'pending') {
                $this->session->set_flashdata('erro', 'O usuário não concluiu o processo de pagamento.');
                redirect('carrinho/pagamento');

            } elseif ($payment["response"]["status"] == 'in_process') {
                $this->session->set_flashdata('sucesso', 'O pagamento está sendo analisado.');
                redirect('carrinho/pagamento');

            }


        } else {
            $this->session->set_flashdata('erro', 'Ocorreu um erro.');
            redirect('carrinho/pagamento');
        }

    }


    function split_name($name)
    {
        $parts = array();

        while (strlen(trim($name)) > 0) {
            $name = trim($name);
            $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $parts[] = $string;
            $name = trim(preg_replace('#' . $string . '#', '', $name));
        }

        if (empty($parts)) {
            return false;
        }

        $parts = array_reverse($parts);
        $name = array();
        $name['first_name'] = $parts[0];
        $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
        $name['last_name'] = (isset($parts[2])) ? $parts[2] : (isset($parts[1]) ? $parts[1] : '');

        return $name;
    }

    public function destroy()
    {
        $this->carrinho->destroy();

    }

}