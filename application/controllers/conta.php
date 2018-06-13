<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Conta extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->layout = LAYOUT_LOJA;
		$this->load->model ( 'Comprador_Model', 'CompradorM' );
		$this->load->model ( 'Compradorfoto_Model', 'FotocompradorM' );
		$this->load->model ( 'Produto_Model', 'ProdutoM' );
		$this->load->model ( 'Modulo_Model', 'ModuloM' );
		$this->load->model ( 'Arquivo_Model', 'ArquivoM' );
		$this->load->model ( 'Carrinho_Model', 'CarrinhoM' );
		$this->load->model ( 'ProdutoFoto_Model', 'FotoM' );
	}
	public function novaconta() {
		
		$this->title = "Criar uma nova conta";
		$this->showDepartamento = FALSE;
		
		$data = array ();
		$data ['ACAO'] = 'Cadastre-se para ter acesso ao nosso conteúdo';
		$data ['ACAOFORM'] = site_url ( 'conta/salvar' );
		$data ['view_senha'] = 'show';
		$data ['senha_view'] = 'hide';
		
		$data ['nomecomprador'] = null;
		$data ['cpfcomprador'] = null;
		$data ['cepcomprador'] = null;
		$data ['enderecocomprador'] = null;
		$data ['cidadecomprador'] = null;
		$data ['ufcomprador'] = null;
		$data ['emailcomprador'] = null;
		$data ['telefonecomprador'] = null;
		$data ['sexocomprador'] = null;
		$data ['senhacomprador'] = null;
		
		$this->parser->parse ( 'conta_form', $data );
	}
	public function salvar() {
		$codcomprador	    = $this->input->post('codcomprador');
		$nomecomprador	    = $this->input->post('nomecomprador');
		$enderecocomprador	= $this->input->post('enderecocomprador');
		$cidadecomprador	= $this->input->post('cidadecomprador');
		$ufcomprador		= $this->input->post('ufcomprador');
		$cepcomprador		= $this->input->post('cepcomprador');
		$emailcomprador		= $this->input->post('emailcomprador');
		$cpfcomprador		= $this->input->post('cpfcomprador');
		$sexocomprador		= $this->input->post('sexocomprador');
		$senhacomprador		= $this->input->post('senhacomprador');
		$telefonecomprador	= $this->input->post('telefonecomprador');
		$status				= 1;

		$cpfcomprador  = str_replace(".", null, $cpfcomprador);
		$cpfcomprador  = str_replace("-", null, $cpfcomprador);
		$cpfcomprador  = str_replace(" ", null, $cpfcomprador);
		$cepcomprador  = str_replace("-", null, $cepcomprador);

		$erros			= FALSE;
		$mensagem		= null;

		if (!$nomecomprador) {
			$erros		= TRUE;
			$mensagem	.= "Informe nome do comprador.\n";
		}

		$codcomprador = '';

		if (!$emailcomprador) {
			$erros		= TRUE;
			$mensagem	.= "Informe o email do comprador.\n";
		} else {
			if (!filter_var($emailcomprador, FILTER_VALIDATE_EMAIL)) {
				$erros		= TRUE;
				$mensagem	.= "Este email é inválido.\n";
			} else {
				$total = $this->CompradorM->validaEmailDuplicado($codcomprador, $emailcomprador);
				if ($total > 0) {
					$erros		= TRUE;
					$mensagem	.= "Este email já está sendo utilizado.\n";
				}
			}
		}

		if (! validaCPF ( $cpfcomprador )) {
			$erros = TRUE;
			$this->session->set_flashdata ( 'erro', 'Informe um CPF correto.' );
			redirect ( 'conta/novaconta' );
		} else {
			$cpfUsado = $this->CompradorM->validaCPFDuplicado ( $codcomprador, $cpfcomprador );
			if ($cpfUsado > 0) {
				$this->session->set_flashdata ( 'erro', 'Já há um cliente utilizando este CPF.' );
				redirect ( 'conta/novaconta' );
			}
		}

		if (!$enderecocomprador) {
			$erros		= TRUE;
			$mensagem	.= "Informe o endereço do comprador.\n";
		}

		if (!$cidadecomprador) {
			$erros		= TRUE;
			$mensagem	.= "Informe a cidade do comprador.\n";
		}

		if (!$cepcomprador) {
			$erros		= TRUE;
			$mensagem	.= "Informe o CEP.\n";
		}

		if (!$cpfcomprador) {
			$erros		= TRUE;
			$mensagem	.= "Informe o CPF.\n";
		} else {
			if (!validaCPF($cpfcomprador)) {
				$erros		= TRUE;
				$mensagem	.= "CPF informado é inválido.\n";
			} else {
				$cpfUsado = $this->CompradorM->validaCPFDuplicado($codcomprador, $cpfcomprador);
				if ($cpfUsado > 0) {
					$erros		= TRUE;
					$mensagem	.= "Este CPF já está sendo utilizado.\n";
				}
			}
		}

		if (!$erros) {
			$itens	= array(
				"nomecomprador"	    => $nomecomprador,
				"enderecocomprador"	=> $enderecocomprador,
				"cidadecomprador"	=> $cidadecomprador,
				"ufcomprador"	    => $ufcomprador,
				"cepcomprador"	    => $cepcomprador,
				"emailcomprador"	=> $emailcomprador,
				"cpfcomprador"	    => $cpfcomprador,
				"sexocomprador"	    => $sexocomprador,
				"status"		    => $status,
				"telefonecomprador" => $telefonecomprador,
				"senhacomprador" 	=> $senhacomprador,
			);


			if ($senhacomprador) {
				$itens['senhacomprador'] = sha1($senhacomprador);
			}

			if ($codcomprador) {
				$codcomprador = $this->CompradorM->update($itens, $codcomprador);
			} else {
				$codcomprador = $this->CompradorM->post($itens);
			}

			if ($codcomprador) {
				$this->session->set_flashdata('sucesso', 'Dados inseridos com sucesso.');
				redirect('conta/perfil');
			} else {
				$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');

				if ($codcomprador) {
					redirect('conta/editar/'.$codcomprador);
				} else {
					redirect('conta/novaconta');
				}
			}
		} else {
			$this->session->set_flashdata('erro', nl2br($mensagem));
			if ($codcomprador) {
				redirect('conta/editar/'.$codcomprador);
			} else {
				redirect('conta/novaconta');
			}
		}

	}
	public function login() {		
		$data = array ();
		$data ["URLVALIDACONTA"] = site_url ( "conta/valida" );
		
		$this->parser->parse ( "login", $data );
	}
	public function valida() {
		$email = $this->input->post ( "email" );
		$senha = $this->input->post ( "senha" );
		
		
		$this->load->library ( 'form_validation' );
		
		$this->form_validation->set_rules ( 'email', 'Email', 'required|valid_email' );
		$this->form_validation->set_rules ( 'senha', 'Senha', 'required' );
		
		if ($this->form_validation->run () == FALSE) {
			$this->session->set_flashdata ( 'erro', 'Informe os campos corretamente.' . validation_errors () );
			redirect ( 'conta/login' );
		}
		
		$infoComprador = $this->CompradorM->get ( array (
			"emailcomprador" => $email,
			"senhacomprador" => sha1 ( $senha ) 
		), TRUE );
		
		if (! $infoComprador) {
			$this->session->set_flashdata ( 'erro', 'Email ou senha inválidos.' );
			redirect ( 'conta/login' );
		} else {

			$sessaoindex = array (
				'nomecomprador'  => $infoComprador->nomecomprador,
				'emailcomprador' => $infoComprador->emailcomprador,
				'codcomprador'   => $infoComprador->codcomprador,
				'status'		 =>	$infoComprador->status, 
			);
			
			$this->session->set_userdata ( 'index', $sessaoindex );
			redirect ('portal' );
			
		}
		
	}
	public function sair() {
		$this->session->unset_userdata ( 'index' );
		redirect ( 'conta/login' );
	}
	public function perfil() {
		
		clienteLogado(true);
		
		$data = array ();
		
		$comprador = $this->session->userdata ( 'index' );
		
		$infocomprador = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador'] 
		) );
		
		
		
		if (! $infocomprador) {
			redirect('conta/login');
		}else{
			if ($comprador['tipo'] === 'P'){
				redirect('portal');
			}
		}
		

		
		if ($infocomprador) {
			
			foreach ( $infocomprador as $r ) {
				
				$foto = $this->FotocompradorM->get ( $r->codcomprador );
				
				if ($foto) {
					
					foreach ( $foto as $f ) {
						
						$urlFoto = base_url ( "assets/img/user.png" );
						
						if ($foto) {
							$urlFoto = base_url ( "assets/img/profile/" . $f->codcompradorfoto . "." . $f->compradorfotoextensao );
						}
						
						$data ['URLFOTO'] = $urlFoto;
					}
				}
			}
		}
		
		$data ['ACAO'] 				= 'Área do aluno';
		$data ['NOMECOMPRADOR'] 	= $comprador ['nomecomprador'];
		$data ['EDITARFORM'] 		= site_url ( 'conta/editar' );
		$data ['SALVAFOTOPERFIL'] 	= site_url ( 'conta/salvafotoperfil' );
		$data ['CODCOMPRADOR'] 		= $comprador ['codcomprador'];
		$data ['URLMEUSCURSOS'] 	= site_url ( 'conta/meuscursos' );
		$data ['ALTERARSENHA'] 		= site_url ( 'portal/alterarsenha' );

		
		$this->parser->parse ( 'perfil', $data );


	}
	public function pedidos() {
		clienteLogado ( true );
		
		$comprador = $this->session->userdata ( 'index' );
		
		$pg = $this->input->get ( "pg" );
		
		if (! $pg) {
			$pg = 0;
		} else {
			$pg --;
		}
		
		$this->load->model ( "Carrinho_Model", "CarrinhoM" );
		
		$totalItens = $this->CarrinhoM->getTotal ( array (
			"codcomprador" => $comprador ["codcomprador"] 
		) );
		
		$totalPaginas = ceil ( $totalItens / LINHAS_PESQUISA_DASHBOARD );
		
		$data = array ();
		$data ["BLC_DADOS"] = array ();
		$data ["BLC_PAGINACAO"] = array ();
		
		$data ["BLC_PAGINACAO"] = array ();
		
		$paginas = array ();
		
		for($i = 1; $i <= $totalPaginas; $i ++) {
			$paginas [] = array (
				"URLPAGINA" => current_url () . "?&pg={$i}",
				"INDICE" => $i 
			);
		}
		
		$data ["BLC_PAGINACAO"] [] = array (
			"BLC_PAGINA" => $paginas 
		);
		
		$carrinho = $this->CarrinhoM->get ( array (
			"c.codcomprador" => $comprador ["codcomprador"] 
		), FALSE, $pg );
		
		if ($carrinho) {
			foreach ( $carrinho as $car ) {
				$data ["BLC_DADOS"] [] = array (
					"URLRESUMO" => site_url ( 'conta/resumo/' . $car->codcarrinho ),
					"CODPEDIDO" => $car->codcarrinho,
					"DATA" => $car->data,
					"VALOR" => number_format ( $car->valorcompra, 2, ",", "." ) 
				);
			}
		}
		
		$this->parser->parse ( "lista_carrinho", $data );
	}
	public function resumo($codcarrinho) {
		clienteLogado (true);
		
		$comprador = $this->session->userdata ( 'index' );
		
		$this->load->model ( "Carrinho_Model", "CarrinhoM" );
		$this->load->model ( "ItemCarrinho_Model", "ItemCarrinhoM" );
		
		$carrinho = $this->CarrinhoM->get ( array (
			"c.codcarrinho" => $codcarrinho,
			"c.codcomprador" => $comprador ["codcomprador"] 
		), TRUE );
		
		if (! $carrinho) {
			$this->session->set_flashdata ( 'erro', 'Carrinho não existente.' );
			redirect ( 'conta' );
		}
		
		$data = array ();
		
		$data ["BLC_SHOWBOLETO"] = array ();
		
		$formasBoleto = array (
			"3" 
		);
		
		$data ["CODCARRINHO"] = $codcarrinho;
		
		if ((in_array ( $carrinho->codformapagamento, $formasBoleto )) && ($carrinho->situacao == CAR_ABERTO)) {
			
			switch ($carrinho->codformapagamento) {
				case "3" :
				$tipoBoleto = "bb";
				break;
			}
			
			$data ["BLC_SHOWBOLETO"] [] = array (
				"URLBOLETO" => site_url ( 'conta/boleto/' . $codcarrinho . '/' . $tipoBoleto ) 
			);
		}
		
		$data ["DATA"] = $carrinho->data;
		$data ["NOMEFORMAPAGAMENTO"] = $carrinho->nomeformapagamento;
		$data ["NOMEFORMAENTREGA"] = $carrinho->nomeformaentrega;
		$data ["VALORFINALCOMPRA"] = number_format ( $carrinho->valorfinalcompra, 2, ",", "." );
		
		$itens = $this->ItemCarrinhoM->get ( array (
			"ic.codcarrinho" => $codcarrinho 
		) );
		
		$data ["BLC_DADOS"] = array ();
		
		if ($itens) {
			foreach ( $itens as $i ) {
				$data ["BLC_DADOS"] [] = array (
					"NOMEPRODUTO" => $i->nomeproduto,
					"QTD" => $i->quantidadeitem,
					"VLRUN" => number_format ( $i->valoritem, 2, ",", "." ),
					"VLRTOTAL" => number_format ( $i->valorfinal, 2, ",", "." ) 
				);
			}
		}
		
		$this->parser->parse ( "resumo", $data );
	}
	public function boleto($codcarrinho, $tipo) {
		clienteLogado ( true );
		
		$comprador = $this->session->userdata ( 'index' );
		
		$this->load->model ( "Carrinho_Model", "CarrinhoM" );
		
		$carrinho = $this->CarrinhoM->get ( array (
			"c.codcarrinho" => $codcarrinho,
			"c.codcomprador" => $comprador ["codcomprador"] 
		), TRUE );
		
		if (! $carrinho) {
			$this->session->set_flashdata ( 'erro', 'Carrinho não existente.' );
			redirect ( 'conta' );
		}
		
		$this->layout = '';
		
		switch ($tipo) {
			case "bb" :
			$arquivoBoleto = "boleto_bb";
			break;
		}
		
		$boleto = new stdClass ();
		$boleto->codcarrinho = $carrinho->codcarrinho;
		$boleto->valor = $carrinho->valorfinalcompra;
		$boleto->nomecomprador = $carrinho->nomecomprador;
		$boleto->endereco = $carrinho->enderecocomprador;
		$boleto->endereco2 = $carrinho->cidadecomprador . "/" . $carrinho->ufcomprador . " - " . $carrinho->cepcomprador;
		
		require_once FCPATH . "/application/libraries/boleto/" . $arquivoBoleto . ".php";
	}
	public function editar() {
		$comprador = $this->session->userdata ( 'index' );
		
		$data = array ();
		$data ['ACAO'] = 'Editar cadastro';
		$data ['ACAOFORM'] = site_url ( 'conta/salvar' );
		$data ['ACAOFORMSENHA'] = site_url ( 'conta/redefinirsenha' );
		$data ['view_senha'] = 'hide';
		$data ['senha_view'] = 'show';
		
		$conteudo = array ();
		
		$res = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador'] 
		), TRUE );
		
		if ($res) {
			foreach ( $res as $chave => $valor ) {
				$data [$chave] = $valor;
			}
		} else {
			show_error ( 'Não foram encontrados dados.', 500, 'Ops, erro encontrado.' );
		}
		
		$data ['ufcomprador_' . $res->ufcomprador] = 'selected="selected"';
		$data ['tipo_' . $res->tipo] = 'selected="selected"';
		
		if ($res->sexocomprador === 'M') {
			$data ['sexocomprador_' . $res->sexocomprador] = 'checked="checked"';
		} else {
			$data ['sexocomprador_' . $res->sexocomprador] = 'checked="checked"';
		}
		
		$this->parser->parse ( 'conta_form', $data );
	}
	public function salvafotoperfil() {
		$codcomprador = $this->input->post ( 'codcomprador' );
		$arquivo = $_FILES ['fotos'];
		
		if ($arquivo ['error'] [0]) {
		}
		
		$arquivoNome = $arquivo ["name"] [0];
		
		$extensao = strtolower ( pathinfo ( $arquivoNome, PATHINFO_EXTENSION ) );
		
		$foto = array (
			"codcomprador" => $codcomprador,
			"compradorfotoextensao" => $extensao 
		);
		
		$codfoto = $this->FotocompradorM->post ( $foto );
		
		$enderecoFoto = '/assets/img/profile/' . $codfoto . '.' . $extensao;
		
		move_uploaded_file ( $arquivo ['tmp_name'] [0], FCPATH . $enderecoFoto );
		
		// CRIA A MINIATURA DA FOTO DO PERFIL
		$this->redimensionaFoto ( $codfoto, $extensao, 100, 100 );
		
		$jsonRetorno = array (
			"files" => array (
				array (
					"name" => $arquivo ["name"] [0],
					"type" => $arquivo ["type"] [0],
					"url" => base_url ( $enderecoFoto ),
					"thumbnarilUrl" => base_url ( $enderecoFoto ),
					"deleteUrl" => site_url ( 'painel/profile/removefoto/' . $codfoto . '/' . $codcomprador ),
					"deleteType" => 'DELETE' 
				) 
			) 
		);
		
		if ($jsonRetorno) {
			$this->session->set_flashdata ( 'sucesso', 'foto alterada com sucesso.' );
			redirect ( 'conta/perfil' );
		} else {
			$this->session->set_flashdata ( 'erro', 'falha ao tentar enviar foto.' );
			redirect ( 'conta/perfil' );
		}
	}
	
	/**
	 * Redimensiona as imagens
	 *
	 * @param integer $codprodutofoto        	
	 * @param string $extensao        	
	 * @param integer $altura        	
	 * @param integer $largura        	
	 */
	private function redimensionaFoto($codprodutofoto, $extensao, $altura, $largura) {
		if (! is_dir ( FCPATH . "/assets/img/produto/{$altura}x{$largura}/" )) {
			mkdir ( FCPATH . "/assets/img/produto/{$altura}x{$largura}/" );
		}
		
		$configImagem ['image_library'] = 'gd2'; // BIBLIOTECA RESPONSÁVEL PELO REDIMENSIONAMENTO
		$configImagem ['source_image'] = FCPATH . '/assets/img/produto/original/' . $codprodutofoto . '.' . $extensao;
		$configImagem ['new_image'] = FCPATH . "/assets/img/produto/{$altura}x{$largura}/" . $codprodutofoto . '.' . $extensao;
		$configImagem ['create_thumb'] = FALSE;
		$configImagem ['maintain_ratio'] = TRUE;
		$configImagem ['width'] = $largura;
		$configImagem ['height'] = $altura;
		
		$this->load->library ( 'image_lib' );
		$this->image_lib->clear ();
		$this->image_lib->initialize ( $configImagem );
		
		$this->image_lib->resize ();
	}
	public function buscarcep() {
		$cep = $_POST ['cepcomprador'];
		
		$reg = simplexml_load_file ( "http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep );
		
		$dados ['sucesso'] = ( string ) $reg->resultado;
		$dados ['rua'] = ( string ) $reg->tipo_logradouro . ' ' . $reg->logradouro;
		$dados ['bairro'] = ( string ) $reg->bairro;
		$dados ['cidade'] = ( string ) $reg->cidade;
		$dados ['estado'] = ( string ) $reg->uf;
		
		echo json_encode ( $dados );
	}
	public function redefinirsenha() {
		clienteLogado(true);
		
		$comprador = $this->session->userdata ( 'index' );
		
		$data = array ();
		
		$senha = sha1(strip_tags($this->input->post ( 'senhaantigacomprador' )));
		$senha_nova = sha1(strip_tags($this->input->post ( 'senhacomprador' )));
		$confirme_senha = sha1(strip_tags($this->input->post ( 'confirm_password' )));

		
		$res = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador'] 
		), TRUE );

		$erros			= FALSE;
		$mensagem		= null;


		if (!$senha) {
			$erros		= TRUE;
			$mensagem	.= "Informe a senha atual.\n";
		}

		if (!$senha_nova) {
			$erros		= TRUE;
			$mensagem	.= "Informe a nova senha.\n";
		}

		if (!$confirme_senha) {
			$erros		= TRUE;
			$mensagem	.= "Informe a confirmação da senha.\n";
		}


		if (!$erros) {

			if ($senha != $res->senhacomprador) {
				$mensagem .= "As senhas não conhecidem..\n";
			}else{

				$itens = array(
					"senhacomprador" => $senha_nova
				);

				$comprador['codcomprador'] = $this->CompradorM->update($itens, $comprador['codcomprador']);

				if ($comprador ['codcomprador']) {
					$this->session->set_flashdata('sucesso', 'Senha Alterada com sucesso.');
					redirect('portal');
				} else {
					$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');

					if ($comprador['codcomprador']) {
						redirect('portal/alterarsenha');
					} else {
						redirect('portal/alterarsenha');
					}
				}
			}
			
		}else {
			$this->session->set_flashdata('erro', nl2br($mensagem));
			if ($codepartamento) {
				redirect('portal/alterarsenha');
			} else {
				redirect('portal/alterarsenha');
			}
		}



	}
	public function meuscursos() {

		clienteLogado(true);

		$data = array ();
		
		$data ['ACAO'] = 'Lista de cursos';
		$data ['URLHOME'] = site_url ();
		$data ['URLPERFIL'] = site_url ( "conta/perfil/" );

		$comprador = $this->session->userdata ( 'index' );

		if ($comprador['tipo'] === 'P'){
			redirect('portal/financeiro');
		}
		
		$pagina = $this->input->get ( 'pagina' );
		
		if (! $pagina) {
			$pagina = 0;
		} else {
			$pagina = ($pagina - 1) * LINHAS_PESQUISA_DASHBOARD;
		}
		
		$data ["BLC_DADOS"] = array ();
		$data ["BLC_PAGINAS"] = array ();
		
		$data ["BLC_SEMDADOS"] = array ();
		

		$carrinho = $this->CarrinhoM->get ( array ("c.codcomprador" => $comprador ["codcomprador"]), FALSE, $pagina );

		$contador = null;

		if (isset($carrinho)){

			$modulos = array();

			foreach ($carrinho as $c){

				$liberacao = FALSE;

				if ($c->situacao == '1') {

					$liberacao = TRUE;

					$modulos = array();

					$infoproduto = $this->ProdutoM->get(array("codproduto"=>$c->codproduto),TRUE,0);

					$contador = $contador + 1;

					$data ['BLC_DADOS']	[] = array(
						"nomecurso"		=> $infoproduto->nomeproduto,
						"i"				=> $contador,
						"URLVIDEOAULA"  => site_url('conta/playlist/'.$c->codproduto),
						"datahoracompra"=> date("F j, Y, g:i a", strtotime($c->datahoracompra))
					);

				}else{

					$liberacao = FALSE;

					$data ['BLC_SEMDADOS'] []  = array();

				}			

			}


		}else {
			$data ['BLC_SEMDADOS'] []  = array();
		}


		$totalItens = $this->CarrinhoM->getTotal ( array ("codcomprador" => $comprador ["codcomprador"]));
		
		$totalPaginas	= ceil($totalItens/LINHAS_PESQUISA_DASHBOARD);
		
		$pagina			= $this->input->get('pagina');
		
		$indicePg		= 1;
		if (!$pagina) {
			$pagina = 1;
		}
		$pagina			= ($pagina==0)?1:$pagina;
		
		if ($totalPaginas > $pagina) {
			$data['HABPROX']	= null;
			$data['URLPROXIMO']	= site_url('conta/meuscursos?pagina='.($pagina+1));
		} else {
			$data['HABPROX']	= 'disabled';
			$data['URLPROXIMO']	= '#';
		}
		
		if ($pagina <= 1) {
			$data['HABANTERIOR']= 'disabled';
			$data['URLANTERIOR']= '#';
		} else {
			$paginaVoltar = 99999;

			if ($pagina > 1) {
				$paginaVoltar = $pagina - 1;
			}
			$data['HABANTERIOR']= null;
			$data['URLANTERIOR']= site_url('conta/meuscursos?pagina='.$paginaVoltar);
		}
		
		
		
		while ($indicePg <= $totalPaginas) {
			$data['BLC_PAGINAS'][] = array(
				"LINK"		=> ($indicePg==$pagina)?'active':null,
				"INDICE"	=> $indicePg,
				"URLLINK"	=> site_url('conta/meuscursos?pagina='.$indicePg)
			);

			$indicePg++;
		}
		
		
		$this->parser->parse ( 'cursos', $data );
	}

	public function recuperarsenha(){

		$data = array();

		$this->parser->parse ( 'form_recuperar_senha', $data );

	}

	public function validaRecuperarsenha(){

		$data = array();

		$data ['RETURNSENHA'] = array();



		$email = $this->input->post('email');

		if (isset($email)) {

			$stringemail = $email;

			if (!filter_var($stringemail, FILTER_VALIDATE_EMAIL)) {

				$erro [] = "E-mail inválido";

			}

			$sql_code = $this->CompradorM->get ( array (
				"emailcomprador" => $email,
			), TRUE );


			if ($sql_code) {

				$novasenha = substr(md5(time()),0,6);

				$nscriptografada = $this->encrypt->sha1($novasenha);

				$itens	= array(
					"senhacomprador" 	=> $nscriptografada,
				);


				$atualizabanco = $this->CompradorM->update($itens, $sql_code->codcomprador);

				if ($atualizabanco) {

					$data ['RETURNSENHA'] [] = array(
						"nome"			=> $nome,
						"novasenha"		=> $novasenha,


					);


				}else{
					$this->session->set_flashdata ( 'erro', 'Erro ao atualizar .');	
					redirect('conta/recuperarsenha');
				}


			}else{
				$this->session->set_flashdata ( 'erro', 'Email ou nome nao existe.' );	
				redirect('conta/recuperarsenha');
			}

		}else{
			$this->session->set_flashdata ( 'erro', 'Erro ao obter dados.' );	
			redirect('conta/recuperarsenha');
		}


		$this->parser->parse ( 'devolve_senha', $data );


	}

	public function playlist($id){

		clienteLogado(true);

		$data = array();

		$data ['MODULO_TABLE'] = array ();
		$data ['BLC_CONTEUDODISPONIVEL'] = array ();
		$data ['BLC_SEMCONTEUDODISPONIVEL'] = array ();
		$data ['BLC_SEMMODULOSDISPONIVEIS'] = array ();
		
		$contador = null;
		
		$infoproduto = $this->ProdutoM->get (array("codproduto" => $id ),TRUE);
		
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');

		
		if (! $infoproduto) {
			show_error ( 'Não foram encontrados dados.', 500, 'Ops, erro encontrado.' );
		}
		
		if ($infoproduto) {

			foreach ( $infoproduto as $r ) {

				$foto = $this->FotoM->getFoto($id);
				
				if (!$foto){
					
					$urlFoto = base_url ( "assets/img/foto-indisponivel.jpg" );
					$data ['URLFOTO'] = $urlFoto;
				}

				if ($foto) {

					foreach ( $foto as $f ) {

						if ($foto) {
							$urlFoto = base_url ( "assets/img/produto/150x150/" . $f->codprodutofoto . "." . $f->produtofotoextensao );
						}

						$data ['URLFOTO'] = $urlFoto;
					}
				}
			}
		}


			// PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
		$modulo = $this->ModuloM->getModulosDisponiveis ( $id );

		if ($modulo) {
			foreach ( $modulo as $m ) {

					// DEFINE OS ELEMENTOS DO FILHO - INÍCIO
				$aFilhos = array ();

					// PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
				$arquivos = $this->ArquivoM->getArquivosDisponiveis ( $m->codmodulo );

				if ($arquivos) {
					foreach ( $arquivos as $df ) {
						$aFilhos [] = array (
							"CODARQUIVO"     => $df->codarquivosmodulo,
							"CONTEUDOMODULO" => base_url ( "assets/uploads/".$df->folder.'/' . $df->name ),
							"AULANOME"		 => $df->aulanome,				
						);


					}
				}else{
					$data ['BLC_SEMCONTEUDODISPONIVEL'] [] = array ();
				}

				$contador = $contador + 1;

				$data ['MODULO_TABLE'] [] = array (
					"NOMEMODULO" 			 => $m->nomemodulo,
					"URLMODULO" 			 => $m->codmodulo,
					"CONTADOR"				 =>$contador,	
					"BLC_CONTEUDODISPONIVEL" => $aFilhos 
				);
				$data ['CODMODULO'] = $m->codmodulo;


			}
		} else {
			$data ['BLC_SEMMODULOSDISPONIVEIS'] [] = array ();
		}
		

		$data['DESCRICAOCOMPLETA'] = $infoproduto->resumoproduto;
		$data['DESCRICAOBASICA']   = $infoproduto->fichaproduto;	

		$this->parser->parse('playlist', $data);

	}

	public function getAulas(){

		$cod = $this->input->post('codcurso');

		$erro = null;

		if (empty($cod)){
			$condicao = true;
			$retorno = array(
				'codigo' => $erro ,
				'mensagem' => 'Nao existe curso!'
			);
			echo json_encode($retorno);
		}else{
			
			$erro = 1;

			$moduloCurso = $this->ModuloM->getModulosDisponiveis($cod);

			$listcursos = array();

			if ($moduloCurso) {
				
				foreach ($moduloCurso as $mo) {

					$listcursos [] = array(
						"nomemodulo" => $mo->nomemodulo,
						"codmodulo" =>  $mo->codmodulo

					);
					
					$retorno = array(
						'codigo' 	  => $erro ,
						'mensagem'    => 'Lista de cursos obtida com sucesso',
						'cursos'   	  => $listcursos
						
					);

				}


				echo json_encode($retorno);
				die();

			}
		}



	}

}