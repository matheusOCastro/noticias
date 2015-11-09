<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    

    public function index() {
        
        $this->load->view('site/template/header');
        $this->load->view('site/home');
        $this->load->view('site/template/footer');
    }
    
    public function mapaPocos() {
        
        $this->load->view('site/template/header');
        $this->load->view('site/mapapocos');
        $this->load->view('site/template/footer');
    }
    
    public function graficoPocos() {
        
        $this->load->view('site/template/header');
        $this->load->view('site/graficopocos');
        $this->load->view('site/template/footer');
    }
    
    public function sobre(){
        $this->load->view('site/template/header');
        $this->load->view('site/sobre');
        $this->load->view('site/template/footer');
    }    
    
    
    public function login() {
    
        $this->load->view('site/template/header');
        $this->load->view('adm/login_form');
        $this->load->view('site/template/footer');   
    }
    /*
    
    
    public function cadastrar(){
        // Seta as regras para validação do formulário
        $this->form_validation->set_rules('nome', '<strong>Nome</strong>', 'required|trim');
        $this->form_validation->set_rules('sobrenome', '<strong>Sobrenome</strong>', 'required|trim');
        $this->form_validation->set_rules('email', '<strong>E-mail</strong>', 'required|valid_email|trim');
        if($this->form_validation->run() === FALSE){
            $this->index();
        }else{
            // Se é feito o cadastro no bd é retornado true
            if($this->PM->cadastrar() === TRUE){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Seu cadastro foi efetuado sem erros.</div>');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Seu cadastro não foi efetuado.</div>');
            }
            redirect('home','refresh');
        }
    }

    public function editar($id_pessoa = NULL){
        if((isset($id_pessoa) && !empty($id_pessoa)) && ($this->PM->listar_pessoa($id_pessoa) !== NULL)){
            // Busca as informação da pessoa pelo id passado no parametro da funcao
            $data['registro'] = $this->PM->listar_pessoa($id_pessoa);

            $this->load->view('template/header');
            $this->load->view('pessoa_editar', $data);
            $this->load->view('template/footer');
        }else{
            redirect('home','refresh');
        }
    }

    public function gravar_edicao(){
        $this->form_validation->set_rules('nome', '<strong>Nome</strong>', 'required|trim');
        $this->form_validation->set_rules('sobrenome', '<strong>Sobrenome</strong>', 'required|trim');
        $this->form_validation->set_rules('email', '<strong>E-mail</strong>', 'required|valid_email|trim');
        if($this->form_validation->run() === FALSE){
            $this->editar($this->input->post('id_pessoa'));
        }else{
            if($this->PM->gravar_edicao($this->input->post('id_pessoa')) === TRUE){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Cadastro editado sem erros.</div>');
            }else{
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível editar o cadastro.</div>');
            }
            redirect('pessoa','refresh');
        }
    }

    public function deletar($id_pessoal = NULL){
        if((isset($id_pessoal) && !empty($id_pessoal)) && ($this->PM->deletar($id_pessoal) === TRUE)){
            $this->session->set_flashdata('mensagem', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Sucesso!</strong> Cadastro deletado do banco de dados.</div>');
        }else{
            $this->session->set_flashdata('mensagem', '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong><span class="glyphicon glyphicon-ok"></span> Erro!</strong> Não foi possível deletar o cadastro.</div>');
        }
        redirect('pessoa','refresh');
    }
    */
    
}
