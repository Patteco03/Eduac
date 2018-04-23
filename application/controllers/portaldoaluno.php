<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class PortalDoAluno extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->layout = SINGLE_LOJA;
		$this->load->model ( 'Comprador_Model', 'CompradorM' );
		$this->load->model ( 'Compradorfoto_Model', 'FotocompradorM' );
		$this->load->model ( 'Carrinho_Model', 'CarrinhoM' );
		$this->load->model ( 'Produto_Model', 'ProdutoM' );
		$this->load->model ( 'Modulo_Model', 'ModuloM' );
		$this->load->model ( 'Arquivo_Model', 'ArquivoM' );
		$this->load->model ( 'ProdutoFoto_Model', 'ProdutoFotoM' );
	}
	public function index() {
		$data = array ();
		$data ["NOTICIAS"]  = '';
		$noticias 			= '';
		
		if ($noticias){
			$data ["NOTICIAS"] = $noticias;
		}else{
			$data ["NOTICIAS"] = 'Você não possui nenhum aviso';
		}
		
		
		$comprador = $this->session->userdata ( 'index' );
		
		$infocomprador = $this->CompradorM->get ( array (
			"codcomprador" => $comprador ['codcomprador'] 
		));

		
		
		if (! $infocomprador) {
			redirect('conta/login');
		}else{
			if ($comprador['tipo'] === 'V'){
				redirect('conta/perfil');
			}

			if ($comprador['status'] == '1') {
				//aluno ativo
			}else{
				redirect('portaldoaluno/aviso');
			}

			
		}

		$urlFoto = base_url ( "assets/img/user.png" );

		if ($infocomprador) {
			
			foreach ( $infocomprador as $r ) {
				
				$foto = $this->FotocompradorM->get ( $r->codcomprador );
				
				if ($foto) {
					
					foreach ( $foto as $f ) {
						
						
						if ($foto) {
							$urlFoto = base_url ( "assets/img/profile/" . $f->codcompradorfoto . "." . $f->compradorfotoextensao );
						}
						
						
					}
				}
			}
		}

		$data ['URLFOTO'] 			= $urlFoto;
		$data ['ACAO'] 				= 'Portal do aluno';
		$data ['NOMECOMPRADOR'] 	= $comprador ['nomecomprador'];
		$data ['EDITARFORM'] 		= ci_site_url ( 'portaldoaluno/editar' );
		$data ['ALTERARSENHA'] 		= ci_site_url ( 'portaldoaluno/alterarsenha' );
		$data ['SALVAFOTOPERFIL']   = ci_site_url ( 'portaldoaluno/salvafotoperfil' );
		$data ['CODCOMPRADOR']  	= $comprador ['codcomprador'];
		$data ['FINANCEIRO'] 		= ci_site_url ( 'portaldoaluno/financeiro' );
		$data ['PLANOENSINO'] 		= ci_site_url ( 'portaldoaluno/planodeensino' );
		$data ['CORPODOCENTE']  	= ci_site_url ( 'portaldoaluno/corpodocente' );
		$data ['DOWNLOAD']   		= ci_site_url ( 'portaldoaluno/download' );
		$data ['CONTRATO']   		= ci_site_url ( 'portaldoaluno/contrato' );
		$data ['ATIVIDADE']  		= ci_site_url ( 'atividade' );
		$data ['OUVIDORIA']  		= ci_site_url ( 'portaldoaluno/ouvidoria' );
		$data ['SOLCURSOS']  		= ci_site_url ( 'portaldoaluno/solicitarcursos' );	
		
		$this->parser->parse ( 'portaldoaluno', $data );
	}
	
	public function financeiro(){
		
		clienteLogado(true);

		$data 							= array();
		$data ["HOME"] 					= ci_site_url('');
		$data ["PORTALDOALUNO"] 		= ci_site_url('portaldoaluno');
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
		$data ["HOME"] = ci_site_url('');
		$data ["PORTALDOALUNO"] = ci_site_url('portaldoaluno');
		
		
		$this->parser->parse ( 'planodeensino', $data );

	}
	
	public function corpodocente(){
		
		clienteLogado(true);


	}
	
	public function download(){
		
		clienteLogado(true);
		
		$data 					= array();
		$data ["HOME"] 			= ci_site_url('');
		$data ["PORTALDOALUNO"] = ci_site_url('portaldoaluno');
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
										"URLVERAULA" => ci_site_url('portaldoaluno/downloadaula/'.$m->codmodulo),
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
					"URLDOWNLOAD"	 => ci_site_url('portaldoaluno/downloadArquivo?file='.$df->codarquivosmodulo)
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

		$data ["HOME"] 					= ci_site_url('');
		$data ["PORTALDOALUNO"] 		= ci_site_url('portaldoaluno');

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

		$data ['URLALTERARSENHA'] = ci_site_url ( 'portaldoaluno/alterarsenha/');
		
		$data ['ufcomprador_' . $res->ufcomprador] = 'selected="selected"';
		$data ['tipo_' . $res->tipo] = 'selected="selected"';
		
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
					"deleteUrl" => ci_site_url ( 'painel/profile/removefoto/' . $codfoto . '/' . $codcomprador ),
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
			redirect('portaldoaluno/downloadaula/'.$codredirect);
		}

		if (isset($filePath)) {

			$da = file_get_contents('assets/uploads/'.$filefolder.'/'.$fileName);

			force_download($fileName, $da);
			redirect('portaldoaluno/downloadaula/'.$codredirect);
		}else{
			$this->session->set_flashdata ( 'erro', 'falha ao tentar baixar arquivo.' );
			redirect('portaldoaluno/downloadaula/'.$codredirect);
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
		$senhaatual 	= $this->input->post('senhaatual');
		$novasenha 		= $this->input->post('novasenha');
		$confirmarsenha = $this->input->post('confirmarsenha');

		$erro = null;
		$condicao = false;

		
		if (empty($codcomprador)):
			$condicao = true;
			$retorno = array('codigo' => $erro , 'mensagem' => 'Usuario não Existe!');
			echo json_encode($retorno);
			exit();
		endif;


		if (empty($senhaatual)):
			$condicao = true;
			$retorno = array('codigo' => $erro , 'mensagem' => 'Preencha o campo Senha atual!');
			echo json_encode($retorno);
			exit();
		endif;


		if (empty($novasenha)):
			$condicao = true;
			$retorno = array('codigo' => $erro , 'mensagem' => 'Preencha o campo Nova senha!');
			echo json_encode($retorno);
			exit();
		endif;


		if (empty($confirmarsenha)):
			$condicao = true;
			$retorno = array('codigo' => $erro , 'mensagem' => 'Preencha o campo! Confirmar senha');
			echo json_encode($retorno);
			exit();
		endif;


		if (!$condicao) {


			$sql_code = $this->CompradorM->get ( array (
				"codcomprador" => $codcomprador,
				"senhacomprador" => sha1($senhaatual)
			), TRUE );


			if (!$sql_code) {
				$retorno = array('codigo' => $erro , 'mensagem' => 'Senha Atual incorreta');
				echo json_encode($retorno);
				exit();
			}else{

				if ($confirmarsenha === $novasenha) {
					
					$nscriptografada = $this->encrypt->sha1($novasenha);

					$itens	= array(
						"senhacomprador" 	=> $nscriptografada,
					);


					$atualizabanco = $this->CompradorM->update($itens, $codcomprador);

					$erro = 1;

					$retorno = array('codigo' => $erro , 'mensagem' => 'Senha Alterada com sucesso');
					echo json_encode($retorno);
					exit();


				}else{
					$retorno = array('codigo' => $erro , 'mensagem' => 'Confirme a nova senha');
					echo json_encode($retorno);
					exit();

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
		$tipo				= $this->input->post('tipo');

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
				"telefonecomprador" => $telefonecomprador,
				"tipo" 				=> $tipo,
			);


			if ($codcomprador) {
				$codcomprador = $this->CompradorM->update($itens, $codcomprador);
			} 

			if ($codcomprador) {
				$this->session->set_flashdata('sucesso', 'Dados Atualizado com sucesso.');
				redirect('portaldoaluno');
			} else {
				$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');

				if ($codcomprador) {
					redirect('portaldoaluno/editar/'.$codcomprador);
				} else {
					redirect('conta/novaconta');
				}
			}
		} else {
			$this->session->set_flashdata('erro', nl2br($mensagem));
			if ($codcomprador) {
				redirect('portaldoaluno/editar/'.$codcomprador);
			} else {
				redirect('conta/novaconta');
			}
		}

	}


	public function solicitarcursos(){

		$data ["BLC_LINHA"] = array ();
		$data ['BLC_SEMDADOS'] = array ();
		$data ["HOME"] 			= ci_site_url('');
		$data ["PORTALDOALUNO"] = ci_site_url('portaldoaluno');
		$data ["URLCRIACARRINHO"] = ci_site_url('portaldoaluno/criacarrinho');

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

			$urlFicha = ci_site_url ( "produto/" . $p->codproduto . "/" . $p->urlseo );

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
			$data['URLPROXIMO']	= ci_site_url('portaldoaluno/solicitarcursos?pagina='.($pagina+1));
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
			$data['URLANTERIOR']= ci_site_url('portaldoaluno/solicitarcursos?pagina='.$paginaVoltar);
		}
		
		
		
		while ($indicePg <= $totalPaginas) {
			$data['BLC_PAGINAS'][] = array(
				"LINK"		=> ($indicePg==$pagina)?'active':null,
				"INDICE"	=> $indicePg,
				"URLLINK"	=> ci_site_url('portaldoaluno/solicitarcursos?pagina='.$indicePg)
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
			redirect('portaldoaluno/solicitarcursos');
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
					redirect('portaldoaluno/solicitarcursos');
				} else {
					$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
				}


			}else{
				$this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
				if ($codcarrinho) {
					redirect('portaldoaluno/solicitarcursos');
				} else {
					redirect('portaldoaluno');
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