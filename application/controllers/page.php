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
		$this->load->model('Departamento_Model', 'DepartamentoM');
		$this->load->model('ProdutoDepartamento_Model', 'ProdDepM');

		$data ['BLC_SEMDADOS'] = array();
		$data ['BLC_DADOS'] = array();
		$data ['BLC_CATEGORIAS'] = array();
		
		$tipoproduto = null;

		$res = $this->ProdutoM->get ( array (), FALSE, FALSE , FALSE);

		$categoria = $this->DepartamentoM->get(array(), FALSE, FALSE);
		if ($categoria) {
			foreach($categoria as $c) {
				$data['BLC_CATEGORIAS'][] = array(
					"ID"        => $c->codepartamento,
					"NOME"		=> $c->nomedepartamento,
				);
			}
		}

		if ($res) {

			foreach ( $res as $r ) {

				$foto = $this->ProdutoFotoM->getFoto ( $r->codproduto );

				if (! $foto) {
					$urlFoto = base_url ( "assets/images/foto-indisponivel.png" );
				}

				if ($foto) {

					foreach ( $foto as $f ) {
						$urlFoto = base_url ( "assets/images/produto/150x150/" . $f->codprodutofoto . "." . $f->produtofotoextensao );
					}
				}


				$aDepartamentosVinculados = array ();

				$depVinc = $this->ProdDepM->get ( array (
					"dp.codproduto" => $r->codproduto
				) );

				if ($depVinc) {
					foreach ( $depVinc as $depv ) {
						$aDepartamentosVinculados [] = array(
							"codprodutodepartamento" => $depv->codprodutodepartamento
						);
					}
				}

				$urlProduto = site_url("produto/".$r->codproduto."/".$r->urlseo);
				$precoPromocional = array();
				$valorFinal = $r->valor;
				if (($r->valorpromocional > 0) && ($r->valorpromocional < $r->valor)){
					$precoPromocional [] = array(
						"VALORANTIGO" => number_format($r->valor, 2, ",", ".")
					);

					$valorFinal = $r->valorpromocional;
				}

				$valorPar = $valorFinal / 12;

				$data['BLC_DADOS'] [] = array (
					"CODPRODUTO"		    => $r->codproduto,
					"NOME" 				    => $r->nomeproduto,
					"FICHA"                 => $r->fichaproduto,
					"IMAGEMDESTACADA" 	    => $urlFoto,
					"URLSEO"                => $urlProduto,
					"VALOR"                 => number_format($valorFinal, 2, ",", "."),
					"BLC_PRECOPROMOCIONAL"  => $precoPromocional,
					"VALORPR"              => number_format ( $valorPar, 2, ",", "." ),
					"DEP"                   => $aDepartamentosVinculados
				);

			}


		} else {
			$data ['BLC_SEMDADOS'] [] = array ();
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