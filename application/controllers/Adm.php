<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('autor_model', 'AM');
        $this->load->model('noticia_model', 'NM');
    }

    public function acao(){
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');      

        if( $login && $senha ) {
        
            $this->load->model('login_model'); // carregamos o model
            
            $verifica = $this->login_model->verifica($login, $senha);
            
            if( $verifica === true ) {
            
                $this->session->set_userdata( 'usuario', $login );
                $this->session->set_userdata( 'logado', true );
                
                //$this->load->view('sobre');
                redirect(site_url('adm/noticias'));
            
            } else {
                
                redirect(site_url('login?retorno=erro'));
            
            }
            
        } else {
           
            redirect(site_url('login?retorno=campos-vazios'));
        
        }
        
    }
    
    public function logout() {
        
        $this->session->sess_destroy();
        redirect(site_url('login'));

    }
    
    public function noticias(){
        if($this->session->userdata('logado')==true){
            $autor = $this->AM->listar_autor();
            $noticias = $this->NM->listar_noticias();
            
            $dados = array(
                    'lista_autor' => $autor,
                    'lista_noticia' => $noticias
                );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/noticias', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
        
    public function autor(){
        if($this->session->userdata('logado')==true){
            $autorCon = $this->AM->cons_autor();
                  
            $autor = array(
                    'autor_cons' => $autorCon
                );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/autor', $autor);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function inativar_noticia($inativaNot=NULL){
        if($this->session->userdata('logado')==true){
            if($this->NM->inativarNoticia($inativaNot) === TRUE){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Noticia inativada com sucesso.</div>');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível inativar a noticia.</div>');
            }
            redirect('adm/noticias','refresh');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function inativar_autor($inativaAutor=NULL){
        if($this->session->userdata('logado')==true){
            if($this->AM->inativarAutor($inativaAutor) === TRUE){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Autor inativado com sucesso.</div>');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível inativar o autor.</div>');
            }
            redirect('adm/autor','refresh');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function cadastrar_autor(){
        if($this->session->userdata('logado')==true){
            // Seta as regras para validação do formulário
            $this->form_validation->set_rules('nome', '<strong>Nome</strong>', 'required|trim');
            $this->form_validation->set_rules('login', '<strong>Login</strong>', 'required|trim');
            $this->form_validation->set_rules('senha', '<strong>Senha</strong>', 'required|trim');
            if($this->form_validation->run() === FALSE){
                $this->autor();
            }else{
                // Se é feito o cadastro no bd é retornado true
                if($this->AM->cadastrar_autor() === TRUE){
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Seu cadastro foi efetuado sem erros.</div>');
                }else{
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Seu cadastro não foi efetuado.</div>');
                }
                redirect('adm/autor','refresh');
            }
        }else{
            redirect(site_url('login'));
        }    
    }
    
    public function cadastrar_noticia(){
        if($this->session->userdata('logado')==true){
            // Seta as regras para validação do formulário
            $this->form_validation->set_rules('titulo', '<strong>Titulo</strong>', 'required|trim');
            $this->form_validation->set_rules('noticia', '<strong>Noticia</strong>', 'required|trim');
            
            if($this->form_validation->run() === FALSE){
                $this->noticias();
            }else{
                // Se é feito o cadastro no bd é retornado true
                if($this->NM->cadastrar_noticia() === TRUE){
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Seu cadastro foi efetuado sem erros.</div>');
                }else{
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Seu cadastro não foi efetuado.</div>');
                }
                redirect('adm/noticias','refresh');
            }
        }else{
            redirect(site_url('login'));
        }    
    }
    
    public function editar_autor($idusuario = NULL){
        if($this->session->userdata('logado')==true){
            $select_autor = $this->AM->localiza_autor_edicao($idusuario);
            
            $dados = array(
                    'autor' => $select_autor
                );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/editar_autor', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function gravar_edicao_autor(){
        if($this->session->userdata('logado')==true){
            $this->form_validation->set_rules('idusuario', '<strong>ID</strong>', 'required|trim');
            $this->form_validation->set_rules('nome', '<strong>Nome</strong>', 'required|trim');
            $this->form_validation->set_rules('login', '<strong>Login</strong>', 'required|trim');
            
            
                if($this->AM->gravar_edicao_autor() === TRUE){
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Cadastro editado sem erros.</div>');
                }else{
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível editar o cadastro.</div>');
                }
                redirect('adm/autor','refresh');
            
        }else{
            redirect(site_url('login'));
        }    
    }
    
    public function editar_noticia($idnoticia = NULL){
        if($this->session->userdata('logado')==true){
            $select_noticia = $this->NM->localiza_noticia_edicao($idnoticia);
            
            $dados = array(
                    'noticia' => $select_noticia
                );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/editar_noticia', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function gravar_edicao_noticia(){
        if($this->session->userdata('logado')==true){
            $this->form_validation->set_rules('idnoticia', '<strong>ID</strong>', 'required|trim');
            $this->form_validation->set_rules('titulo', '<strong>Titulo</strong>', 'required|trim');
            $this->form_validation->set_rules('corpo', '<strong>Corpo da Notícia</strong>', 'required|trim');
            
            
                if($this->NM->gravar_edicao_noticia() === TRUE){
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Cadastro editado sem erros.</div>');
                }else{
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível editar o cadastro.</div>');
                }
                redirect('adm/noticia','refresh');
            
        }else{
            redirect(site_url('login'));
        }    
    }
    
    

    /*
    
    
    public function editar_poco($utme = NULL,$utmn=NULL){
        if($this->session->userdata('logado')==true){
            $local_pocos = $this->PM->cons_poco($utme,$utmn);
            $cidades = $this->PM->listar_municipio();

            $dados = array(
                    'poco' => $local_pocos,
                    'conscity' => $cidades
                );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/editar_poco', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function editar_analise($sequencia=NULL){
        if($this->session->userdata('logado')==true){
            $local_analises = $this->PM->cons_analise($sequencia);
            
            $dados = array(
                    'analise' => $local_analises
                );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/editar_analise', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
    
*/
   /*
    public function pocos(){
        if($this->session->userdata('logado')==true){
            /*         
            $this->load->library('pagination');
            $maximo = 7;

            $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

            $config['base_url'] = base_url('adm/pocos/');
            $config['total_rows'] = $this->PM->contaRegistros();
            $config['per_page'] = $maximo; // numero maximo de noticias por pagina
            $config["uri_segment"] = 3;
            $config['first_link'] = '<<';
            $config['last_link'] = '>>';
            $config['next_link'] = '>';
            $config['prev_link'] = '<';

            $this->pagination->initialize($config);
            
            $dataConsPoco['consutme'] = $this->input->post('consutme');
            $dataConsPoco['consutmn'] = $this->input->post('consutmn');
            $dataConsPoco['consmunicipios_cod'] = $this->input->post('consmunicipios_cod');
            $dataConsPoco['conssituacao'] = $this->input->post('consituacao');
                       
            $lista_pocos = NULL;
            
            if(isset($dataConsPoco['consutme']) || isset($dataConsPoco['consutmn']) || isset($dataConsPoco['consmunicipios_cod']) || isset($dataConsPoco['conssituacao'])){
                $lista_pocos = $this->PM->listar_pocos();
                //$lista_pocos = $this->PM->get_all_ativo_paginacao($maximo, $inicio)->result();
            }
            //$lista_pocos = $this->PM->get_all_ativo_paginacao($maximo, $inicio)->result();
            
            $cidades = $this->PM->listar_municipio();
            
            $dados = array(
                'poco' => $lista_pocos,
                //'paginacao' => $this->pagination->create_links(),
                'conscity' => $cidades, 'city' => $cidades
            );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/pocos', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function gravar_edicao(){
        if($this->session->userdata('logado')==true){
            $this->form_validation->set_rules('utme', '<strong>UTME</strong>', 'required|trim');
            $this->form_validation->set_rules('utmn', '<strong>UTMN</strong>', 'required|trim');
            $this->form_validation->set_rules('latitudese', '<strong>Latitude</strong>', 'required|trim');
            $this->form_validation->set_rules('longitudes', '<strong>Longitude</strong>', 'required|trim');

            $this->form_validation->set_rules('uso_agua', '<strong>Uso da Água</strong>', 'required|trim');
            $this->form_validation->set_rules('situacao', '<strong>Situação</strong>', 'required|trim');
            $this->form_validation->set_rules('municipios_cod_ibge', '<strong>Município</strong>', 'required|trim');
            $this->form_validation->set_rules('bacia_varzea_cod_bacia', '<strong>Bacia</strong>', 'required|trim');

            if($this->form_validation->run() === FALSE){
                $this->editar_poco($this->input->post('oldutme'),$this->input->post('oldutmn'));
            }else{
                if($this->PM->gravar_edicao() === TRUE){
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Cadastro editado sem erros.</div>');
                }else{
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível editar o cadastro.</div>');
                }
                redirect('adm/pocos','refresh');
            }
        }else{
            redirect(site_url('login'));
        }    
    }
    
    public function gravar_edicao_analise(){
        if($this->session->userdata('logado')==true){    
            $this->form_validation->set_rules('utme', '<strong>UTME</strong>', 'required|trim');
            $this->form_validation->set_rules('utmn', '<strong>UTMN</strong>', 'required|trim');
            $this->form_validation->set_rules('data', '<strong>Data</strong>', 'required|trim');

            if($this->form_validation->run() === FALSE){
                $this->editar_analise($this->input->post('oldutme'),$this->input->post('oldutmn'),$this->input->post('sequencia'));
            }else{
                if($this->PM->gravar_edicao_analise() === TRUE){
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Análise editada sem erros.</div>');
                }else{
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível editar a análise.</div>');
                }
                redirect('adm/analises','refresh');
            }
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function rel_pocos(){
        if($this->session->userdata('logado')==true){
            $dataConsPoco['consutme'] = $this->input->post('consutme');
            $dataConsPoco['consutmn'] = $this->input->post('consutmn');
            $dataConsPoco['consmunicipios_cod'] = $this->input->post('consmunicipios_cod');
            $dataConsPoco['conssituacao'] = $this->input->post('consituacao');
                       
            $lista_pocos = NULL;
            
            if(isset($dataConsPoco['consutme']) || isset($dataConsPoco['consutmn']) || isset($dataConsPoco['consmunicipios_cod']) || isset($dataConsPoco['conssituacao'])){
                $lista_pocos = $this->PM->listar_pocos();
            }
            
            $cidades = $this->PM->listar_municipio();
            
            $dados = array(
                'poco' => $lista_pocos,
                'conscity' => $cidades, 'city' => $cidades
            );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/cons_poco', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }
*/
    
}



