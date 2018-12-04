<br>
<!--Scripts-->
<!--=============================================================================================================-->
<script src="js/ajaxsi.js" type="text/javascript"></script>
<!--Container-->
<!--=============================================================================================================-->
<div class="container">
	<div class="form-group">
		<h1 class="formulario__titulo" style="color:#FFF;"><b>Aprendices<?php if (isset($aprendices)) echo $aprendices; ?></b><br/></h1>
		<center>
			<h4 class="fin">Aqui podra ver todos los aprendices que se encuentran registrados en nuestro sistema</h4>
		</center>
	</div>
	<hr color="#999999">
<div class="form-row">
<!--Filtrador-->
	<div class="form-group col-md-4">
		<select id="filtro" name="filtro" class="select_reg" onchange="select_fil(this.value)">
			<option value="0">Filtrar Por:</option>
			<option value="programa_formacion">Programa Formacion</option>
			<option value="ficha">Ficha</option>
			<option value="trimestre">Trimestre</option>
			<option value="etapa">Etapa</option>
		</select>
	</div>
<!--Filtrador 2-->
	<div class="form-group col-md-4" id="fil2">
		
	</div>
</div>
<!--Tabla de contenido-->
	<div class="form-group">
		<center>
		<table class="table">
			<thead class="thead-dark">
				<th>ID</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Ficha</th>
				<th>Programa</th>
				<th>Trimestre</th>
				<th>Etapa</th>
			</thead>
			<tbody id="var">
				<?php include_once '../controladores/ap_con_form.php'; ?>				
			</tbody>
		</table>
	<div id="vari">
		<table>
			<tr>
				<td>
					<?php $paginacion_ap->render(); ?>
				</td>
			</tr>
		</table>
	</div>
	</div>
	<br>
</div>
<br>
<br>
<br>