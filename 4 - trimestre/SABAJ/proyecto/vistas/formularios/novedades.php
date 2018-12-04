<?php  
session_start();
  require_once '../models/usuario.php';
  require_once '../models/ficha.php';
  require_once '../models/novedad.php';
  require_once '../models/aprendiz.php';
?>
<br>
<!--Scripts-->
<!--============================================================================================================================-->
<script type="text/javascript">

  function mostrar(id) {

    if (id==3) { 
      $('#cla').removeClass('form-group col-md-12'); 
      $('#cla').addClass('form-group col-md-6');
      $("#mo").show(800);

    }
    if (id!=3) {
      $('#cla').addClass('form-group col-md-12');
      $('#cla').removeClass('form-group col-md-6'); 
      $("#mo").hide(800);

    }
  }
</script>
<?php  
  $con=Aprendiz::consultarAprendiz($_SESSION['documento']);

if ($raw=$con->fetch(PDO::FETCH_ASSOC)) {
?>
<!--Container-->
<!--============================================================================================================================-->
<div class="container">
<form action="../controladores/reg_novedad.php" method="post">
  <h2 >
    <center><b>Novedades</b></center>
    </h2>
      <div class="form-group" >
    <center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
  </div>
      <br />
  <center><h4 class="fin">Por favor llene las casillas con los datos del aprendiz para realizar la novedad.</h4></center>
  <?php if (isset($_COOKIE['nov'])): ?>
            <div class="alert alert-info" role="alert">
              <?php echo $_COOKIE['nov']; ?>
          </div>
          <?php else: ?>
            <br />
        <?php endif; ?>      
  <div class="form-row">
  <div  class="form-group col-md-3" style="margin-bottom:-10px;">
    <select name="tipo_novedad" class="select_reg" onchange="mostrar(this.value)" required>
      <option value="" selected disabled>Tipo de Novedad</option>
         <?php  
           $tipo=Novedad::tipoNovedad();
           $tah=Novedad::consultarNovedad($_SESSION['documento']);

            while ($row=$tipo->fetch(PDO::FETCH_ASSOC)) {

                echo "<option value='$row[id_tipo_novedad]'>$row[novedad]</option>";    
                    
            }
         ?>
    </select>
  </div>
</div>
      <hr color="#999999">
    <br />
<div class="form-row">
  <div id="cla" class="form-group col-md-6">
  <h3><p>Ficha de Caracterizacion</p></h3>
    <select name="ficha" class="select_reg" required>
      <option value="" selected disabled>Ficha</option>
         <?php  
           $tipo=Ficha::verFicha();

            while ($row=$tipo->fetch(PDO::FETCH_ASSOC)) {
                if ($raw['numero_ficha']==$row['numero_ficha']) {
                  echo "<option value='$row[id_ficha]' selected>$row[numero_ficha] - $row[nombre_programa]</option>";
                } elseif ($raw['numero_ficha']!=$row['numero_ficha']) {
                echo "<option value='$row[id_ficha]' disabled>$row[numero_ficha] - $row[nombre_programa]</option>";
              }
            }
         ?>
    </select>
  </div>
  <div id="mo" class="form-group col-md-6">
<h3><p>Ficha ingresar</p></h3>
    <select name="ficha_anterior" class="select_reg">
      <option value="1" selected disabled>Ficha Anterior</option>
         <?php  
           $tipo=Ficha::verFicha();

            while ($row=$tipo->fetch(PDO::FETCH_ASSOC)) {
                if ($raw['numero_ficha']==$row['numero_ficha']) {
                  echo "<option value='$row[id_ficha]' disabled>$row[numero_ficha] - $row[nombre_programa]</option>";
                } elseif ($raw['numero_ficha']!=$row['numero_ficha']) {
                echo "<option value='$row[id_ficha]' >$row[numero_ficha] - $row[nombre_programa]</option>";
              }
            }
         ?>
    </select>
  </div>
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
       <input name="motivo" placeholder="Motivo" class="input_reg" required>
  </div>
</div>  
<div class="form-row">
  <div class="form-group col-md-12">
  <h3><p>Descripcion</p></h3>
        <textarea name="descripcion" placeholder="Descripcion" class="input_reg" required></textarea>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-4">
    <input type="reset" value="Atras" class="btn btn-primary btn-lg btn-block" formaction="javascript:window.history.back();">
      </div>
        <div class="form-group col-md-4">
          <input type="reset" value="Limpiar" class="btn btn-primary btn-lg btn-block" onclick="location.reload()">
        </div>
      <div class="form-group col-md-4">
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Finalizar">
  </div>
</div>   
  <br>
</form>
</div>
<br>
<br>
<br>  
<?php }else{

?>
  <div class="container">
    <div class="form_group">
        <h1>Informacion del aprendiz</h1>
          <center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
        <hr width="80%" color="#FFFFFF" ><br /><br />
    <h2>El aprendiz no se encuentra registrado en la base de datos<center><br />
</div>
       <input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" data-toggle="modal" data-target="#modalre" data-whatever="@mdo"/>
    <input type="button" value="Finalizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='index.php'"/>
  <br>
  </div>
  <br>
  <br>
<br>
<?php
}

?>