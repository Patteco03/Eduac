<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
class Template {
    public function init() {
        $CI = &get_instance ();
        
        $output = $CI->output->get_output ();
        
        if (isset ( $CI->layout )) {
            if ($CI->layout) {
                
                $layoutOriginal = $CI->layout;

                if ($layoutOriginal == LAYOUT_DASHBOARD) {
                    $sessaoUsuario = $CI->session->userdata ( "loginatendimento" );
                    
                    if (! $sessaoUsuario) {
                        redirect ( "painel/login" );
                    }
                }
                
                $erroDash = $CI->session->flashdata ( 'erro' );
                $sucessoDash = $CI->session->flashdata ( 'sucesso' );
                
                if (! preg_match ( '/(.+).php$/', $CI->layout )) {
                    $CI->layout .= '.php';
                }
                
                $template = APPPATH . 'templates/' . $CI->layout;
                
                if (file_exists ( $template )) {
                    $layout = $CI->load->file ( $template, TRUE );
                } else {
                    die ( 'Template inválida.' );
                }
                
                $html = str_replace ( "{CONTEUDO}", $output, $layout );
                
                
                if ($erroDash) {
                    $erroDash = $this->criaAlerta ( $erroDash, 'alert-danger', 'Ops' );
                    $html = str_replace ( "{MENSAGEM_SISTEMA_ERRO}", $erroDash, $html );
                } else {
                    $html = str_replace ( "{MENSAGEM_SISTEMA_ERRO}", null, $html );
                }
                
                if ($sucessoDash) {
                    $sucessoDash = $this->criaAlerta ( $sucessoDash, 'alert-success', 'OK' );
                    $html = str_replace ( "{MENSAGEM_SISTEMA_SUCESSO}", $sucessoDash, $html );
                } else {
                    $html = str_replace ( "{MENSAGEM_SISTEMA_SUCESSO}", null, $html );
                }
            } else {
                $erroDash = $CI->session->flashdata ( 'erro' );
                
                if ($erroDash) {
                    $erroDash = $this->criaAlerta ( $erroDash, 'alert-danger', 'Ops' );
                    $output = str_replace ( "{MENSAGEM_SISTEMA_ERRO}", $erroDash, $output );
                } else {
                    $output = str_replace ( "{MENSAGEM_SISTEMA_ERRO}", null, $output );
                }
                
                $html = $output;
            }
        } else {
            $erroDash = $CI->session->flashdata ( 'erro' );
            
            if ($erroDash) {
                $erroDash = $this->criaAlerta ( $erroDash, 'alert-danger', 'Ops' );
                $output = str_replace ( "{MENSAGEM_SISTEMA_ERRO}", $erroDash, $output );
            } else {
                $output = str_replace ( "{MENSAGEM_SISTEMA_ERRO}", null, $output );
            }
            
            $html = $output;
        }
        
        $CI->output->_display ( $html );
    }
    private function criaAlerta($mensagem, $tipo, $titulo) {
        $html = "<div class=\"alert {$tipo}\">\n";
        $html .= "\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n";
        $html .= "\t<strong>{$titulo}!</strong> {$mensagem}\n";
        $html .= "</div>";
        return $html;
    }
    
    /**
     * http://stackoverflow.com/questions/13031250/php-function-to-delete-all-between-certain-characters-in-string
     *
     * @param unknown $beginning            
     * @param unknown $end            
     * @param unknown $string            
     * @return unknown mixed
     */
    private function deleteAllBetween($beginning, $end, $string) {
        $beginningPos = strpos ( $string, $beginning );
        $endPos = strpos ( $string, $end );
        
        if (! $beginningPos || ! $endPos) {
            return $string;
        }
        
        $textToDelete = substr ( $string, $beginningPos, ($endPos + strlen ( $end )) - $beginningPos );
        return str_replace ( $textToDelete, '', $string );
    }
    private function tratamentoLoja($CI, &$html) {
        $title = isset ( $CI->title ) ? $CI->title . ' - ' . 'Eduac' : 'Cursos';
        
        $this->setVariable ( "TITLE", $title, $html );
        $this->setVariable ( "URLBUSCA", site_url ( "busca" ), $html );
        
        $comprador = $CI->session->userdata ( 'index' );
        
        if ($comprador) {
            $this->setVariable ("NOMECLIENTE", 'Olá -'.$comprador ["nomecomprador"], $html );
            $html = $this->deleteAllBetween ( "<naologado>", "</naologado>", $html );
            //remove form de login para logout
            $this->setVariable("LOGIN", 'hide', $html);
            $this->setVariable("SAIR", 'show', $html);
        } else {
            $this->setVariable ( "NOMECLIENTE",  '', $html );
            $html = $this->deleteAllBetween ( "<logado>", "</logado>", $html );
            $this->setVariable("LOGIN", 'show', $html);
            $this->setVariable("SAIR", 'hide', $html);
        }
    }
    
    /**
     * Seta os valores das variáveis das templates
     *
     * @param String $name            
     * @param String $value            
     * @param String $html            
     */
    private function setVariable($name, $value, &$html) {
        $html = str_replace ( "{" . $name . "}", $value, $html );
    }
}