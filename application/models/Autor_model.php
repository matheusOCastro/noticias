<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function listar_autor() {
        return $this->db->get('usuario')->result();
    }
    
    public function cons_autor(){
        $autorCons = $this->input->post('autorcons');

        if (isset($autorCons)){
            if($autorCons == NULL){
                $autorCons = '%';
            }
        }else{
            $autorCons = "xxxxx";
        }
            
            return  $this->db->select('*')
                            ->from('usuario u')
                            ->where('u.nomeautor like "%'.$autorCons.'%"')
                            ->where('u.autorativo = 1')
                            ->get()->result();
    }
    
    public function inativarAutor($idautor=NULL){
        if(isset($idautor) && !empty($idautor)){
            $data['autorativo'] = '0';

            $gravou = $this->db->update('usuario', $data, array('idusuario' => $idautor));
            
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
    
    public function cadastrar_autor(){
        $dataAutor['nomeautor']       = $this->input->post('nome');
        $dataAutor['login']       = $this->input->post('login');
        $dataAutor['senha']       = md5($this->input->post('senha'));
        $dataAutor['autorativo'] = 1;
        
        $this->db->insert('usuario', $dataAutor);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function localiza_autor_edicao($idusuario = NULL){
        // Monta a consulta SQL e retorna um objeto
        return $this->db->select('*')
                        ->from('usuario u')
                        ->where('u.idusuario = "'.$idusuario.'"')
                        ->get()->result();
    }
    
    public function gravar_edicao_autor(){
            $autorId['idusuario']       = $this->input->post('idusuario');
            $autor['nomeautor']  = $this->input->post('nome');
            $autor['login']  = $this->input->post('login');

            $gravou = $this->db->update('usuario', $autor, array('idusuario' => $autorId['idusuario']));
            
            if($gravou == 1){
               
                return TRUE;
                
            }else{
                return FALSE;
            }
    }
}