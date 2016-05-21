<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function listar_autor() {
        return $this->db->get('usuario')->result();
    }


}