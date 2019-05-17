<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
global $second_array;
$second_array = array();
class login extends CI_Controller {

	public function __construct(){
		parent::__construct();
			//cargamos el modelo a usar
            $this->load->model('usuario_model');
            $this->load->model('moviesModel');
	} 
	public function index()
    {
        /*if(isset($_POST['logeate'])) {
            $usuario = $this->moviesModel->getUser($_POST['username'],md5($_POST['password']));
            if($usuario->Nombre == $_POST['username'] && $usuario->password == md5($_POST['password'])) {
            $data["movies"] = $this->moviesModel->getMovies();
            $data["rentas"] = $this->moviesModel->rentadasByUserID($usuario->id_usuario);
            $data["favoritos"] = $this->moviesModel->getFavoritos();
            $data['usuario'] = $usuario;
            $this->session->set_userdata('username',$_POST['username']);
            $this->load->view('welcome_message', $data);
            } else {
                redirect("http://localhost/Examem");
            }
        } else {
            $this->load->view('login');
        }*/

        if( $this->session->userdata('username')){
            $data["movies"] = $this->moviesModel->getMovies();
            $data["favoritos"]=$this->moviesModel->getFavoritos();
            $userdata=$this->usuario_model->login($_POST['username'],md5($_POST['password']));
            $idUsuario = $userdata[0]->id_usuario;
            $data["rentas"]=$this->moviesModel->rentadasByUserID($idUsuario);
            $this->load->view('welcome_message',$data);
        }else{
            if(isset($_POST['logeate'])){
                $userdata=$this->usuario_model->login($_POST['username'],md5($_POST['password']));
                if($userdata){
                    $idUsuario = $userdata[0]->id_usuario;
                    $data["movies"] = $this->moviesModel->getMovies();
                    $data["rentas"] = $this->moviesModel->rentadasByUserID($idUsuario);
                    $data["favoritos"] = $this->moviesModel->getFavoritos();
                    $data['usuario'] = $userdata;
                    $this->session->set_userdata('username',$_POST['username']);
                    $this->load->view('welcome_message', $data);
                }else{
                    redirect("http://localhost/Examem");
                }       
            }else{
                $this->load->view('login');
            }
        }
    }

    public function insertRenta($idusuario)
    {
        //Hacemos la insersión en la tabla de la película a rentar
        $this->moviesModel->insertrentas($this->input->post('idpeli'),$idusuario);
        /*$rentas = $this->moviesModel->rentadasByUserID($idusuario);
        foreach($rentas as $renta) {
            var_dump($renta);
            if($renta != null) {
                if($renta->id_pelicula == $this->input->post('idpeli')) {
                    //La película ya está rentada
                } else {
                    $this->moviesModel->insertrentas($this->input->post('idpeli'),$idusuario);
                    break;
                }
            } else {
                $this->moviesModel->insertrentas($this->input->post('idpeli'),$idusuario);
                break;
            }
            break;
        }*/
        //$this->moviesModel->insertrentas($_POST['idpelicula'],$idusuario);
        //$this->load->view('welcome_message');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("http://localhost/Examem");

    }

    public function renta()
    {
        $renta["peliculas"]=$this->moviesModel->renta();
        $this->load->view('rentas',$renta);
    }

    public function agregar_fav($id_usuario)
    {
        $id_peli = $this->input->post('idpeli');
        $nombre_peli = $this->input->post('nompeli');
        $id_categoria = $this->input->post('idcateg');
        $director=$this->input ->post('director');
        $Protagonista=$this->input ->post('protagonista');
        $url=$this->input ->post('url');
        $resumen=$this->input ->post('resumen');

        //Obtener todas las peliculas favoritas de la bd
        $favoritos = $this->moviesModel->getFavoritos();

        $this->moviesModel->insertarFavorito($id_peli,$nombre_peli,$id_categoria,$director,
            $Protagonista,$resumen,$url);
        //Hacer la insersión de la tupla a la tabla favoritos
        /*foreach($favoritos as $favorito) {
            if($favorito != null) {
                if($favorito->id_peli == $this->input->post('idpeli')) {
                    //La película ya está rentada
                } else {
                    $this->moviesModel->insertarFavorito($id_peli,$nombre_peli,$id_categoria,$director,
            $Protagonista,$resumen,$url);
                    break;
                }
            } else {
                $this->moviesModel->insertarFavorito($id_peli,$nombre_peli,$id_categoria,$director,
            $Protagonista,$resumen,$url);
            }
            break;
        }*/
    }

    public function eliminar_renta($idusuario)
    {
        $id_peli = $this->input->post('idpeli');
        $id_usuario = $idusuario;

        $this->moviesModel->delete_renta($id_usuario,$id_peli);
    }

    public function eliminar_fav()
    { 
        $id_peli = $this->input->post('idpeli');

        $this->moviesModel->delete_fav($id_peli);
    }
}