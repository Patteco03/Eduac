<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class Produto extends CI_Controller {
    public function __construct() {
        parent::__construct ();
        $this->layout = SINGLE_LOJA;
        $this->load->model ( "Produto_Model", "ProdutoM" );
        $this->load->model ( "ProdutoFoto_Model", "ProdutoFotoM" );
        $this->load->model ( "Sku_Model", "SkuM" );
        $this->load->model ( "FotoSku_Model", "FotoSkuM" );
    }
    
    /**
     * Exibe a ficha do produto
     *
     * @param integer $codproduto            
     */
    public function getFicha($codproduto) {
        $data = array ();
        
        $info = $this->ProdutoM->get ( array (
            "codproduto" => $codproduto 
            ), TRUE );
        
        if (! $info) {
            show_error ( utf8_decode ( "Produto que você procura não foi encontrado." ), 404, utf8_decode ( "Produto não encontrado" ) );
        }
        
        $data ["NOMEPRODUTO"]           = $info->nomeproduto;
        $data ["DESCRICAOBASICA"]       = $info->resumoproduto;
        $data ["DESCRICAOCOMPLETA"]     = $info->fichaproduto;
        $data ["DURACAO"]               = $info->duracao;
        $data ["BLC_PROMOCAO"]          = array ();
        $data ["BLC_SKUSIMPLES"]        = array ();
        $data ["BLC_SKUCOMPLEXO"]       = array ();
        $data ["CODPRODUTO"]            = $codproduto;
        $data ["BLC_GALERIA"]           = array ();
        $data ["BLC_CURSOSPRESENCIAIS"] = array ();
        $data ['BLC_PROFESSORES']       = array ();  
        
        if (! empty ( $info->codtipoatributo )) {
            $sku = $this->SkuM->getPorProdutoAtributo ( $codproduto );
            
            $i = 0;
            foreach ( $sku as $s ) {

                $i++;
                $data ["BLC_SKUCOMPLEXO"] [] = array (
                    "CODSKU"       => $s->codsku,
                    "NOMEATRIBUTO" => $s->nomeatributo,
                    "REFERENCIA"   => $s->referencia,
                    "SELECTEDSKU"  => ($i==sizeof($sku))?"checked":null
                    );

            }
            
        } else {
            $sku = $this->SkuM->getPorProdutoSimples ( $codproduto );
            $data ["BLC_SKUSIMPLES"] [] = array (
                "CODSKU" => $sku->codsku 
                );
            
        }
        $foto = $this->ProdutoFotoM->get ( array (
            "p.codproduto" => $codproduto 
            ), TRUE );
        
        if ($foto) {
            $data ["FOTOPRINCIPAL"] = base_url ( "assets/img/produto/150x150/" . $foto->codprodutofoto . "." . $foto->produtofotoextensao );
        } else {
            $data ["FOTOPRINCIPAL"] = base_url ( "assets/img/foto-indisponivel.jpg" );
        }

        $precoPromocional = array ();

        $valorFinal = $info->valor;

        if (($info->valorpromocional > 0) && ($info->valorpromocional < $info->valorproduto)) {
            $precoPromocional [] = array (
                "VALORANTIGO" => number_format ( $info->valorproduto, 2, ",", "." )
                );

            $valorFinal = $p->valorpromocional;
        }

        $produto = $this->ProdutoM->getCursoPorCategoria ($info->codtipoatributo);

        foreach ( $produto as $p ) {

            $filtroFoto = array (
                "p.codproduto" => $p->codproduto
                );

            $foto = $this->ProdutoFotoM->get ( $filtroFoto, TRUE );

            $url = base_url ( "assets/img/foto-indisponivel.jpg" );

            if ($foto) {
                $url = base_url ( "assets/img/produto/150x150/" . $foto->codprodutofoto . "." . $foto->produtofotoextensao );
            }

            $urlFicha = ci_site_url ( "produto/" . $p->codproduto . "/" . $p->urlseo );

            $precoPromocionalP = array ();

            $valorFinalP = $p->valor;

            if (($p->valorpromocional > 0) && ($p->valorpromocional < $p->valor)) {
                $precoPromocionalP [] = array (
                    "VALORANTIGO" => number_format ( $p->valor, 2, ",", "." )
                    );

                $valorFinalP = $p->valorpromocional;
            }
            
            $valorParceladoP = $valorFinalP / 12;

            $data ["BLC_CURSOSPRESENCIAIS"] [] = array (
             "URLFOTO"              => $url,
             "URLPRODUTO"           => $urlFicha,
             "CODPRODUTO"           => $p->codproduto,
             "NOMEPRODUTO"          => $p->nomeproduto,
             "FICHAPRODUTO"         => $p->fichaproduto,
             "BLC_PRECOPROMOCIONAL" => $precoPromocionalP,
             "VALOR"                => number_format ( $valorFinalP, 2, ",", "." ),
             "VALORPR"              => number_format ( $valorParceladoP, 2, ",", "." ),
             );
        }


        $data ["BLC_PRECOPROMOCIONAL"] = $precoPromocional;
        $data ["VALOR"] = number_format ( $valorFinal, 2, ",", "." );

        $this->load->model ( 'UsuarioProduto_Model', 'UsuarioPro' );

        $UsuVinc = $this->UsuarioPro->getUsuarioProduto ($codproduto);

        if ($UsuVinc) {

            foreach ($UsuVinc as $us) {

                if (!$us->image) {
                    $fotopf = base_url("assets/img/user.png");
                }else{
                    $fotopf = base_url($us->image);
                }

                $data ['BLC_PROFESSORES'] [] = array(

                    "NOMEPROFESSOR"  => $us->nomeusuario ,
                    "DISCIPLINA"     => $us->disciplina,
                    "IMG"            => $fotopf

                );

            }
        }

        $this->parser->parse ( "ficha_produto", $data );
    }

    public function EnviarEmail()
    {
        // Carrega a library email
        $this->load->library('email');
        //Recupera os dados do formulário
        $dados = $this->input->post();

        //Inicia o processo de configuração para o envio do email
        $config['protocol'] = 'mail'; // define o protocolo utilizado
        $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
        $config['validate'] = TRUE; // define se haverá validação dos endereços de email

        /*
         * Se o usuário escolheu o envio com template, define o 'mailtype' para html, 
         * caso contrário usa text
         */
        $config['mailtype'] = 'text';

        // Inicializa a library Email, passando os parâmetros de configuração
        $this->email->initialize($config);
        
        // Define remetente e destinatário
        $this->email->from('thiagodark1995@gmail.com', 'Thiago de Macedo'); // Remetente
        $this->email->to($dados['email'],$dados['name']); // Destinatário

        // Define o assunto do email
        $this->email->subject('Dúvidas sobre o curso!');

        /*
         * Se o usuário escolheu o envio com template, passa o conteúdo do template para a mensagem
         * caso contrário passa somente o conteúdo do campo 'mensagem'
         */
        $this->email->message($dados['numero']);

        /*
         * Se o envio foi feito com sucesso, define a mensagem de sucesso
         * caso contrário define a mensagem de erro, e carrega a view home
         */
        if($this->email->send())
        {
            $this->session->set_flashdata('success','Email enviado com sucesso!');
            redirect();
        }
        else
        {
            $this->session->set_flashdata('error',$this->email->print_debugger());
            redirect();
        }
    }
    
    public function _remap($method, $params = array()) {

        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            $this->getFicha($method);
        }
    }
}