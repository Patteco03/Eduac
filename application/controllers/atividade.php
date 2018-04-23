<?php

header("Access-Control-Allow-Origin: *");
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Atividade extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout = SINGLE_LOJA;
        $this->load->model('Atividade_Model', 'AtividadeM');
        $this->load->model('Modulo_Model', 'ModuloM');
        $this->load->model('Carrinho_Model', 'CarrinhoM');
        $this->load->model('Produto_Model', 'ProdutoM');
    }

    public function index()
    {

        clienteLogado(true);

        $data = array();
        $data ['URLADICIONAR'] = ci_site_url('atividade/adicionar');
        $data ['SALVARATIVIDADE'] = ci_site_url('atividade/salvar');
        $data ['BLC_DADOS'] = array();
        $data ['BLC_SEMDADOS'] = array();
        $data ['BLC_PAGINAS'] = array();
        $data ["BLC_LINHA"] = array();
        $data ["HOME"] = ci_site_url('');
        $data ["PORTALDOALUNO"] = ci_site_url('portaldoaluno');
        $data ['codcomprador'] = null;

        $comprador = $this->session->userdata('index');

        $data['BLC_CURSO'] = array();
        $data['BLC_MODULO'] = array();
        $data['nomeatividade'] = null;

        $data ['codcomprador'] = $comprador['codcomprador'];


        $carrinho = $this->CarrinhoM->get(array("co.codcomprador" => $comprador['codcomprador']));

        $aulaReferencia = null;

        if ($carrinho) {

            foreach ($carrinho as $c) {

                $infoproduto = $this->ProdutoM->get(array("codproduto" => $c->codproduto), TRUE, 0);

                if ($infoproduto) {

                    $data ['BLC_CURSO'] [] = array(
                        "CODPRODUTO" => $c->codproduto,
                        "NOME" => $c->nomeproduto,
                        "sel_codproduto" => null
                    );

                }

            }

        }


        $produtosExibidos = 0;
        $coluna = array();

        $pagina = $this->input->get('pagina');

        if (!$pagina) {
            $pagina = 0;
        } else {
            $pagina = ($pagina - 1) * LINHAS_PESQUISA_DASHBOARD;
        }

        $res = $this->AtividadeM->get(array("codcomprador" => $comprador['codcomprador']), FALSE, $pagina, FALSE);

        if ($res) {

            foreach ($res as $r) {

                // PEGA TODOS OS PELO CODIGO
                $moduloCurso = $this->ModuloM->get(array("codmodulo" => $r->codmodulo));

                if ($moduloCurso) {
                    foreach ($moduloCurso as $m) {

                        // DEFINE OS ELEMENTOS DO FILHO - FIM

                        $aulaReferencia = $m->nomemodulo;

                    }
                }

                $extensao = strtolower(end(explode(".", $r->name)));

                $urlfoto = null;

                switch ($extensao) {
                    case 'jpg':
                        $urlfoto = base_url('assets/img/icones/JPG.png');
                        break;
                    case 'jpeg':
                        $urlfoto = base_url('assets/img/icones/JPEG.png');
                        break;
                    case 'gif':
                        $urlfoto = base_url('assets/img/icones/GIF.png');
                        break;
                    case 'zip':
                        $urlfoto = base_url('assets/img/icones/ZIP.png');
                        break;
                    case 'wpd':
                        $urlfoto = base_url('assets/img/icones/WPD.png');
                        break;
                    case 'txt':
                        $urlfoto = base_url('assets/img/icones/TXT.png');
                        break;
                    case 'rtf':
                        $urlfoto = base_url('assets/img/icones/RTF.png');
                        break;
                    case 'ppt':
                        $urlfoto = base_url('assets/img/icones/PPT.png');
                        break;
                    case 'mp4':
                        $urlfoto = base_url('assets/img/icones/MP4.png');
                        break;
                    case 'html':
                        $urlfoto = base_url('assets/img/icones/HTML.png');
                        break;
                    case 'dvf':
                        $urlfoto = base_url('assets/img/icones/DVF.png');
                        break;
                    case 'doc':
                        $urlfoto = base_url('assets/img/icones/DOC.png');
                        break;
                    case 'cdr':
                        $urlfoto = base_url('assets/img/icones/CDR.png');
                        break;
                    case 'bmp':
                        $urlfoto = base_url('assets/img/icones/BMP.png');
                        break;
                    case 'avi':
                        $urlfoto = base_url('assets/img/icones/AVI.png');
                        break;
                    case 'ai':
                        $urlfoto = base_url('assets/img/icones/ai.png');
                        break;

                    default:
                        $urlfoto = base_url('assets/img/icones/DOCU.png');
                        break;
                }

                $date = strtotime($r->dataenvio);
                $new_date = date('d-m-Y', $date);

                $coluna [] = array(
                    "NOME" => $r->atividadenome,
                    "AULA" => $aulaReferencia,
                    "DATA" => $new_date,
                    "IMAGEMDESTACADA" => $urlfoto,
                    "URLEXCLUIR" => ci_site_url('atividade/excluir/' . $r->codatividades),
                    "URL" => base_url($r->path . '/' . $r->name)

                );


                $produtosExibidos++;

                if ($produtosExibidos === 1) {
                    $produtosExibidos = 0;
                    $data ["BLC_LINHA"] [] = array(
                        "BLC_COLUNA" => $coluna
                    );

                    $coluna = array();
                }
            }

            if ($produtosExibidos > 0) {
                $data ["BLC_LINHA"] [] = array(
                    "BLC_COLUNA" => $coluna
                );
            }
        } else {
            $data ['BLC_SEMDADOS'] [] = array();
        }

        $totalItens = $this->AtividadeM->getTotal();
        $totalPaginas = ceil($totalItens / LINHAS_PESQUISA_DASHBOARD);

        $pagina = $this->input->get('pagina');

        $indicePg = 1;
        if (!$pagina) {
            $pagina = 1;
        }
        $pagina = ($pagina == 0) ? 1 : $pagina;

        if ($totalPaginas > $pagina) {
            $data['HABPROX'] = null;
            $data['URLPROXIMO'] = ci_site_url('atividade?pagina=' . ($pagina + 1));
        } else {
            $data['HABPROX'] = 'disabled';
            $data['URLPROXIMO'] = '#';
        }

        if ($pagina <= 1) {
            $data['HABANTERIOR'] = 'disabled';
            $data['URLANTERIOR'] = '#';
        } else {
            $paginaVoltar = 99999;

            if ($pagina > 1) {
                $paginaVoltar = $pagina - 1;
            }
            $data['HABANTERIOR'] = null;
            $data['URLANTERIOR'] = ci_site_url('atividade?pagina=' . $paginaVoltar);
        }


        while ($indicePg <= $totalPaginas) {
            $data['BLC_PAGINAS'][] = array(
                "LINK" => ($indicePg == $pagina) ? 'active' : null,
                "INDICE" => $indicePg,
                "URLLINK" => ci_site_url('atividade?pagina=' . $indicePg)
            );

            $indicePg++;
        }


        $this->parser->parse('atividade_form', $data);

    }

    public function salvar()
    {

        $codatividade = $this->input->post('codatividade');
        $codcomprador = $this->input->post('codcomprador');
        $codmodulo = $this->input->post('codmodulo');
        $atividadenome = $this->input->post('nomeatividade');
        $dataenvio = date('Y-m-d H:i:s');


        if (isset($_FILES['filename'])) {

            $itens = array();

            $folder = random_string('alpha');
            $path = "assets/atividadeAlunos/" . $folder;

            //Verificamos se o diretorio existe
            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }

            $configUpload ['upload_path'] = $path;
            $configUpload ['allowed_types'] = 'gif|jpg|jpeg|png|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|avi|mpeg|mp3|mp4|3gp|ai';
            $configUpload ['max_width'] = '150000';
            $configUpload ['max_height'] = '6700000';

            $this->upload->initialize($configUpload);


            // verificamos se o upload foi processado com sucesso
            if (!$this->upload->do_upload('filename')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('erro', 'falha no upload.' . $error['error']);
                redirect('atividade');

            } else {
                // se correu tudo bem, recuperamos os dados do arquivo
                $data ['dadosArquivo'] = $this->upload->data();
                // definimos o path original do arquivo
                $arquivoPath = 'assets/atividadesAlunos/' . $folder . "/" . $data['dadosArquivo']['file_name'];
                // passando para o array '$data'
                $data ['urlArquivo'] = base_url($arquivoPath);
                // definimos a URL para download
                $downloadPath = 'assets/atividadesAlunos/' . $folder . "/" . $data['dadosArquivo']['file_name'];
                // passando para o array '$data'
                $data ['urlDownload'] = base_url($downloadPath);

                $itens = array(
                    'name' => $data ['dadosArquivo'] ['file_name'],
                    'tmp_name' => $data ['dadosArquivo'] ['file_path'],
                    'size' => $data ['dadosArquivo'] ['file_size'],
                    'type' => $data ['dadosArquivo'] ['file_type'],
                    'codatividades' => $codatividade,
                    'codcomprador' => $codcomprador,
                    'codmodulo' => $codmodulo,
                    'atividadenome' => $atividadenome,
                    'dataenvio' => $dataenvio,
                    'path' => $path

                );

                if ($codatividade) {
                    $codatividade = $this->AtividadeM->update($itens, $codatividade);
                } else {
                    $codatividade = $this->AtividadeM->post($itens);
                }

                if ($codatividade) {
                    $this->session->set_flashdata('sucesso', 'Arquivo inserido com sucesso.');
                    redirect('atividade');
                } else {
                    $this->session->set_flashdata('erro', 'Ocorreu um erro ao realizar a operação.');
                    redirect('atividade');
                }
            }


        } else {
            $this->session->set_flashdata('erro', 'Nenhum arquivo selecionado.');
            redirect('atividade');
        }


    }

    public function excluir($id)
    {

        $res = $this->AtividadeM->delete($id);

        if ($res) {
            $apagaArquivoPasta = $this->AtividadeM->get(array("codcomprador" => $id), FALSE, $pagina, FALSE);

            if ($apagaArquivoPasta) {
                $remove = unlink(base_url($apagaArquivoPasta->path . '/' . $apagaArquivoPasta->name));
            }
            $this->session->set_flashdata('sucesso', 'Atividade removida com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Atividade não pode ser removida.');
        }

        redirect('atividade');

    }


    public function getCurso()
    {

        $cod = $this->input->post('codcurso');

        $erro = null;

        if (empty($cod)) {
            $condicao = true;
            $retorno = array(
                'codigo' => $erro,
                'mensagem' => 'Nao existe curso!'
            );
            echo json_encode($retorno);
        } else {

            $erro = 1;

            $moduloCurso = $this->ModuloM->getModulosDisponiveis($cod);

            $listcursos = array();

            if ($moduloCurso) {

                foreach ($moduloCurso as $mo) {

                    $listcursos [] = array(
                        "nomemodulo" => $mo->nomemodulo,
                        "codmodulo" => $mo->codmodulo

                    );

                    $retorno = array(
                        'codigo' => $erro,
                        'mensagem' => 'Lista de cursos obtida com sucesso',
                        'cursos' => $listcursos

                    );

                }


                echo json_encode($retorno);
                die();

            }
        }


    }


}