<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

    function __construct() {
        parent::__construct();
        // Carrega o model Pessoa
        $this->load->model('poco_model', 'PM');
    }
    
    public function constr(){
        $this->load->view('constr');
    }

    public function acao(){
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');      

        if( $login && $senha ) {
        
            $this->load->model('loginmodel'); // carregamos o model
            
            $verifica = $this->loginmodel->verifica($login, $senha);
            
            if( $verifica === true ) {
            
                $this->session->set_userdata( 'usuario', $login );
                $this->session->set_userdata( 'logado', true );
                
                //$this->load->view('sobre');
                redirect(site_url('pocos'));
            
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

    public function login() {
    
        $this->load->view('site/template/header');
        $this->load->view('adm/login_form');
        $this->load->view('site/template/footer');   
    }
    
    public function cadastrar(){
        // Seta as regras para validação do formulário
        $this->form_validation->set_rules('utme', '<strong>UTME</strong>', 'required|trim');
        $this->form_validation->set_rules('utmn', '<strong>UTMN</strong>', 'required|trim');
        $this->form_validation->set_rules('latitudese', '<strong>Latitude</strong>', 'required|trim');
        $this->form_validation->set_rules('longitudes', '<strong>Longitude</strong>', 'required|trim');
        
        $this->form_validation->set_rules('uso_agua', '<strong>Uso da Água</strong>', 'required|trim');
        $this->form_validation->set_rules('situacao', '<strong>Situação</strong>', 'required|trim');
        $this->form_validation->set_rules('municipios_cod_ibge', '<strong>Município</strong>', 'required|trim');
        $this->form_validation->set_rules('bacia_varzea_cod_bacia', '<strong>Bacia</strong>', 'required|trim');
        if($this->form_validation->run() === FALSE){
            $this->pocos();
        }else{
            // Se é feito o cadastro no bd é retornado true
            if($this->PM->cadastrar() === TRUE){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Seu cadastro foi efetuado sem erros.</div>');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Seu cadastro não foi efetuado.</div>');
            }
            redirect('pocos','refresh');
        }
    }
    
    public function pocos() {
    
        if($this->session->userdata('logado')==true){
            $dataConsPoco['consutme'] = $this->input->post('consutme');
            $dataConsPoco['consutmn'] = $this->input->post('consutmn');
            $dataConsPoco['consmunicipios_cod'] = $this->input->post('consmunicipios_cod');
            $dataConsPoco['conssituacao'] = $this->input->post('consituacao');
            $cidades = $this->PM->listar_municipio();
            
            if(isset($dataConsPoco['consutme']) || isset($dataConsPoco['consutmn']) || isset($dataConsPoco['consmunicipios_cod']) || isset($dataConsPoco['conssituacao'])){
                $lista_pocos = $this->PM->listar_pocos();
                
                $dados = array(
                        'city' => $cidades,
                        'conscity' => $cidades,
                        'poco' => $lista_pocos
                    );
            }else{
                $dados = array(
                        'city' => $cidades,
                        'conscity' => $cidades,
                        'poco' => null
                    );
            }
            $this->load->view('adm/template/header');
            $this->load->view('adm/pocos', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
        
    } 
    
    public function conspoco() {
    
        if($this->session->userdata('logado')==true){
            $lista_pocos = $this->PM->listar_pocos();
            $cidades = $this->PM->listar_municipio();

            $dados = array(
                    'city' => $cidades,
                    'conscity' => $cidades,
                    'poco' => $lista_pocos
                );
            //redirect('pocos','refresh');
            $this->load->view('adm/template/header');
            $this->load->view('adm/pocos', $dados);
            $this->load->view('adm/template/footer');
            
        }else{
            redirect(site_url('login'));
        }
        
           
    }
   
    public function analises() {
        if($this->session->userdata('logado')==true){
            $this->load->view('adm/template/header');
            $this->load->view('adm/analises');
            $this->load->view('adm/template/footer'); 
        }else{
            redirect(site_url('login'));
        }
    }
    
    public function inativar_poco(){
        $editUtme = $this->input->post('editutme');
        $editUtmn = $this->input->post('editutmn');
        
        if($this->PM->inativar($editUtme,$editUtmn) === TRUE){
            $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Poço inativado com sucesso.</div>');
        }else{
            $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível inativar o posso.</div>');
        }
        redirect('pocos','refresh');
        
    }
    

   /*
    public function pocos(){
        if($this->session->userdata('logado')==true){
                     
            $this->load->library('pagination');
            $maximo = 5;

            $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

            $config['base_url'] = base_url('pocos');
            $config['total_rows'] = $this->PM->contaRegistros();
            $config['per_page'] = $maximo; // numero maximo de noticias por pagina
            $config["uri_segment"] = 3;
            $config['first_link'] = '<<';
            $config['last_link'] = '>>';
            $config['next_link'] = '>';
            $config['prev_link'] = '<';

            $this->pagination->initialize($config);

            $lista_pocos = $this->PM->get_all_ativo_paginacao($maximo, $inicio)->result();
            $cidades = $this->PM->listar_municipio();
            
            $dados = array(
                'poco' => $lista_pocos,
                'paginacao' => $this->pagination->create_links(),
                'city' => $cidades
            );
            
            $this->load->view('adm/template/header');
            $this->load->view('adm/pocos', $dados);
            $this->load->view('adm/template/footer');
        }else{
            redirect(site_url('login'));
        }
    }*/

    
}



