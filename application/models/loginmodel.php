<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function verifica($login = '', $senha = ''){
		
		if( !$login && !$senha ) {
		
			return false;
		
		} else {
			$this->db->where(array('login'=>$login, 'senha'=>md5($senha)));
			$res = $this->db->get('usuarios'); // coletando usuarios no banco
			
			if( $res->num_rows() == 1 ) {
			
				return true;
			
			} else {
			
				return false;
			
			}
			
		}
		
	}
	
	public function ehLogado(){
		if( $this->session->userdata('logado') !== true ) {
		
			redirect(site_url('login'));
		
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/model/login.php */