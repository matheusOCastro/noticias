<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        // Carrega o model Pessoa
        $this->load->model('Grafico_model', 'GM');
    }

    public function index() {
        $grafico_pie = $this->GM->consGraficoSituacao();
        $grafico_column = $this->GM->consGraficoQualidade();

            $dados = array(
                    'pieGra' => $grafico_pie,
                    'columnGra' => $grafico_column
                );
            
        $this->load->view('site/template/header');
        $this->load->view('site/home', $dados);
        $this->load->view('site/template/footer');
    }
    
    public function mapaPocos() {
        
        $this->load->view('site/template/header');
        $this->load->view('site/mapapocos');
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
    
}
