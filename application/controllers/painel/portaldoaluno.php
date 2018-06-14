<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class PortalDoAluno extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->layout = LAYOUT_DASHBOARD;
		$this->load->model ( 'Usuario_Model', 'UsuarioM' );
		$this->load->model ( 'Produto_Model', 'ProdutoM' );
		$this->load->model ( 'ProdutoFoto_Model', 'FotoM' );
	}
	public function index() {
		$data = array ();
				
		$data ["NOMEPROFESSOR"] = $professor->nomeusuario;
		$data ["BLC_DADOS"] = array();		
		$data ["BLC_SEMDADOS"] = array();		
		
		$res = $this->ProdutoM->getPorAutor ( array ());
		
		if ($res){

			foreach ( $res as $r ) {
			
				$foto = $this->FotoM->getFoto ( $r->codproduto );
			
				if (! $foto) {
					$urlFoto = base_url ( "assets/img/foto-indisponivel.jpg" );
				}
			
				if ($foto) {
						
					foreach ( $foto as $f ) {
						$urlFoto = base_url ( "assets/img/produto/150x150/" . $f->codprodutofoto . "." . $f->produtofotoextensao );
					}
				}
				
				
				
				$data ["BLC_DADOS"] [] = array(
					"CODPRODUTO"  => $r->codproduto,
					"URLPRODUTO"  => site_url('painel/modulo/videoaula/'.$r->codproduto),
					"URLFOTO"	  => $urlFoto,
					"NOMEPRODUTO" => $r->nomeproduto,
					"DATAINICIO"  => $r->datainicio,
					"DATAFINAL"	  => $r->datafinal,
					"DURACAO"	  => $r->duracao,
					"TIPOCURSO"   => ($r->tipoproduto == 'V')?'Virtual':'Presencial' 	
				);
			

			}
		}
		
		$this->parser->parse ( "painel/portaldoaluno", $data );
	}
	
	public function single(){
		$data = array();
		
		
		
		$this->parser->parse("painel/portaldoalunosingle_form", $data);
		
	}
}