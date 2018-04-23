<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Modulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = LAYOUT_DASHBOARD;
        $this->load->model('Produto_Model', 'ProdutoM');
        $this->load->model('Modulo_Model', 'ModuloM');
        $this->load->model('Arquivo_Model', 'ArquivoM');
        $this->load->model('ProdutoFoto_Model', 'FotoM');
    }

    public function index()
    {
        $data = array();
        $data ['URLADICIONAR'] = site_url('painel/produto/adicionar');
        $data ['URLLISTAR'] = site_url('painel/produto');
    }

    public function videoaula($id)
    {
        $data = array();

        $data ['URLLISTAR'] = site_url('painel/produto');
        $data ['URLUPLOADFOTO'] = site_url('painel/modulo/salvafoto');
        $data ['MODULO_TABLE'] = array();
        $data ['BLC_CONTEUDODISPONIVEL'] = array();
        $data ['BLC_SEMCONTEUDODISPONIVEL'] = array();
        $data ['BLC_SEMMODULOSDISPONIVEIS'] = array();
        $data ['BLC_INFORMACOES'] = array();
        $data ['codmodulo'] = null;
        $data ['statusmodulo'] = '';
        $data ['nomemodulo'] = null;
        $data ['descricaomodulo'] = null;
        $data ['nomeproduto'] = null;
        $data ['SALVAMODULO'] = site_url('painel/modulo/salvarmodulo');
        $data ['CODMODULO'] = null;


        $infoproduto = $this->ProdutoM->get(array(
            "codproduto" => $id
        ), TRUE);

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $data ['BLC_INFORMACOES'] [] = array(
            "NOMECURSO" => $infoproduto->nomeproduto,
            "RESUMO" => $infoproduto->resumoproduto,
            "DURACAO" => $infoproduto->duracaocurso,
            "DATAINICIO" => strftime('%A, %d de %B de %Y', $infoproduto->datainicio),
            "DATAFINAL" => strftime('%A, %d de %B de %Y', $infoproduto->datafinal),
            "VALOR" => $infoproduto->valorproduto
        );

        if (!$infoproduto) {
            show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
        }

        if ($infoproduto) {

            foreach ($infoproduto as $r) {

                $foto = $this->FotoM->getFoto($id);

                if (!$foto) {

                    $urlFoto = base_url("assets/img/foto-indisponivel.jpg");
                    $data ['URLFOTO'] = $urlFoto;
                }

                if ($foto) {

                    foreach ($foto as $f) {

                        if ($foto) {
                            $urlFoto = base_url("assets/img/produto/150x150/" . $f->codprodutofoto . "." . $f->produtofotoextensao);
                        }

                        $data ['URLFOTO'] = $urlFoto;
                    }
                }
            }
        }

        if (empty ($infoproduto->codproduto)) {
            $data ['BLC_SEMMODULOSDISPONIVEIS'] [] = array();
        } else {

            // PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
            $modulo = $this->ModuloM->getModulosDisponiveis($id);

            if ($modulo) {
                foreach ($modulo as $m) {

                    // DEFINE OS ELEMENTOS DO FILHO - INÍCIO
                    $aFilhos = array();

                    // PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
                    $arquivos = $this->ArquivoM->getArquivosDisponiveis($m->codmodulo);

                    if ($arquivos) {
                        foreach ($arquivos as $df) {
                            $aFilhos [] = array(
                                "CODARQUIVO" => $df->codarquivosmodulo,
                                "CONTEUDOMODULO" => base_url("assets/uploads/" . $df->name),
                                "AULANOME" => $df->aulanome,
                                "URLEXCLUIRAULA" => site_url('painel/modulo/excluiraula/' . $df->codarquivosmodulo),
                                "URLVER" => site_url('painel/modulo/ver/' . $df->codarquivosmodulo),
                                "URLEDITARAULA" => site_url('painel/modulo/editaraula/' . $df->codarquivosmodulo),
                            );


                        }
                    }
                    // DEFINE OS ELEMENTOS DO FILHO - FIM

                    $data ['MODULO_TABLE'] [] = array(
                        "NOMEMODULO" => $m->nomemodulo,
                        "URLMODULO" => $m->codmodulo,
                        "URLEXCLUIR" => site_url('painel/modulo/excluirmodulo/' . $m->codmodulo),
                        "URLEDITAR" => site_url('painel/modulo/editar/' . $m->codmodulo),
                        "IDMODULO" => $m->codmodulo,
                        "BLC_CONTEUDODISPONIVEL" => $aFilhos
                    );
                    $data ['CODMODULO'] = $m->codmodulo;


                }
            } else {
                $data ['BLC_SEMMODULOSDISPONIVEIS'] [] = array();
                $data ['BLC_SEMCONTEUDODISPONIVEL'] [] = array();
            }
        }


        $data ['PRODUTO'] = $infoproduto->nomeproduto;
        $data ['CODPRODUTO'] = $infoproduto->codproduto;

        $this->parser->parse('painel/videoaula_form', $data);
    }

    public function salvarmodulo()
    {
        $codproduto = $this->input->post('codproduto');
        $codmodulo = $this->input->post('codmodulo');
        $nomemodulo = $this->input->post('nomemodulo');
        $descricaomodulo = $this->input->post('descricaomodulo');
        $statusmodulo = $this->input->post('statusmodulo');

        $erros = FALSE;
        $mensagem = null;

        if (!$nomemodulo) {
            $erros = TRUE;
            $mensagem .= "Informe nome do módulo.\n";
        }

        if (!$erros) {
            $itens = array(
                "codproduto" => $codproduto,
                "nomemodulo" => $nomemodulo,
                "statusmodulo" => $statusmodulo,
                "descricaomodulo" => $descricaomodulo
            );

            if ($codmodulo) {
                $codmodulo = $this->ModuloM->update($itens, $codmodulo);
            } else {
                $codmodulo = $this->ModuloM->post($itens);
            }

            if ($codmodulo) {
                $this->session->set_flashdata('sucesso', 'Módulo inserido com sucesso.');
                redirect('painel/modulo/videoaula/' . $codproduto);
            } else {
                $this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
            }
        } else {
            $this->session->set_flashdata('erro', nl2br($mensagem));
            if ($codmodulo) {
                redirect('painel/modulo/videoaula/' . $codproduto);
            } else {
                redirect('painel/produto/adicionar');
            }
        }
    }

    public function excluirmodulo($id)
    {
        $res = $this->ModuloM->delete($id);

        if ($res) {
            $this->session->set_flashdata('sucesso', 'Módulo removido com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Módulo não pode ser removido.');
        }


        redirect('painel/produto/');
    }

    // Método que processar o upload do arquivo
    public function upload()
    {
        $codarquivosmodulo = $this->input->post('codarquivosmodulo');
        $codmodulo = $this->input->post('codmodulo');
        $aulanome = $this->input->post('aula');
        $status = $this->input->post('status');
        $tipoaula = $this->input->post('tipo_aula');
        $descricao = $this->input->post('descricao');

        $embed = $this->input->post('embed');
        $arquivo = $_FILES['arquivo'];

        $retorno = array();

        $id = null;
        $itens = array();

        // PEGA TODOS OS MODULOS DE ACORDO COM OS CURSOS
        $modulo = $this->ModuloM->get(array("codmodulo" => $codmodulo));

        if ($modulo) {
            foreach ($modulo as $m) {
                $id = $m->codproduto;
            }
        }


        // definimos um nome aleatório para o diretório
        $folder = random_string('alpha');
        $path = "assets/uploads/" . $folder;

        // verificamos se o diretório existe
        // se não existe criamos com permissão de leitura e escrita
        if (!is_dir($path)) {
            mkdir($path, 0777, $recursive = true);
        }

        // definimos as configurações para o upload
        // determinamos o path para gravar o arquivo
        $configUpload ['upload_path'] = $path;
        // definimos - através da extensão -
        // os tipos de arquivos suportados
        $configUpload ['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|avi|mpeg|mp3|mp4|3gp|ai|";
        $configUpload ['max_width'] = '150000';
        $configUpload ['max_height'] = '6700000';
        $configUpload ['max_size'] = 1024 * 1024;

        $this->load->library('upload');
        $this->upload->initialize($configUpload);

        // verificamos se o upload foi processado com sucesso
        if (!$this->upload->do_upload('arquivo')) {
            // em caso de erro retornamos os mesmos para uma variável
            // e enviamos para a home
            $error = array(
                'error' => $this->upload->display_errors()
            );
            $retorno = array(
                'status' => 1,
                'title' =>  'Oh no!',
                'type'  => 'error',
                'text' => 'falha no upload!' . $error['error']
            );
        } else {
            // se correu tudo bem, recuperamos os dados do arquivo
            $data ['dadosArquivo'] = $this->upload->data();
            // definimos o path original do arquivo
            $arquivoPath = 'assets/uploads/' . $folder . "/" . $data['dadosArquivo']['file_name'];
            // passando para o array '$data'
            $data ['urlArquivo'] = base_url($arquivoPath);
            // definimos a URL para download
            $downloadPath = 'assets/uploads/' . $folder . "/" . $data['dadosArquivo']['file_name'];
            // passando para o array '$data'
            $data ['urlDownload'] = base_url($downloadPath);

            $itens = array(
                'name' => $data ['dadosArquivo'] ['file_name'],
                'tmp_name' => $data ['dadosArquivo'] ['file_path'],
                'size' => $data ['dadosArquivo'] ['file_size'],
                'type' => $data ['dadosArquivo'] ['file_type'],
                'folder' => $folder,
                'codmodulo' => $codmodulo,
                'status' => $status,
                'aulanome' => $aulanome,
                'tipo' => $tipoaula,
                'descricaoo' => $descricao,
            );


            if ($codarquivosmodulo) {
                $codarquivosmodulo = $this->ArquivoM->update($itens, $codarquivosmodulo);
            } else {
                $codarquivosmodulo = $this->ArquivoM->post($itens);
            }


            if ($codarquivosmodulo) {
                $retorno = array(
                    'status' => 1,
                    'title' =>  'Ok!',
                    'type'  => 'success',
                    'text' => 'Aula inserida com sucesso!'
                );
            } else {
                $retorno = array(
                    'status' => 1,
                    'title' =>  'Oh no!',
                    'type'  => 'info',
                    'text' => 'falha no upload!'
                );
            }

        }

        echo json_encode($retorno);
        die();

    }

    public function salvafoto()
    {
        $codcomprador = $this->input->post('codproduto');
        $arquivo = $_FILES ['fotos'];

        if ($arquivo ['error'] [0]) {
        }

        $arquivoNome = $arquivo ["name"] [0];

        $extensao = strtolower(pathinfo($arquivoNome, PATHINFO_EXTENSION));

        $foto = array(
            "codproduto" => $codcomprador,
            "produtofotoextensao" => $extensao
        );

        $codfoto = $this->FotoM->post($foto);

        $enderecoFoto = '/assets/img/produto/150x150/' . $codfoto . '.' . $extensao;

        move_uploaded_file($arquivo ['tmp_name'] [0], FCPATH . $enderecoFoto);

        // CRIA A MINIATURA DA FOTO DO PERFIL
        $this->redimensionaFoto($codfoto, $extensao, 150, 150);

        $jsonRetorno = array(
            "files" => array(
                array(
                    "name" => $arquivo ["name"] [0],
                    "type" => $arquivo ["type"] [0],
                    "url" => base_url($enderecoFoto),
                    "thumbnarilUrl" => base_url($enderecoFoto),
                    "deleteUrl" => site_url('painel/produto/150x150/removefoto/' . $codfoto . '/' . $produtofotoextensao),
                    "deleteType" => 'DELETE'
                )
            )
        );

        if ($jsonRetorno) {
            $this->session->set_flashdata('sucesso', 'foto alterada com sucesso.');
            redirect('painel/produto/');
        } else {
            $this->session->set_flashdata('erro', 'falha ao tentar enviar foto.');
            redirect('painel/modulo/videoaula/' . $id);
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
    private function redimensionaFoto($codprodutofoto, $extensao, $altura, $largura)
    {
        if (!is_dir(FCPATH . "/assets/img/produto/{$altura}x{$largura}/")) {
            mkdir(FCPATH . "/assets/img/produto/{$altura}x{$largura}/");
        }

        $configImagem ['image_library'] = 'gd2'; // BIBLIOTECA RESPONSÁVEL PELO REDIMENSIONAMENTO
        $configImagem ['source_image'] = FCPATH . '/assets/img/produto/original/' . $codprodutofoto . '.' . $extensao;
        $configImagem ['new_image'] = FCPATH . "/assets/img/produto/{$altura}x{$largura}/" . $codprodutofoto . '.' . $extensao;
        $configImagem ['create_thumb'] = FALSE;
        $configImagem ['maintain_ratio'] = TRUE;
        $configImagem ['width'] = $largura;
        $configImagem ['height'] = $altura;

        $this->load->library('image_lib');
        $this->image_lib->clear();
        $this->image_lib->initialize($configImagem);

        $this->image_lib->resize();
    }


    public function excluircurso()
    {

        $cod = $this->input->post('id');

        $arquivo = $this->ArquivoM->get($cod);

        $response = array();

        $this->load->helper("file");
        if ($arquivo) {

            foreach ($arquivo as $a) {

                $dir = base_url("assets/uploads/" . $a->folder);
            }


            delete_files($dir);

            $res = $this->ArquivoM->delete($cod);

            if ($res) {
                $response = array(
                    'status' => 1,
                    'title' =>  'Ok!',
                    'type'  => 'success',
                    'text' => 'Aula inserida com sucesso!'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'title' =>  'Ok!',
                    'type'  => 'success',
                    'text' => 'Aula inserida com sucesso!'
                );
            }

        } else {
            $this->session->set_flashdata('Error', 'Arquivos não existente.');
        }

        echo json_encode($response);
        die();
    }


    public function veraula()
    {

        $data = array();


        $this->parser->parse('painel/ver_aula_form', $data);
    }

    public function editaraula()
    {

        $cod = $this->input->post('id');

        $data = array();
        $data ['ACAO'] = 'Edição';
        $data ['NOMEAULA'] = null;
        $data ['URLUPLOAD'] = site_url('painel/modulo/upload/');
        $data ['CODMODULO'] = null;
        $data ['CODARQUIVOS'] = null;

        $res = $this->ArquivoM->get($cod);

        if ($res) {
            foreach ($res as $r) {

                $infomodulo = $this->ModuloM->get(array("codmodulo" => $r->codmodulo), TRUE);

                if ($infomodulo) {
                    foreach ($infomodulo as $i) {

                        $this->setURL($data, $i->codproduto);


                    }
                }

                $data ['NOMEAULA'] = $r->aulanome;
                $data['status_' . $r->status] = 'selected="selected"';
                $data['tipo_' . $r->tipo] = 'selected="selected"';
                $data ['descricao'] = $r->descricao;
                $data ['CODMODULO'] = $r->codmodulo;
                $data ['CODARQUIVOS'] = $r->codarquivosmodulo;

                $chave = $valor;
            }


        } else {
            show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
        }

        $this->parser->parse('painel/editar_aula_form', $data);

    }

    public function editar($id)
    {
        $data = array();
        $data ['ACAO'] = 'Edição';

        $res = $this->ModuloM->get(array("codmodulo" => $id), TRUE);

        if ($res) {
            foreach ($res as $r) {

                $this->setURL($data, $r->codproduto);

                $data ['codproduto'] = $r->codproduto;
                $data ['NOMEMODULO'] = $r->nomemodulo;
                $data ['nomemodulo'] = $r->nomemodulo;
                $data ['descricaomodulo'] = $r->descricaomodulo;
                $data ['codmodulo'] = $r->codmodulo;

                $data['statusmodulo_' . $r->statusmodulo] = 'selected="selected"';

                $chave = $valor;
            }


        } else {
            show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado.');
        }


        $this->parser->parse('painel/modulo_editar_form', $data);
    }

    private function setURL(&$data, $id)
    {
        $data['URLLISTAR'] = site_url('painel/modulo/videoaula/' . $id);
        $data['ACAOFORM'] = site_url('painel/modulo/salvarmodulo');
    }
}
