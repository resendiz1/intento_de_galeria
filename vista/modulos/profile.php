  <!-- Start your project here-->

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color fixed-top mb-5">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="index.php">Galeria publica</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link btn-danger" data-toggle="modal" data-target="#sideModalTR"><i class="fas fa-camera-retro"></i><strong> Agregar fotos o videos a la galeria</strong></a>
      </li>

    </ul>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->


<div class="container mt-5">
  <h1 class="text-center mt-4 mb-4 font-weight-bold  ">
    <br>
    <?php 
    $carrera = new MvcControlador(); 
    $carrera -> getCarreraControlador();
     ?></h1> 
  <div class="row  justify-content-center text-center">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body ">
      <?php 
      $card = new MvcControlador();
      $card -> getCardControlador();
      ?>
    </div>
      </div>
    </div>
  </div>
</div>



<div class="container mt-5">
  <h3 class="text-center mt-4 mb-2 font-weight-bold">GALLERY</h3><hr>
  <div class="row mb-5">
<div class="card-columns mb-5">
<?php 
$galeria = new MvcControlador();
$galeria -> getGaleriaControlador();
 ?>
</div>
  </div>
</div>




<!-- To change the direction of the modal animation change .right class -->
<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">
    <div class="modal-content">
      <div class="modal-header btn blue-gradient ">
        <h4 class="modal-title w-100 " id="myModalLabel">Sube tu imagen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center justify-content-center">

        <input type="hidden" id="idProfe" class="form-control" value="<?php  if (isset($_GET["perfil"])) { $id= $_GET["perfil"]; echo  $id;}?>">
        <input type="file" id="uploadImage2" class="form-control">


        <div id="recibeImagen2"></div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-success" id="shareImg">Compartir</button>
       <button type="button" class="btn btn-success" id="shareImg2">Compartir</button>
      </div>
    </div>
  </div>
</div>
<!-- Side Modal Top Right -->