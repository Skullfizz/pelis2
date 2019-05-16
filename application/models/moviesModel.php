<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
global $date;
$date=date("d-m-Y");

class moviesModel extends CI_Model {

    public function getUser($username,$password)
    {
        return $this->db->select('u.*')
                        ->from('usuario AS u')
                        ->where('u.nombre',$username)
                        ->where('u.password',$password)
                        ->get('')
                        ->row();
    }

    public function getMovies()
    {
        return $this->db->select('p.id_peli, p.Nombre, c.name, p.director, p.Protagonista, p.url,p.resumen, p.id_categoria')
                        ->from('pelis AS p')
                        ->join('categoria AS c','p.id_categoria = c.category_id')
                        ->get('')
                        ->result();
    }

    public function getFavoritos()
    {
        return $this->db->select('f.*')
                        ->from('favoritos AS f')
                        ->get('')
                        ->result();
    }

    //Funcion la cual hace la insersión de la renta de películas en la tabla renta
    public function insertrentas($idPelicula, $idUsuario)
    {
        $this->db->set('id_pelicula',$idPelicula)
                 ->set('id_usuario',$idUsuario)
                 ->set('fecha_salida','CURDATE()', FALSE)
                 ->set('fecha_regreso','CURDATE()', FALSE)
                 ->insert('renta');     
    }
    public function favoritas()
    {
        
        return $this->db
                        ->distinct()
                        ->select  ('p.Nombre, c.name, p.director, p.Protagonista, p.url,p.resumen')
                        ->from('pelis AS p')
                        ->join('categoria AS c','p.id_categoria = c.category_id')
                        ->join('renta AS r','p.id_peli = r.id_pelicula')
                        ->join('usuario AS u','r.id_usuario = u.id_usuario')
                       ->get('')
                        ->result();
    }
    public function renta($usuario)
    {
        
        return $this->db
                        ->select  ('p.Nombre, c.name, p.director, p.Protagonista, p.url,p.resumen')
                        ->from('pelis AS p')
                        ->join('categoria AS c','p.id_categoria = c.category_id')
                        ->join('renta AS r','p.id_peli = r.id_pelicula')
                        ->join('usuario AS u','r.id_usuario = u.id_usuario')
                        ->where('fecha_regreso>CURDATE() and r.id_usuario =',$usuario  )

                        ->get('')
                        ->result();
    }
    public function usuario($Unombre)
    {
        
        return $this->db
                        ->distinct()
                        ->select  ('u.id_usuario')
                        ->from('renta AS r')
                        ->join('usuario AS u','r.id_usuario = u.id_usuario')
                        ->where('u.nombre=',$Unombre)
                        ->get('')
                        ->result();
    }

    public function rentadasByUserID($idUsuario)
    {
        return $this->db->select('r.id_pelicula, id_usuario, p.Nombre, p.url')
                        ->from('renta AS r')
                        ->join('pelis AS p','p.id_peli=r.id_pelicula')
                        ->where('id_usuario',$idUsuario)
                        ->get('')
                        ->result();
    }

    public function insertarFavorito($id_pelicula,$nombre,$id_categoria,$director,$protagonista,$resumen,$url)
    {
        //set('id_favoritos',2)
        $this->db->set('id_peli',$id_pelicula)
                 ->set('Nombre',$nombre)
                 ->set('id_categoria',$id_categoria)
                 ->set('director',$director)
                 ->set('Protagonista',$protagonista)
                 ->set('resumen',$resumen)
                 ->set('url',$url)
                 ->insert('favoritos');
    }

    public function delete_renta($idusuario, $idpelicula)
    {
        $this->db->where('id_pelicula',$idpelicula)
                 ->where('id_usuario',$idusuario)
                 ->delete('renta');
    }

    public function delete_fav($idPelicula)
    {
        $this->db->where('id_peli',$idPelicula)
                 ->delete('favoritos');
    }
}

/* End of file moviesModel.php */
