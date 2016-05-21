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
        $noticias = $this->NM->listar_noticias_politica();
        
        $dados = array(
                    'noticia' => $noticias
                );
        
        $this->load->view('site/template/header');
        $this->load->view('site/politica', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function login(){
        $this->load->view('site/template/header');
        $this->load->view('site/login');
        $this->load->view('site/template/footer');
    }
    
    

    
}
