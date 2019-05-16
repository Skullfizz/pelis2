<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('moviesModel');
	}

	public function index()
	{
		$this->load->view('welcome_message',array('name'=>'Soy tester :D'));
	}

	public function key()
	{
		echo md5("peliculas");
	}

	public function rentar($id_pelicula, $id_usuario)
	{
		if(isset($_POST['rentar'])) {
			$this->moviesModel->insertrentas($id_pelicula, $id_usuario);
		}
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */