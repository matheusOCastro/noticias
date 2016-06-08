<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function listar_noticias_home(){
        //return $this->db->get('noticias')->result();
        return $this->db->select('*')
                        ->from('noticias n')
                        ->join('usuario a','usuario_idusuario = idusuario','left')
                        ->order_by('n.dt_publicacao', 'desc')
                        ->get()->result();
    }
    
    public function listar_titulos_home(){
        //return $this->db->get('noticias')->result();
        return $this->db->limit(5)->select('*')
                        ->from('noticias n')
                        ->join('usuario a','usuario_idusuario = idusuario','left')
                        ->order_by('n.dt_publicacao', 'desc')
                        ->get()->result();
    }
    
    public function listar_noticias_pesquisar(){
        $consNoticia = $this->input->post('pesquisar');
        if ($consNoticia == NULL){
            $consNoticia = '%';
        }
        return $this->db->select('*')
                        ->from('noticias n')
                        ->join('usuario a','usuario_idusuario = idusuario','left')
                        ->where('n.titulo like "%'.$consNoticia.'%"')
                        ->order_by('n.dt_publicacao', 'desc')
                        ->get()->result();
    }
    
    public function listar_noticias_assunto($assunto){
        //return $this->db->get('noticias')->result();
        return $this->db->select('*')
                        ->from('noticias n')
                        ->join('usuario a','usuario_idusuario = idusuario','left')
                        ->where('assunto_idassunto = '.$assunto)
                        ->order_by('n.dt_publicacao', 'desc')
                        ->get()->result();
    }
    
    public function listar_titulos_assunto($assunto){
        //return $this->db->get('noticias')->result();
        return $this->db->limit(5)->select('*')
                        ->from('noticias n')
                        ->join('usuario a','usuario_idusuario = idusuario','left')
                        ->where('assunto_idassunto = '.$assunto)    
                        ->order_by('n.dt_publicacao', 'desc')
                        ->get()->result();
    }
    
       
    
    public function listar_noticias(){
        $consTitulo = $this->input->post('constitulo');
        $consAutor = $this->input->post('consautor');
        $consAssunto = $this->input->post('consassunto');

        if ($consTitulo == NULL){
            $consTitulo = '%';
        }
            return  $this->db->select('*')
                            ->from('noticias n')
                            ->join('usuario a', 'n.usuario_idusuario = a.idusuario', 'left')
                            ->join('assunto s', 'n.assunto_idassunto = s.idassunto', 'left')
                            ->where('n.usuario_idusuario like "'.$consAutor.'"')
                            ->where('n.assunto_idassunto like "'.$consAssunto.'"')
                            ->where('n.titulo like "%'.$consTitulo.'%"')
                            ->where('n.ativo = 1')
                            ->order_by('n.dt_publicacao', 'desc')
                            ->get()->result();
    

    }
    
    public function inativarNoticia($idnoticia=NULL){
        if(isset($idnoticia) && !empty($idnoticia)){
            $data['ativo'] = '0';

            $gravou = $this->db->update('noticias', $data, array('idnoticias' => $idnoticia));
            
                if ($gravou == 1){
                    return TRUE;
                }else{
                    return FALSE;
                }
           
            return FALSE;
            
        }else{
            return FALSE;
        }
    }
    
    public function cadastrar_noticia(){
        $dataNoticia['titulo']       = $this->input->post('titulo');
        $dataNoticia['corpo']       = $this->input->post('noticia');
        $dataNoticia['assunto_idassunto']       = $this->input->post('assunto');
        $dataNoticia['usuario_idusuario']       = $this->input->post('autor');
        $dataNoticia['dt_publicacao']       = date ("Y-m-d");
        $dataNoticia['ativo'] = 1;
        
        $this->db->insert('noticias', $dataNoticia);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function localiza_noticia_edicao($idnoticia = NULL){
        // Monta a consulta SQL e retorna um objeto
        return $this->db->select('*')
                        ->from('noticias n')
                        ->where('n.idnoticias = "'.$idnoticia.'"')
                        ->get()->result();
    }
    
    public function gravar_edicao_noticia(){
            $noticiaId['idnoticia']       = $this->input->post('idnoticia');
            $noticia['titulo']  = $this->input->post('titulo');
            $noticia['corpo']  = $this->input->post('noticia');
            $noticia['usuario_idusuario']  = $this->input->post('autor');
            $noticia['assunto_idassunto']  = $this->input->post('assunto');
            
            $gravou = $this->db->update('noticias', $noticia, array('idnoticias' => $noticiaId['idnoticia']));
            
            if($gravou == 1){
               
                return TRUE;
                
            }else{
                return FALSE;
            }
    }
    
}