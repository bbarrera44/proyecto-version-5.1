<?php
session_start();
 
require_once '../models/ficha.php';
require_once '../models/usuario.php';
require_once '../models/novedad.php';
  

  $registro=Novedad::modificarNovedad($_SESSION['documento']);

  if ($raw=$registro->fetch(PDO::FETCH_ASSOC)){
  ?>
<br>
<form action="../controladores/ac_novedad.php" method="post">
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->
<div class="container">
  <div class="form_group">
    <br>
    <h1>Actualizar novedad</h1>
      <center>
        <img src="img/avatar.png" class="avatar" style="width: 200px;">
      </center>
      <?php if (isset($_COOKIE['act_nov'])): ?>
        <?php echo $_COOKIE['act_nov']; ?>
      <?php endif ?>
    <hr width="80%" color="#ffffff">
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <h3><p>Nombres</p></h3>
      <input type="text" name="primer_nombre" id="disabledInput" placeholder="Primer Nombre" value="<?php echo $raw['primer_nombre_aprendiz']." ".$raw['segundo_nombre_aprendiz']; ?>" class="input_reg" disabled>      
    </div>
  <div class="form-group col-md-6">
    <h3><p>Apellidos</p></h3>
      <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" value="<?php echo $raw['primer_apellido_aprendiz']." ".$raw['segundo_apellido_aprendiz']; ?>" class="input_reg" disabled>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <h3><p>Numero de Documento</p></h3>
      <input type="text" name="documento" value="<?php echo $raw['documento']; ?>" placeholder="Numero de documento" class="input_reg" disabled>
  </div>
  <div class="form-group col-md-6">
    <h3><p>Fecha Solicitud</p></h3>
      <input type="text" name="" placeholder="AAAAMMDD" onkeypress="return justNumbers(event);" class="input_reg" value="<?php echo date("d-M-Y");?>" disabled>
      <input type="hidden" name="fecha_novedad" placeholder="AAAAMMDD" value="<?php echo date("Ymd");?>" required>
  </div>
</div> 
<div class="form-row">  
  <div class="form-group col-md-12">
    <h3><p>Motivo Solicitud</p></h3>
       <input name="motivo" value="<?php echo $raw['motivo']; ?>" placeholder="Motivo" class="input_reg" required>
  </div>
</div>  
<div class="form-row">
  <div class="form-group col-md-12">
  <h3><p>Descripcion</p></h3>
        <textarea name="descripcion" placeholder="Descripcion" class="input_reg" required><?php echo $raw['descripcion']; ?></textarea>
  </div>
</div>
   </center>

    <input type="submit" value="Actualizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" />
  <br>
</div>
</form>
<br>
<br>
<br>
<?php } else{
//Aprendiz no Registrado
/*=========================================================================================================*/
?>
<br>
<br>
<br>
  <div class="container">
    <div class="form_group">
        <h1>Informacion del aprendiz</h1>
          <center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
        <hr width="80%" color="#FFFFFF" ><br /><br />
    <h2>El aprendiz no se encuentra registrado.<center><br />
</div>
        <input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" data-toggle="modal" data-target="#modalac_nov" data-whatever="@mdo"/>
    <input type="button" value="Finalizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='index.php'"/>
    <br>
  </div>
  <br>
  <br>
<br>
<?php
}?>