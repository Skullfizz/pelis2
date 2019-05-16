<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{
    public $variable;
	public function __construct(){
		parent::__construct();
    }
    

    
    public function login ($username, $password){
    
        $this->db->where('Nombre',$username);
        $this->db->where('password',$password);
        $q =$this->db->get('usuario');
        if($q->num_rows()>0){
            return $this->db->select('*')
            ->from('usuario')
            ->where('Nombre',$username)
            ->where('password',$password)
            ->get('')
            ->result();
        }else{
            return false;
        }
    }
}