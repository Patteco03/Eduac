<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Page extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->layout = LAYOUT_LOJA;

	}

	public function lojacurso() {	

		$this->load->model('Produto_Model', 'ProdutoM');
		$this->load->model('ProdutoFoto_Model', 'ProdutoFotoM');
		
		$data ["BLC_CURSOSPRESENCIAIS"] = array ();
		$data ["BLC_CURSOSONLINE"] = array ();
		$data ["BLC_SEMDADOS"] = array();
		
		$tipoproduto = null;	
		
		$produtosExibidos = 0;
		$coluna = array ();

		$colunaV = array ();
		
		$codcategoria = 4;
		$produto = $this->ProdutoM->getCursoPorCategoria ( $codcategoria );
		
		if (!$produto){
			$data ['BLC_SEMDADOS'] [] = array ();
		}
		
		foreach ( $produto as $p ) {

			$filtroFoto = array (
				"p.codproduto" => $p->codproduto
			);

			$foto = $this->ProdutoFotoM->get ( $filtroFoto, TRUE );

			$url = base_url ( "assets/images/foto-indisponivel.png" );

			if ($foto) {
				$url = base_url ( "assets/img/produto/150x150/" . $foto->codprodutofoto . "." . $foto->produtofotoextensao );
			}

			$urlFicha = site_url ( "produto/" . $p->codproduto . "/" . $p->urlseo );

			$precoPromocional = array ();

			$valorFinal = $p->valor;
			$valorParcelado = null;

			if (($p->valorpromocional > 0) && ($p->valorpromocional < $p->valor)) {

				$valorFinal = $p->valorpromocional;

				$precoPromocional [] = array (
					"VALORANTIGO"    => number_format ( $p->valor, 2, ",", "." )
				);
			}

			$valorParcelado = $valorFinal / 12;
			
			$coluna [] = array (
				"URLFOTO" => $url,
				"URLPRODUTO" => $urlFicha,
				"CODPRODUTO" => $p->codproduto,
				"NOMEPRODUTO" => $p->nomeproduto,
				"FICHAPRODUTO" => $p->fichaproduto,
				"BLC_PRECOPROMOCIONAL" => $precoPromocional,
				"VALOR" => number_format ( $valorFinal, 2, ",", "." ),
				"VALORPARCELADO" => number_format ( $valorParcelado, 2, ",", ".")
			);

			$produtosExibidos ++;

			if ($produtosExibidos === 4) {
				$produtosExibidos = 0;
				$data ["BLC_CURSOSPRESENCIAIS"] [] = array (
					"BLC_COLUNA" => $coluna
				);

				$data ["BLC_CURSOSONLINE"] [] = array (
					"BLC_COLUNA" => $colunaV
				);

				$coluna = array ();

				$colunaV = array ();



			}
		}

		if ($produtosExibidos > 0) {
			$data ["BLC_CURSOSPRESENCIAIS"] [] = array (
				"BLC_COLUNA" => $coluna
			);

			$data ["BLC_CURSOSONLINE"] [] = array (
				"BLC_COLUNA" => $colunaV
			);
		}
		
		$this->parser->parse ( 'lojacurso', $data );
	}
	public function contact() {
		$this->load->view ( 'site/contact.html' );
	}

	public function about() {
		$this->load->view ( 'site/about.html' );
	}

	public function services() {
		$this->load->view ( 'site/services.html' );
	}

	public function testimonials() {
		$this->load->view ( 'site/testimonials.html' );
	}

	public function faq() {
		$this->load->view ( 'site/faq.html' );
	}

	public function gallery() {
		$this->load->view ( 'site/gallery.html' );
	}

	public function timeline() {
		$this->load->view ( 'site/timeline.html' );
	}

	public function team() {
		$this->load->view ( 'site/team.html' );
	}

	public function pricing() {
		$this->load->view ( 'site/pricing.html' );
	}

	public function columns() {
		$this->load->view ( 'site/columns.html' );
	}

	public function rightsidebar() {
		$this->load->view ( 'site/rightsidebar.html' );
	}

	public function e404() {
		$this->load->view ( 'site/404.html' );
	}
	
}