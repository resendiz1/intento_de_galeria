<nav class="navbar navbar-expand-lg navbar-dark primary-color fixed-top mb-5">
  <a class="navbar-brand" href="#">Galeria publica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link btn-danger" data-toggle="modal" data-target="#modalContactForm"><i class="fas fa-user-plus"></i><strong>Comparte tu galeria</strong></a>
      </li>

    </ul>
    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" id="search" type="text" placeholder="Busca galeria" aria-label="Search">
      </div>
    </form>
  </div>

</nav>

<div class="jumbotron mt-5 " style="background: #FE9A2E; color: white; display: all;">
          <button type="button" id="quit_instructions" class="close">
          <span>&times;</span>
        </button>
  <h2 class="display-6">Comparte tu galeria</h2>
  <p class="lead">Cuando compartas tu galeria<strong class="display-6">recibiras una clave</strong>, esta clave te servira  para <strong class="display-6"> borrar el la galeria que creaste.</strong>

  </p>
</div>


<div class="container-fluid mt-3 mb-4">
  <br>
  <?php 
$profes = new MvcControlador();
$profes -> deleteTeacheControlador();

if (isset($_GET["juimonos_a"])) {
  if ($_GET["juimonos_a"]=="borrado") {
   echo '
<div class="alert alert-success text-center  mt-5 "> <strong>ELIMINADO </strong></div>
   ';
  }
  if ($_GET["juimonos_a"]=="noBorrado") {
   echo '
<div class="alert alert-warning text-center  mt-5 "> <strong>NO SE BORRO, INTENTA DE NUEVO </strong></div>
   ';
  }

    if ($_GET["juimonos_a"]=="noClave") {
   echo '
<div class="alert alert-danger text-center  mt-5 "> <strong>¡¡OOPS Las clave no coincide, revisa y vuelve a intentar</strong></div>
   ';
  }
}
 ?>
<br>
  <div class="card-columns mt-5" id="resultado">



<?php 
$profes = new MvcControlador();
$profes -> getTeacherControlador();


 ?>

  </div>
</div>




<!-- MODALES -->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center btn blue-gradient">
        <h4 class="modal-title w-100 font-weight-bold">Crea una  nueva galeria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">         
          <input type="text" name="nombre" id="nombre" placeholder="Titulo" class="form-control validate" required>
        </div>

        <div class="md-form mb-5">     
          <input type="text"  name="carrera" id="carrera" placeholder="Tematica" class="form-control validate" required>
         
        </div>

        <div class="md-form mb-5 justify-content-center">
        
          <textarea  class="form-control" placeholder="Descripción de tu nueva galeria" name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>
        </div>
        <div class="row justify-content-center">
          <input type="file" class="form-control" id="uploadImage"  >
      <label class="text-center remove"  id="form29"> <i class="fas fa-upload"> </i> Arrastra tu imagen a este recuadro</label>
        <div class="md-form" id="recibeImagen">
              
        </div> 
        <div class="col-12" id="previa">
        
        </div>         
        </div>


      </div>




      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique remove" id="shareee">Compartir<i class="fas fa-paper-plane-o ml-1"></i></button>
        <button class="btn btn-unique remove2" id="share2">Compartiros<i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
      </div>
    </div>
  </div>
</div>










<!-- Side Modal Top Right -->


<!-- To change the direction of the modal animation change .right class -->
<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-top-left" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h4 class="modal-title w-100" id="myModalLabel">NECESITAMOS TU CLAVE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"><input type="text" class="form-control form-control-lg" require></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Borrar perfil</button>
      </div>
    </div>
  </div>
</div>
<!-- Side Modal Top Right -->


  <!-- Start your project here-->

