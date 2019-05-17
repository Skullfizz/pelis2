<?php $this->load->view('header');?>

<script type="text/javascript">
$(document).ready(function(){
    $(".Registrar").on("click",function(e){
        var $this = $(this);
        var user = $this.data("usuario");
        var pass = $this.data("contra");
        var flag = $this.data('flag');
        $.ajax({
                type:'POST',
                url:"agregarusu",
                data:{
                    "usuario":user,
                    "contra":pass
                },
            complete:function(){
                
            },
            success:function(data){
                alert('usuario registrado');
                location.reload();
                //$("#span_1").addClass("prueba");
            },
            error:function(jqxhr){
                alert('usuario no registrado');
               // $("#span_1").addClass("pruebae");
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
            <h1>Registro de Usuarios</h1>
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
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5>Peliculas</h5>
                </div>
                <div class="card-body">
                <label>Usuario</label><br>   
                <input type="text" id="usuario" data-username="moy"/><br>
                <label >Contraseña</label><br>
                <input type="password" id="contra" data-password="123" dataflag="1"/><br><br>
                <input type="button"class="Registrar" value="Agregar usuario"/>
                </div>
            </div>

        </div>
	</div>
	<?php $this->load->view('footer');?>