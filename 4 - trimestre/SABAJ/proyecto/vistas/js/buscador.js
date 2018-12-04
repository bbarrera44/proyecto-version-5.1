$("#jornada").change(function() {

	var jornada = $("#jornada").val();

	var datos = new FormData();
	datos.append("jornada",jornada);

	$.ajax({

		url:"ajax/ajaxJornada.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(resp){

			$('#trimestre').html(resp);
			
		}
	});

});