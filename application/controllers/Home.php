<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('noticia_model', 'NM');
    }

    public function index() {
        $noticias = $this->NM->listar_noticias_home();
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/home', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function politica() {
        $noticias = $this->NM->listar_noticias_assunto(1);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/politica', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function economia() {
        $noticias = $this->NM->listar_noticias_assunto(2);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/economia', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function educacao() {
        $noticias = $this->NM->listar_noticias_assunto(3);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/educacao', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function esportes() {
        $noticias = $this->NM->listar_noticias_assunto(4);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/esportes', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function mundo() {
        $noticias = $this->NM->listar_noticias_assunto(5);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/mundo', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function musica() {
        $noticias = $this->NM->listar_noticias_assunto(6);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/musica', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function tecnologia() {
        $noticias = $this->NM->listar_noticias_assunto(7);
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/tecnologia', $dados);
        $this->load->view('site/template/footer');
    }
    
    
    
    public function login(){
        $this->load->view('site/template/header');
        $this->load->view('site/login');
        $this->load->view('site/template/footer');
    }
    
    

    
}
