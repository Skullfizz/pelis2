<?php $this->load->view('header');?>

<style>
    .prueba{
        background-color: #0F0;
        width: 20px;
        height: 20px;
    }

    .pruebae{
        background-color: #F00;
        width: 20px;
        height: 20px;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    $(".btnRentar").on("click",function(e){
        var $this = $(this);
        var $span = $(this).children('span');
        var idpeli = $this.data("idpeli");
        var nompeli = $this.data("nompeli");
        $.ajax({
                type:'POST',
                url:"login/insertRenta/<?=$usuario[0]->id_usuario;?>",
                data:{
                    "idpeli":idpeli,
                    "nompeli":nompeli
                },
            complete:function(){
                
            },
            success:function(data){
                //alert('Ya está rentada');
                $("#span_1").addClass("prueba");
            },
            error:function(jqxhr){
                $("#span_1").addClass("pruebae");
            },
            }
            );
    })
});

$(document).ready(function(){
    $(".btnFavorito").on("click",function(e){
        var $this = $(this);
        var idpeli = $this.data("idpeli");
        var nompeli = $this.data("nompeli");
        var idcateg = $this.data("idcateg");
        var director = $this.data("director");
        var protagonista = $this.data("protagonista");
        var resumen = $this.data("resumen");
        var url = $this.data("url");
        $.ajax({
            type:'POST',
            url:"login/agregar_fav/<?=$usuario[0]->id_usuario;?>",
                data:{
                    "idpeli":idpeli,
                    "nompeli":nompeli,
                    "idcateg":idcateg,
                    "director":director,
                    "protagonista":protagonista,
                    "resumen":resumen,
                    "url":url
                },
            complete:function(){
            },
            success:function(data){
                //alert('Ya se encuentra en Favoritos');
            },
            error:function(jqxhr){
                
            },
            }
            );
    })
});

$(document).ready(function(){
    $(".Eliminar").on("click",function(e){
        var $this = $(this);
        var idpeli = $this.data("idpeli");
        $.ajax({
            type:'POST',
            url:"login/eliminar_renta/<?=$usuario[0]->id_usuario;?>",
                data:{
                    "idpeli":idpeli,
                },
            complete:function(){
            },
            success:function(data){
                //alert('Ya se encuentra en Favoritos');
                location.reload();
            },
            error:function(jqxhr){
                
            },
            }
            );
    })
});

$(document).ready(function(){
    $(".eliminarFav").on("click",function(e){
        var $this = $(this);
        var idpeli = $this.data("idpeli");
        $.ajax({
            type:'POST',
            url:"login/eliminar_fav/",
                data:{
                    "idpeli":idpeli,
                },
            complete:function(){
            },
            success:function(data){
                //alert('Ya se encuentra en Favoritos');
                location.reload();
            },
            error:function(jqxhr){
                
            },
            }
            );
    })
});
</script>
<br>
<br>
<br>

<div class="row">
    <div class="col-md-12 text-center">
        <h1>Bienvenidos a...</h1>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>categorias</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">Accion</a>
                    <a href="#" class="list-group-item list-group-item-action">Comedia</a>
                    <a href="#" class="list-group-item list-group-item-action">Animacion</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Favoritos</h5>
            </div>
            <?php foreach ($favoritos as $i => $favorito): ?>
            <div class="card-body d-flex align-items-center">
                <img src="<?php echo base_url(); ?><?= $favorito->url ?>" class="img-fluid"
                    style="max-width: 100%; height: auto;" alt="<?= $favorito->Nombre ?>">
                <!--<input type="image" class="eliminarFav" data-idpeli="<?= $favorito->id_peli?>" src="<?= base_url();?>/static/img/icons/png/icons8-eliminar-26.png" width="100" height="30">-->
            </div>

            <?php endforeach ?>



        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Peliculas</h5>
            </div>
            <div class="card-body">
                <?php foreach ($movies as $i => $movie): ?>
                <div class="card">
                    <div class="card-header">
                        <p><?= $movie->Nombre ?> <span class="badge badge-primary badge-pill"><?= $movie->name ?></span><br><span  class="badge badge-primary badge-pill"> Director <?= $movie->director ?></span>
                        </p>
                        <input type="text" id="nompeli" name="nompeli" nompeli="<?=$movie->Nombre;?>" style="display:none"; />
                        <input type="text" id="idpelicula" name="idpelicula" idpeli="<?=$movie->id_peli;?>" style="display:none"; />
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <div class="col-md-6">
                            <img src="<?php echo base_url(); ?><?=$movie->url ?>" class="img-fluid"
                                style="max-width: 100%; height: auto;" alt="<?= $movie->Nombre ?>">
                        </div>
                        <div class="col-md-6">
                            <h6>Resumen</h6>
                            <p align="justify" name="sinopsis"><?= $movie->resumen ?></p>
                            <input type="text" id="sinopsis" name="sinopsis" resumen="<?=$movie->resumen;?>" style="display:none"; /><br>
                            <h6>Protagonista</h6>
                            <p align="justify" name="protagonista"><?=$movie->Protagonista ?></p>
                            <input type="text" id="protagonista" name="protagonista" actor="<?=$movie->Protagonista;?>" style="display:none"; /><br>
                            <input type="button" class="btnRentar btn btn-primary" name="Rentar" data-idpeli="<?=$movie->id_peli;?>" data-nompeli="<?=$movie->Nombre;?>" value="Rentar" />
                            <input type="button" class="btnFavorito btn btn-primary" name="agregar_fav" data-idpeli="<?=$movie->id_peli;?>" data-nompeli="<?=$movie->Nombre;?>" data-idcateg="<?=$movie->id_categoria?>" data-director="<?=$movie->director?>" data-protagonista="<?=$movie->Protagonista?>" data-resumen="<?=$movie->resumen?>" data-url="<?=$movie->url?>" value="Agregar Fav." />
                            <span id="span_<?=$movie->id_peli;?>" name="<?=$movie->id_peli?>">Bien</span>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <h5>Rentadas</h5>
                </div>
                <?php foreach ($rentas as $i => $renta): ?>
                <div class="card-body d-flex align-items-center">
                    <p><?=$renta->Nombre;?></p>
                    <img src="<?= base_url();?><?=$renta->url?>" class="img-fluid"
                        style="max-width: 50%; height: auto;">
                   <!-- <input type="image" data-idpeli="<?=$renta->id_pelicula;?>" data-idusuario="<?=$usuario[0]->id_usuario;?>" class="Eliminar" src="<?= base_url();?>/static/img/icons/png/icons8-eliminar-26.png" width="100" height="30">-->
                </div>
                <input type="button" data-idpeli="<?=$renta->id_pelicula;?>" data-idusuario="<?=$usuario[0]->id_usuario;?>" class="Eliminar" value="Borrar">
                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
<?php $this->load->view('footer');?>