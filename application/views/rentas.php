<?php $this->load->view('header');?>


<br>
<br>
<br>

    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Renta de peliculas</h1>
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
                    <?php foreach ($movies as $i => $movie): ?>
                    <div class="card">
                        <div class="card-header">
                            <p name="nombre"><?= $movie->Nombre ?> <span
                                    class="badge badge-primary badge-pill"><?= $movie->name ?></span></p>
                        </div>
                        <div class="card-body d-flex align-items-center">
                            <div class="col-md-6">
                                <img src="<?php echo base_url(); ?><?= $movie->url ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt="<?= $movie->Nombre ?>">
                            </div>
							<div class="col-md-6">
								<h6>Resumen</h6>
								<p align="justify" name="sinopsis"><?= $movie->resumen ?></p><br>
								<h6>Director</h6>
								<p align="justify" name="director"><?= $movie->director ?></p><br>
								<h6>Protagonista</h6>
								<p align="justify" name="protagonista"><?= $movie->Protagonista ?></p><br>
								<button type="submit" class="btn btn-primary" name="rentar">Rentar</button>
							</div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
	</div>
	<?php $this->load->view('footer');?>