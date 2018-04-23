<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->layout   = LAYOUT_DASHBOARD;
        $this->load->model('Usuario_Model', 'UsuarioM');
    }
    
    public function index() {
        $data                   = array();
        $data['URLADICIONAR']   = site_url('painel/usuario/adicionar');
        $data['URLLISTAR']      = site_url('painel/usuario');
        $data['BLC_DADOS']      = array();
        $data['BLC_SEMDADOS']   = array();
        $data['BLC_PAGINAS']    = array();
        
        $pagina         = $this->input->get('pagina');
        
        if (!$pagina) {
            $pagina = 0;
        } else {
            $pagina = ($pagina-1) * LINHAS_PESQUISA_DASHBOARD;
        }
        
        $res    = $this->UsuarioM->get(array(), FALSE, $pagina);

        if ($res) {
            foreach($res as $r) {
                $data['BLC_DADOS'][] = array(
                    "NOME"      => $r->name,
                    "USERNAME"  => $r->username,
                    "EMAIL"     => $r->email,
                    "STATUS"    => ($r->status == '1') ? '<button class="btn btn-success">Ativo</button>': '<button class="btn btn-danger">Inativo</button>',
                    "URLEDITAR" => site_url('painel/usuario/editar/'.$r->codusuario),
                    "URLEXCLUIR"=> site_url('painel/usuario/excluir/'.$r->codusuario)
                );
            }
        } else {
            $data['BLC_SEMDADOS'][] = array();
        }
        
        $totalItens     = $this->UsuarioM->getTotal();
        $totalPaginas   = ceil($totalItens/LINHAS_PESQUISA_DASHBOARD);
        
        $indicePg       = 1;
        $pagina         = $this->input->get('pagina');
        if (!$pagina) {
            $pagina = 1;
        }
        $pagina         = ($pagina==0)?1:$pagina;
        
        if ($totalPaginas > $pagina) {
            $data['HABPROX']    = null;
            $data['URLPROXIMO'] = site_url('painel/usuario?pagina='.($pagina+1));
        } else {
            $data['HABPROX']    = 'disabled';
            $data['URLPROXIMO'] = '#';
        }
        
        if ($pagina <= 1) {
            $data['HABANTERIOR']= 'disabled';
            $data['URLANTERIOR']= '#';
        } else {
            $data['HABANTERIOR']= null;
            $data['URLANTERIOR']= site_url('painel/usuario?pagina='.$pagina-1);
        }
        
        
        
        while ($indicePg <= $totalPaginas) {
            $data['BLC_PAGINAS'][] = array(
                "LINK"      => ($indicePg==$pagina)?'active':null,
                "INDICE"    => $indicePg,
                "URLLINK"   => site_url('painel/usuario?pagina='.$indicePg)
            );
            
            $indicePg++;
        }
        

        $this->parser->parse('painel/usuario_listar', $data);
    }

    public function perfil(){
        $data = array();

        $this->parser->parse('painel/perfil_usuario', $data);

    }
    
    public function adicionar() {

        $data                       = array();
        $data['ACAO']               = 'Novo';
        $data['id']                 = '';
        $data['name']               = '';
        $data['username']           = '';
        $data['email']              = '';
        $data['password']           = '';
        
        $this->setURL($data);
        
        $this->parser->parse('painel/usuario_form', $data);
    }
    
    public function editar($id) {
        $data                       = array();
        $data['ACAO']               = 'Edição';
        
        $res    = $this->UsuarioM->get(array("codusuario" => $id), TRUE);
        
        if ($res) {
            foreach($res as $chave => $valor) {
                $data[$chave] = $valor;
            }

            
        } else {
            show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
        }

        $this->setURL($data);
        
        $this->parser->parse('painel/usuario_form', $data);
    }
    
    public function salvar() {

        $idusuario  = $this->input->post('idusuario');
        $name       = $this->input->post('name'); 
        $username   = $this->input->post('username'); 
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        
        $erros          = FALSE;
        $mensagem       = null;
        
        if (!$name) {
            $erros      = TRUE;
            $mensagem   .= "Informe nome\n";
        }
        if (!$username) {
            $erros      = TRUE;
            $mensagem   .= "Informe o nome do Usuário\n";
        }

        if (!$password) {
            if (!$id) {
                $erros      = TRUE;
                $mensagem   .= "Informe senha do usuário\n";
            }
        }

        if (!$email) {
            $erros = TRUE;
            $mensagem .= "Informe o email do usuário.\n";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erros = TRUE;
                $mensagem .= "Este email é inválido.\n";
            } else {
                $total = $this->UsuarioM->validaEmailDuplicado($idusuario, $email);
                if ($total > 0) {
                    $erros = TRUE;
                    $mensagem .= "Este email já está sendo utilizado.\n";
                }
            }
        }
        
        if (!$erros) {
            $itens  = array(
                "name"      => addcslashes($name, 'W'),
                "username"  => addcslashes($username, 'W'),
                "email"     => addcslashes($email, 'W'),
                "roles_id"  => 1
            );

            if ($password) {

                $salt = array(
                    "salt" => sha1(microtime())
                );
                $hashToStoreInDb = password_hash($password, PASSWORD_DEFAULT, $salt);

                $itens['password']  = $hashToStoreInDb;
                $itens['salt']      = $salt['salt'];
            }
            
            
            if ($idusuario) {
                $idusuario = $this->UsuarioM->update($itens, $idusuario);
            } else {
                $idusuario = $this->UsuarioM->post($itens);
            }
            
            if ($idusuario) {
                $this->session->set_flashdata('sucesso', 'Dados inseridos com sucesso.');
                redirect('painel/usuario');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao realizar a operação.');
                
                if ($idusuario) {
                    redirect('painel/usuario/editar/'.$idusuario);
                } else {
                    redirect('painel/usuario/adicionar');
                }
            }

        } else {
            $this->session->set_flashdata('error', nl2br($mensagem));
            if ($idusuario) {
                redirect('painel/usuario/editar/'.$idusuario);
            } else {
                redirect('painel/usuario/adicionar');
            }
        }

        
    }
    
    private function setURL(&$data) {
        $data['URLLISTAR']  = site_url('painel/usuario');
        $data['ACAOFORM']   = site_url('painel/usuario/salvar');
    }
    
    public function excluir($id) {
        $res = $this->UsuarioM->delete($id);
        
        if ($res) {
            $this->session->set_flashdata('sucesso', 'Usuário removido com sucesso.');
        } else {
            $this->session->set_flashdata('error', 'Usuário não pode ser removido.');
        }
        
        redirect('painel/usuario');
    }
    
}