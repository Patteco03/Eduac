<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comprador extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->layout	= LAYOUT_DASHBOARD;
		$this->load->model('Comprador_Model', 'CompradorM');
	}
	
	public function index() {
	    $data					= array();
	    $data['URLADICIONAR']	= site_url('painel/comprador/adicionar');
	    $data['URLLISTAR']		= site_url('painel/comprador');
	    $data['BLC_DADOS']		= array();
	    $data['BLC_SEMDADOS']	= array();
	
	
	    $res	= $this->CompradorM->get(array(), FALSE, 0, FALSE);
	
	    if ($res) {
	        foreach($res as $r) {
	            
	            $cpf = mascara($r->cpfcomprador, '###.###.###-##');
	            
	            $data['BLC_DADOS'][] = array(
	                    "NOME"		   => $r->nomecomprador,
	                    "CIDADE"       => $r->cidadecomprador,
	                    "UF"           => $r->ufcomprador,
	                    "EMAIL"        => $r->emailcomprador,
	                    "CPF"          => $cpf,
	                    "URLEDITAR"	   => site_url('painel/comprador/editar/'.$r->codcomprador),
	                    "URLEXCLUIR"   => site_url('painel/comprador/excluir/'.$r->codcomprador)
	            );
	        }
	    } else {
	        $data['BLC_SEMDADOS'][] = array();
	    }
	
	
	    $this->parser->parse('painel/comprador_listar', $data);
	}
	
	private function setURL(&$data) {
	    $data['URLLISTAR']	= site_url('painel/comprador');
	    $data['ACAOFORM']	= site_url('painel/comprador/salvar');
	}
	
	public function adicionar() {
	
	    $data					     = array();
	    $data['ACAO']				 = 'Novo';
	    $data['codcomprador']	     = '';
	    $data['nomecomprador']	     = '';
	    $data['cpfcomprador']	     = '';
	    $data['cepcomprador']	     = '';
	    $data['enderecocomprador']	 = '';
	    $data['cidadecomprador']	 = '';
	    $data['ufcomprador']	     = '';
	    $data['emailcomprador']	     = '';
	    $data['telefonecomprador']   = '';
	    $data['sexocomprador']	     = '';
	    $data['senhacomprador']	     = '';

	    $this->setURL($data);
	
	    $this->parser->parse('painel/comprador_form', $data);
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
	        );
	        
	        if ($senhacomprador) {
	            $itens['senhacomprador'] = $this->encrypt->sha1($senhacomprador);
	        }
	        	
	        if ($codcomprador) {
	            $codcomprador = $this->CompradorM->update($itens, $codcomprador);
	        } else {
	            $codcomprador = $this->CompradorM->post($itens);
	        }
	        	
	        if ($codcomprador) {
	            $this->session->set_flashdata('sucesso', 'Dados inseridos com sucesso.');
	            redirect('painel/comprador');
	        } else {
	            $this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
	
	            if ($codcomprador) {
	                redirect('painel/comprador/editar/'.$codcomprador);
	            } else {
	                redirect('painel/comprador/adicionar');
	            }
	        }
	    } else {
	        $this->session->set_flashdata('erro', nl2br($mensagem));
	        if ($codcomprador) {
	            redirect('painel/comprador/editar/'.$codcomprador);
	        } else {
	            redirect('painel/comprador/adicionar');
	        }
	    }
	
	}
	
	public function editar($id) {
	    $data						= array();
	    $data['ACAO']				= 'Edição';
	
	    $conteudo = array ();
		
		$res = $this->CompradorM->get ( array (
				"codcomprador" => $id 
		), TRUE );
		
		if ($res) {
			foreach ( $res as $chave => $valor ) {
				$data [$chave] = $valor;
			}
		} else {
			show_error ( 'Não foram encontrados dados.', 500, 'Ops, erro encontrado.' );
		}

		$data ['senhacomprador'] = md5($res->senhacomprador);
		
		$data ['ufcomprador_' . $res->ufcomprador] = 'selected="selected"';
		$data ['tipo_' . $res->tipo] = 'selected="selected"';
		
		if ($res->sexocomprador === 'M') {
			$data ['sexocomprador_' . $res->sexocomprador] = 'checked="checked"';
		} else {
			$data ['sexocomprador_' . $res->sexocomprador] = 'checked="checked"';
		}
	    
	    $this->setURL($data);
	
	    $this->parser->parse('painel/comprador_form', $data);
	}
	
	public function excluir($id) {
	   $res = $this->CompradorM->delete($id);
	   
	   if ($res) {
	       $this->session->set_flashdata('sucesso', 'Comprador removido com sucesso.');
	   } else {
	       $this->session->set_flashdata('erro', 'Comprador não pode ser removido. Verifique se ele possui compras vinculadas.');
	   }
	   
	   redirect('painel/comprador');
	}
	
	public function getCEP($cep) {
	    $ch = curl_init() or die (curl_error($ch));
	    
	    $getdata = http_build_query(
	    	array(
	    	  'cep'   => $cep,
	    	  'chave' => CHAVE_DEVMEDIA,
	    	  'formato' => 'json'
	       )
	    );
	    
	    $options = array(
            CURLOPT_URL => "http://www.devmedia.com.br/devware/cep/service/?$getdata",
            CURLOPT_RETURNTRANSFER => 1
        );
	    
	    curl_setopt_array($ch, $options);
	    $result = curl_exec($ch) or die ("<p>ERRO AO FAZER A REQUISIÇÃO </p>".curl_error($ch));
	    curl_close($ch);
	    
	    echo $result;
	    die();
	}
}