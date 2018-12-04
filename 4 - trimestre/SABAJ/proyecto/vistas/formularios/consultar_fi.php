<?php require "../includes/paginacion.php"; ?>
<!--Container-->
<!--================================================================================================-->
<div class="form-area">
<center>
<table class='table_responsive'>
<tr>
	<td align='center'><h2 style="color: #ffffff;"><b>Programa</h2></td>
	<td align='center'><h2 style="color: #ffffff;"><b>| N° Ficha</h2></td>
</tr>

<?php foreach ($paginacion as $row ): ?>
	<tr>
		<td align="center"><h3 style="color: #ffffff;"><?php echo $row['n_programa'];?></h3></td>
		<td align="center"><h3 style="color: #ffffff;"><?php echo $row['ficha'];?></h3></td>
	</tr>
<?php endforeach ?>
<?php 
 echo "</table>";
?>
<!--Table-->
<!--================================================================================================-->
<table align="center">
<tr>
	<td>
		<ul class="pagination">

<?php if ($pagina == 1): ?>
	<li class="page-item disabled"><span class="page-link">&laquo;</span></li>
<?php else: ?>
	<li class="page-item"><a class="page-link" href="?aprendices=consultar_fi&pagina=<?php echo $pagina-1 ?>">&laquo;</a></li>
<?php endif; ?>
<?php
	for ($i=1; $i <= $numero_paginas; $i++) { 
		if ($pagina == $i) {
			echo "<li class=\"page-item active\"><a href=\"?aprendices=consultar_fi&pagina=$i\"><span class=\"page-link\">".$i."</span></a></li>";
		}else{
			echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?aprendices=consultar_fi&pagina=$i\">".$i."</a></li>";
		}
	}
?>
<?php if ($pagina >= $numero_paginas): ?>
	<li class="page-item disabled"><span class="page-link">&raquo;</span></li>
<?php else: ?>
	<li class="page-item"><a class="page-link" href="?aprendices=consultar_fi&pagina=<?php echo $pagina+1 ?>">&raquo;</a></li>
<?php endif; ?>

</ul>			
	</td>
</tr>
</table>
</div>
