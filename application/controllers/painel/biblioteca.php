<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Biblioteca extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->layout = LAYOUT_DASHBOARD;


    }

    public function index(){

    }

    public function adicionar(){
        $this->load->view('painel/biblioteca_form');
    }

    public function upload(){
        $idbiblioteca       = $this->input->post ('idbiblioteca');
        $qquuid             = $this->input->post ('qquuid');
        $qqpartindex        = $this->input->post ('qqpartindex');
        $qqtotalfilesize    = $this->input->post ('qqtotalfilesize');
        $qqfilename         = $this->input->post ('qqfilename');

        $jsonRetorno = array();

        $folder = date("Y");
        $path = "assets/uploads/" . $folder;

        if (!is_dir($path)) {
            mkdir($path, 0777, $recursive = true);
        }

        $configUpload ['upload_path'] = $path;
        $configUpload ['allowed_types'] = "gif|jpg|jpeg|png|doc|docx|pdf";
        $configUpload ['max_width'] = '150000';
        $configUpload ['max_height'] = '6700000';
        $configUpload ['max_size'] = 1024 * 1024;

        $this->load->library('upload');
        $this->upload->initialize($configUpload);

    // verificamos se o upload foi processado com sucesso
        if (!$this->upload->do_upload('qqfile')) {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            $jsonRetorno = array (
                'success' => false,
                'mensagem' => $error
            );
        }else{
            $data ['dadosArquivo'] = $this->upload->data();
            $arquivoPath =  $path . "/" . $data['dadosArquivo']['file_name'];
            // passando para o array '$data'
            $data ['urlArquivo'] = base_url($arquivoPath);
            // definimos a URL para download
            $downloadPath =  $path . "/" . $data['dadosArquivo']['file_name'];
            // passando para o array '$data'
            $data ['urlDownload'] = base_url($downloadPath);

            $documento = array (
                "idbiblioteca"=> $idbiblioteca,
                "nome"        => $qqfilename,
                "tamanho"     => $qqtotalfilesize,
                "imagem"      => $arquivoPath 
            );

            $this->load->model('Upload_Model', 'UploadM');
            $iddocumentos = $this->UploadM->post ( $documento );

            if ($iddocumentos) {
             $jsonRetorno = array (
                'success' => true
            );
         }else{
            $jsonRetorno = array (
                'success' => false
            );
        }

    }



    $this->layout = '';
    echo json_encode ( $jsonRetorno );
    die ();
}

}