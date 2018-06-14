<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct ();
        $this->layout = '';
    }
    public function index() {
        $data = array();
        $data ['visibility'] = 'hidden';
        $this->parser->parse("painel/login", $data );

    }
    public function verifica() {
        $this->load->model ( "Usuario_Model", "UsuarioM" );
        $this->load->model ( "Attempt_Model", "AttemptM" );

        $username = $this->input->post ( "username" );
        $senha = $this->input->post ( "password" );

        $this->load->library ( 'form_validation' );

        $this->form_validation->set_rules ( 'username', 'username', 'required' );
        $this->form_validation->set_rules ( 'password', 'password', 'required' );

        if ($this->form_validation->run () == FALSE) {
            $this->session->set_flashdata ( 'erro', 'Informe os campos corretamente.' . validation_errors () );
            redirect ( 'painel/login' );
        }


        $res = $this->UsuarioM->get ( array(
            'username'  => $username
        ));



        if ($res) {

            $itens    = array();
            $user_id  = null;
            $datahora = date('Y-m-d H:i:s');
            foreach ($res as $r ) {



             $itens = array (
                "name"      => $r->name,
                "email"     => $r->email,
                "username"  => $username,
                "status"    => $r->status,
                "roles_id"  => $r->roles_id,
                "codusuario"   => $r->codusuario
            );

             $user_id = $r->codusuario;

             $isPasswordCorrect = password_verify($senha, $r->password);
             $status = $r->status;
         }

         $ExistemTentativas = $this->AttemptM->TotalDeTentaticas(array("codusuario" => $user_id));

         if ($ExistemTentativas < 5) {
             if ($isPasswordCorrect && $status == '1') {

                $this->AttemptM->LimparTentativas($user_id);

                $this->session->set_userdata ( "loginatendimento", $itens );
                redirect ( "painel" );
            }else{

                $itensTentativa = array(
                    "codusuario"  => $user_id,
                    "create_at" => $datahora
                );

                $this->AttemptM->RegistrarTentativa($itensTentativa);

                $this->session->set_flashdata ( 'erro', 'Senha incorreta.' );
                redirect ( "painel/login" );
            }
        }else{

            $bloqueUsuario = array(
                "status"   => '0'
            );

            $this->UsuarioM->update($bloqueUsuario, $user_id);

            $this->session->set_flashdata ( 'erro', 'Você escedeu o número de tentativas, usuário bloqueado!' );
            redirect ( "painel/login" );
        }


    } else {
        $this->session->set_flashdata ( 'erro', 'Usuário não encontrado.' );
        redirect ( "painel/login" );
    }


}
public function sair() {
    $this->session->unset_userdata ( "loginatendimento" );
    redirect ( "painel/login" );
}

}