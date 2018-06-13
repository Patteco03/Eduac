<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Portal extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->layout = LAYOUT_LOJA;
		$this->load->model ( 'Comprador_Model', 'CompradorM' );
		$this->load->model ( 'Compradorfoto_Model', 'FotocompradorM' );
		$this->load->model ( 'Carrinho_Model', 'CarrinhoM' );
		$this->load->model ( 'Produto_Model', 'ProdutoM' );
		$this->load->model ( 'Modulo_Model', 'ModuloM' );
		$this->load->model ( 'Arquivo_Model', 'ArquivoM' );
		$this->load->model ( 'ProdutoFoto_Model', 'ProdutoFotoM' );
	}
	public function index() {
		date_default_timezone_set('America/Rio_branco');
		$data = array ();
		$data['BLC_AVISO'] = array();
		$data['SEM_BLCAVISO'] = array();
		$comprador = $this->session->userdata ( 'index' );
		
		$infocomprador = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador'] 
		));


		$this->load->model ( 'Aviso_Model', 'AvisoM' );

		$noticias = $this->AvisoM->get ( array (
			"codcomprador" => $comprador ['codcomprador'] 
		));
		
		if ($noticias){
			foreach ($noticias as $no) {
				$data['BLC_AVISO'] [] = array(
					'TIPO'  => $no->tipo,
					'AVISO' => $no->descricao
				);
			}
		}else{
			$data ["SEM_BLCAVISO"] [] = array();
		}
		
		
		
		
		
		if (! $infocomprador) {
			redirect('conta/login');
		}else{

			if ($comprador['status'] == '1') {
				//aluno ativo
			}else{
				redirect('portal/aviso');
			}

			
		}

		$urlFoto = base_url ( "assets/images/user.png" );

		if ($infocomprador) {
			
			foreach ( $infocomprador as $r ) {
				
				$foto = $this->FotocompradorM->get ( $r->codcomprador );
				
				if ($foto) {
					
					foreach ( $foto as $f ) {
						
						
						if ($foto) {
							$urlFoto = base_url ( "assets/images/avatar/" . $f->codcompradorfoto . "." . $f->compradorfotoextensao );
						}
						
						
					}
				}
			}
		}


		$datetime = new DateTime();

		$data ['DATEHORA']			= ' Rio Branco - AC'. ' ' . $datetime->format('d/m/Y H:i:s');
		$data ['URLFOTO'] 			= $urlFoto;
		$data ['NOMECOMPRADOR'] 	= $comprador ['nomecomprador'];
		$data ['EDITARFORM'] 		= site_url ( 'portal/editar' );
		$data ['ALTERARSENHA'] 		= site_url ( 'portal/alterarsenha' );
		$data ['SALVAFOTOPERFIL']   = site_url ( 'portal/salvafotoperfil' );
		$data ['CODCOMPRADOR']  	= $comprador ['codcomprador'];
		$data ['FINANCEIRO'] 		= site_url ( 'portal/financeiro' );
		$data ['PLANOENSINO'] 		= site_url ( 'portal/planodeensino' );
		$data ['CORPODOCENTE']  	= site_url ( 'portal/corpodocente' );
		$data ['DOWNLOAD']   		= site_url ( 'portal/download' );
		$data ['CONTRATO']   		= site_url ( 'portal/contrato' );
		$data ['ATIVIDADE']  		= site_url ( 'portal/atividade' );
		$data ['OUVIDORIA']  		= site_url ( 'portal/ouvidoria' );
		$data ['SOLCURSOS']  		= site_url ( 'portal/solicitarcursos' );	
		$data ['SAIR']  			= site_url ( 'conta/sair' );	
		
		$this->parser->parse ( 'portal', $data );
	}
	
	public function financeiro(){
		
		clienteLogado(true);

		$data 							= array();
		$data ["HOME"] 					= site_url('');
		$data ["PORTALDOALUNO"] 		= site_url('portal');
		$data ['BLC_SELECTPRODUTO']     = array();
		$data ['SEM_BLCDADOS']  		= array();

		$pequisa = $this->input->post ('id');
		
		$comprador = $this->session->userdata ( 'index' );
		
		$infocomprador = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador']
		) );
		




		//PEGA TODOS OS CURSOS DISPONIVEIS PARA O USUARIO E FAZ O SELECT 
		if ($infocomprador){
			
			$carrinho = $this->CarrinhoM->get(array("co.codcomprador"=>$comprador['codcomprador']));
			
			if ($carrinho){

				foreach ($carrinho as $c){	

					$infoproduto = $this->ProdutoM->get(array("codproduto"=>$c->codproduto),TRUE,0);

					if ($infoproduto) {

						$data ['BLC_SELECTPRODUTO'] [] = array(
							"CODPRODUTO"	  	=> $c->codproduto,
							"NOME"			    => $infoproduto->nomeproduto,
							"CODCOMPRA"	 		=> $c->codcarrinho,
							"DATAHORA"	 		=> $c->datahoracompra,
							"VALORCOMPRA" 		=> $c->valorcompra,
							"SITUACAO"			=> ($c->situacao == '1')?'Aprovado':'Aguardando pagamento' ,
							"OBSERVACAO"		=> $c->observacao,
							"FORMADEPAGAMENTO"  => $c->formadepagamento,
						);

					} 

				}


			}else {
				$data ['SEM_BLCDADOS'] []  = array();
			}

		}	

		$this->parser->parse ( 'financeiro', $data );
		
	}
	
	public function planodeensino(){
		
		clienteLogado(true);
		
		$data = array();
		$data ["HOME"] = site_url('');
		$data ["PORTALDOALUNO"] = site_url('portal');
		
		
		$this->parser->parse ( 'planodeensino', $data );

	}
	
	public function corpodocente(){
		
		clienteLogado(true);


	}
	
	public function download(){
		
		clienteLogado(true);
		
		$data 					= array();
		$data ["HOME"] 			= site_url('');
		$data ["PORTALDOALUNO"] = site_url('portal');
		$data ['BLC_DADOS']     = array();
		$data ['SEM_BLCDADOS']  = array();
		$data ['BLC_AULAS']		= array();
		$data ['SEM_BLCAULAS']	= array();
		$carrinho = array();

		$contador = null;
		
		$comprador = $this->session->userdata ( 'index' );
		
		$infocomprador = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador']
		) );
		
		
		
		if ($infocomprador){
			
			$carrinho = $this->CarrinhoM->get(array("co.codcomprador"=>$comprador['codcomprador']));		
			
			if (isset($carrinho)){

				$modulos = array();

				foreach ($carrinho as $c){

					$liberacao = FALSE;

					if ($c->situacao == '1') {
						$liberacao = TRUE;


						$modulos = array();
						
						$infoproduto = $this->ProdutoM->get(array("codproduto"=>$c->codproduto),TRUE,0);
						
						if (empty ($infoproduto->codproduto)) {
							show_error ( 'Não foram encontrados dados.', 500, 'Ops, erro encontrado.' );
						} else {

							// PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
							$modulo = $this->ModuloM->getModulosDisponiveisParaUsuarios (array("p.codproduto"=>$c->codproduto));

							if ($modulo) {
								foreach ( $modulo as $m ) {

									// DEFINE OS ELEMENTOS DO FILHO - FIM

									$modulos [] = array (
										"NOMEMODULO" => $m->nomemodulo,
										"IDMODULO" => $m->codmodulo,
										"URLVERAULA" => site_url('portal/downloadaula/'.$m->codmodulo),
									);
									

								}
							} else {
								$data ['SEM_BLCAULAS'] []	= array();
							}
							
							
						}
						
						$contador = $contador + 1;
						
						$data ['BLC_DADOS']	[] = array(
							"nomecurso"		=> $infoproduto->nomeproduto,
							"BLC_AULAS"		=> $modulos,
							"i"				=> $contador
						);



					}else{
						$liberacao = FALSE;
						$data ['SEM_BLCDADOS'] []  = array();
					}			

				}


			}else {
				$data ['SEM_BLCDADOS'] []  = array();
			}			
			
		}else {
			redirect('conta/login');
		}
		

		$this->parser->parse ( 'download_aulas', $data );


	}
	
	public function downloadaula($id){

		clienteLogado(true);

		$data = array();
		$data ['BLC_DADOS'] = array();
		$data ['SEM_BLCDADOS'] = array();
		$data ['URLARQUIVO']   = null;	
		
		$data ['NOMEMODULO']	= '';
		$data ['DESCRICAOMODULO']	= '';
		
		// PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
		$arquivos = $this->ArquivoM->getArquivosDisponiveis ($id);

		if ($arquivos) {
			
			
			foreach ( $arquivos as $df ) {
				
				$arquivos = base_url ( 'assets/uploads/'.$df->folder.'/'.$df->name );
				

				$data ['BLC_DADOS'] [] = array (
					"CODARQUIVO"     => $df->codarquivosmodulo,
					"AULANOME"		 => $df->aulanome,
					"TIPOAULA"		 => $df->type,
					"URLARQUIVO"	 => $arquivos,
					"URLDOWNLOAD"	 => site_url('portal/downloadArquivo?file='.$df->codarquivosmodulo)
				);
				
				$data ['NOMEMODULO']	= $df->nomemodulo;
				$data ['DESCRICAOMODULO']	= $df->descricaomodulo;

			}
		}else{
			$data ['SEM_BLCDADOS'] [] = array();
		}
		
		$this->parser->parse ( 'download_aulas_id', $data );
	}
	
	public function contrato(){
		
		clienteLogado(true);


	}
	
	public function ouvidoria(){
		
		clienteLogado(true);
		
		$data = array();

		$data ["HOME"] 					= site_url('');
		$data ["PORTALDOALUNO"] 		= site_url('portal');

		$this->parser->parse ( 'ouvidoria_form', $data );

	}
	
	public function editar() {
		$comprador = $this->session->userdata ( 'index' );
		
		$data = array ();
		$data ['ACAO'] = 'Editar cadastro';
		
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

		$urlFoto = base_url ( "assets/images/user.png" );

		$foto = $this->FotocompradorM->get ($res->codcomprador );

		if ($res->codcomprador) {

			foreach ( $foto as $f ) {


				if ($foto) {
					$urlFoto = base_url ( "assets/images/avatar/" . $f->codcompradorfoto . "." . $f->compradorfotoextensao );
				}


			}
		}

		$data['URLFOTO'] = $urlFoto;

		$data ['URLALTERARSENHA'] = site_url ( 'portal/alterarsenha/');
		
		$data ['ufcomprador_' . $res->ufcomprador] = 'selected="selected"';
		
		if ($res->sexocomprador === 'M') {
			$data ['sexocomprador_' . $res->sexocomprador] = 'checked="checked"';
		} else {
			$data ['sexocomprador_' . $res->sexocomprador] = 'checked="checked"';
		}
		
		$this->parser->parse ( 'conta_form_editar', $data );
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
		
		$enderecoFoto = '/assets/images/avatar/' . $codfoto . '.' . $extensao;
		
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
			redirect ( 'portal' );
		} else {
			$this->session->set_flashdata ( 'erro', 'falha ao tentar enviar foto.' );
			redirect ( 'portal' );
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
	
	// Método que fará o download do arquivo
	public function downloadArquivo() {

		$codarquivos = $this->input->get ('file');

		// PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
		$arquivos = $this->ArquivoM->get($codarquivos);

		$codredirect = null;
		$fileName 	 = null;
		$filePath 	 = null;
		$filefolder  = null;

		if(!empty($codarquivos)){
			if ($arquivos) {
				
				foreach ( $arquivos as $df ) {
					
					$fileName = $df->name;
					$filefolder = $df->folder;
					$codredirect  = $df->codmodulo;
					$filePath = base_url ( 'assets/uploads/'.$filefolder.'/'.$fileName );
					

				}

			}


		}else{
			$this->session->set_flashdata ( 'erro', 'falha ao tentar baixar arquivo.' );
			redirect('portal/downloadaula/'.$codredirect);
		}

		if (isset($filePath)) {

			$da = file_get_contents('assets/uploads/'.$filefolder.'/'.$fileName);

			force_download($fileName, $da);
			redirect('portal/downloadaula/'.$codredirect);
		}else{
			$this->session->set_flashdata ( 'erro', 'falha ao tentar baixar arquivo.' );
			redirect('portal/downloadaula/'.$codredirect);
		}

	}

	public function aviso(){

		clienteLogado(true);

		$data = array();


		$this->parser->parse ( 'aviso', $data );
	}

	public function alterarsenha(){
		clienteLogado(true);

		$codcomprador = $this->session->userdata ( 'index' );

		$data = array();

		$data['ACAO'] = "Alterar senha";

		$data['codcomprador'] = $codcomprador['codcomprador'];

		$this->parser->parse ( 'alterar_senha', $data );
	}


	public function validanovasenha(){

		clienteLogado(true);

		$codcomprador 	= $this->input->post('codcomprador');
		$senhaatual 	= sha1(strip_tags($this->input->post ( 'senhaantigacomprador' )));
		$novasenha 		= sha1(strip_tags($this->input->post ( 'senhacomprador' )));;
		$confirmarsenha = sha1(strip_tags($this->input->post ( 'confirm_password' )));
		
		$erros			= FALSE;
		$mensagem		= null;


		if (!$senhaatual) {
			$erros		= TRUE;
			$mensagem	.= "Informe a senha atual.\n";
		}

		if (!$novasenha) {
			$erros		= TRUE;
			$mensagem	.= "Informe a nova senha.\n";
		}

		if (!$confirmarsenha) {
			$erros		= TRUE;
			$mensagem	.= "Informe a confirmação da senha.\n";
		}


		if (!$erros) {


			$sql_code = $this->CompradorM->get ( array (
				"codcomprador" => $codcomprador,
				"senhacomprador" => sha1($senhaatual)
			), TRUE );


			if (!$sql_code) {
				$mensagem .= "As senhas não conhecidem..\n";
			}else{

				if ($confirmarsenha === $novasenha) {
					
					$nscriptografada = sha1($novasenha);

					$itens	= array(
						"senhacomprador" 	=> $nscriptografada,
					);


					$atualizabanco = $this->CompradorM->update($itens, $codcomprador);

					$erro = 1;

					$this->session->set_flashdata('sucesso', 'Senha Alterada com sucesso.');
					redirect('portal');


				}else{
					$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
					redirect('portal/alterarsenha');
				}

				

			}

			

		}

	}	

	public function atualizarRegistro() {
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
		$status				= $this->input->post('status');

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
				"telefonecomprador" => $telefonecomprador
			);


			if ($codcomprador) {
				$codcomprador = $this->CompradorM->update($itens, $codcomprador);
			} 

			if ($codcomprador) {
				$this->session->set_flashdata('sucesso', 'Dados Atualizado com sucesso.');
				redirect('portal');
			} else {
				$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');

				if ($codcomprador) {
					redirect('portal/editar/'.$codcomprador);
				} else {
					redirect('conta/novaconta');
				}
			}
		} else {
			$this->session->set_flashdata('erro', nl2br($mensagem));
			if ($codcomprador) {
				redirect('portal/editar/'.$codcomprador);
			} else {
				redirect('conta/novaconta');
			}
		}

	}


	public function solicitarcursos(){

		$data ["BLC_LINHA"] = array ();
		$data ['BLC_SEMDADOS'] = array ();
		$data ["HOME"] 			= site_url('');
		$data ["PORTALDOALUNO"] = site_url('portal');
		$data ["URLCRIACARRINHO"] = site_url('portal/criacarrinho');

		$comprador = $this->session->userdata ( 'index' );
		
		$produtosExibidos = 0;
		$coluna = array ();
		
		$pagina = $this->input->get ( 'pagina' );
		
		if (! $pagina) {
			$pagina = 0;
		} else {
			$pagina = ($pagina - 1) * LINHAS_PESQUISA_DASHBOARD;
		}
		
		$cursosPresencial = 'P';
		$produto = $this->ProdutoM->get(array("tipoproduto" => $cursosPresencial), FALSE, $pagina, FALSE);
		
		if (!$produto){
			$data ['BLC_SEMDADOS'] [] = array ();
		}
		
		foreach ( $produto as $p ) {

			$filtroFoto = array (
				"p.codproduto" => $p->codproduto
			);

			$foto = $this->ProdutoFotoM->get ( $filtroFoto, TRUE );

			$url = base_url ( "assets/img/foto-indisponivel.jpg" );

			if ($foto) {
				$url = base_url ( "assets/img/produto/150x150/" . $foto->codprodutofoto . "." . $foto->produtofotoextensao );
			}

			$urlFicha = site_url ( "produto/" . $p->codproduto . "/" . $p->urlseo );

			$precoPromocional = array ();

			$valorFinal = $p->valor;

			if (($p->valorpromocional > 0) && ($p->valorpromocional < $p->valorproduto)) {
				$precoPromocional [] = array (
					"VALORANTIGO" => number_format ( $p->valorproduto, 2, ",", "." )
				);

				$valorFinal = $p->valorpromocional;
			}

			$infocomprador = $this->CompradorM->get ( array (
				"codcomprador" => $comprador ['codcomprador']
			) );
			
			
			$ProdutoJaAdquirido = FALSE;
			
			if ($infocomprador){
				
				$carrinho = $this->CarrinhoM->get(array("co.codcomprador"=>$comprador['codcomprador']));

				if (isset($carrinho)) {
					
					foreach ($carrinho as $car){	

						if ($car->codproduto == $p->codproduto) {
							$ProdutoJaAdquirido = TRUE;
						}

					}
				}

			}	



			$coluna [] = array (
				"URLFOTO" 				=> $url,
				"URLPRODUTO" 			=> $urlFicha,
				"CODPRODUTO" 			=> $p->codproduto,
				"NOMEPRODUTO" 			=> $p->nomeproduto,
				"FICHAPRODUTO" 			=> $p->fichaproduto,
				"BLC_PRECOPROMOCIONAL"  => $precoPromocional,
				"VALOR" 				=> number_format ( $valorFinal, 2, ",", "." ),
				"JAADQUIRIDO" 			=> ($ProdutoJaAdquirido == 'TRUE')?'Produto Já Adquirido':'Comprar',
				"SUBMIT"		    	=> ($ProdutoJaAdquirido == 'TRUE')?'null':'submit',
				"BTN" 					=> ($ProdutoJaAdquirido == 'TRUE')?'btn-danger':'button-comprar'

			);

			$produtosExibidos ++;

			if ($produtosExibidos === 1) {
				$produtosExibidos = 0;
				$data ["BLC_LINHA"] [] = array (
					"BLC_COLUNA" => $coluna
				);

				$coluna = array ();
			}
		}
		
		if ($produtosExibidos > 0) {
			$data ["BLC_LINHA"] [] = array (
				"BLC_COLUNA" => $coluna
			);
		}

		$totalItens		= $this->ProdutoM->getTotal();
		$totalPaginas	= ceil($totalItens/LINHAS_PESQUISA_DASHBOARD);
		
		$pagina			= $this->input->get('pagina');
		
		$indicePg		= 1;
		if (!$pagina) {
			$pagina = 1;
		}
		$pagina			= ($pagina==0)?1:$pagina;
		
		if ($totalPaginas > $pagina) {
			$data['HABPROX']	= null;
			$data['URLPROXIMO']	= site_url('portal/solicitarcursos?pagina='.($pagina+1));
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
			$data['URLANTERIOR']= site_url('portal/solicitarcursos?pagina='.$paginaVoltar);
		}
		
		
		
		while ($indicePg <= $totalPaginas) {
			$data['BLC_PAGINAS'][] = array(
				"LINK"		=> ($indicePg==$pagina)?'active':null,
				"INDICE"	=> $indicePg,
				"URLLINK"	=> site_url('portal/solicitarcursos?pagina='.$indicePg)
			);

			$indicePg++;
		}


		$this->parser->parse('solicitarcursos_form', $data);

	}

	public function criacarrinho(){

		clienteLogado(true);

		$codcarrinho 		= $this->input->post('codcarrinho');
		$codproduto 		= $this->input->post('codproduto');
		$datahoracompra 	= date('Y-m-d H:i:s');
		$situacao 			= 2;
		$observacao 		= 'Aguardando pagamento';
		$formadepagamento 	= 'Boleto';


		$comprador = $this->session->userdata ('index');

		$condicao = false;
		
		if (empty($codproduto)){
			$condicao = true;
			$this->session->set_flashdata('erro', 'Produto nao existe.');
			redirect('portal/solicitarcursos');
		}


		if (!$condicao) {

			$produto = $this->ProdutoM->get(array("codproduto" => $codproduto), FALSE, 0, FALSE);
			
			if ($produto) {

				foreach ($produto as $p) {

					$precoPromocional = null;

					$valorFinal = $p->valor;

					if (($p->valorpromocional > 0) && ($p->valorpromocional < $p->valor)) {
						$precoPromocional = $valor;
						$valorFinal = $p->valorpromocional;
					}

					$itens = array (
						'codcarrinho' 		=> $codcarrinho,
						'datahoracompra' 	=> $datahoracompra,
						'valorfinalcompra' 	=> $valorFinal,
						'valorcompra' 		=> $p->valor,
						'codproduto' 		=> $codproduto,
						'situacao'			=> $situacao,
						'codcomprador'		=> $comprador['codcomprador'],
						'observacao'		=> $observacao,
						'codformapagamento'	=> $formadepagamento,
						
					);
					
				}
				
				
				$codcarrinho = $this->CarrinhoM->post($itens);

				if ($codcarrinho) {
					$this->session->set_flashdata('sucesso', 'Solicitacao enviada com sucesso.');
					redirect('portal/solicitarcursos');
				} else {
					$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
				}


			}else{
				$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
				if ($codcarrinho) {
					redirect('portal/solicitarcursos');
				} else {
					redirect('portal');
				}
			}


		}

	}

	public function getContrato($param=NULL) {

		$data = array();

		$texte = '1231251231';


		$mpdf = new mPDF();

		$mpdf->Image(base_url ( "assets/img/user.png" ), 0, 0, 210, 297, 'png', '', true, false);


	// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
	// HTML dela para a variável $html
		$html = '<h3>CONTRATO PARTICULAR DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS Nº '.$texte.'</h3>';
	// Define um Cabeçalho para o arquivo PDF
		$mpdf->SetHeader('<img src="'.$urlFoto.'">');
	// Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
	// página através da pseudo-variável PAGENO
		$mpdf->SetFooter('{PAGENO}');
	// Insere o conteúdo da variável $html no arquivo PDF
		$mpdf->writeHTML($html);
	// Cria uma nova página no arquivo
		$mpdf->AddPage();
	// Insere o conteúdo na nova página do arquivo PDF
		$mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
	// Gera o arquivo PDF
		$mpdf->Output();

	}


}