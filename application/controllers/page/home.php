<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct ();
       
    }

    public function index() {

        $data = array();
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $mes = strftime('%B', strtotime('today'));


        $numProduto         = $this->Relatorio->getNumProduto();
        $numComprador       = $this->Relatorio->getNumComprador();
        $qtdVendasMensais   = $this->Relatorio->getVendasMensais( array("month(datahoracompra)" => date('m')));

        $data ['BLC_INFO'] [] = array(
            "QTDPRODUTO"        => $numProduto->quantidadeProduto,
            "QTDCOMPRADOR"      => $numComprador->quantidadeComprador,
            "mes"               => $mes,
            "QTDVENDASMENSAIS"  => $qtdVendasMensais->quantidade
        );

        $this->parser->parse ( 'site/contact', $data );

    }

}