function select_fil(dam) {

	var datos = new FormData();
	datos.append("dam",dam);
	
	$.ajax({

		url:"ajax/ajaxfiltro.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(resp){
			
			
			$('#fil2').html(resp);
			$('#vari').hide();

		}
	});
}

function select_fil2(dami) {

	var dal = document.getElementById('filtro').value;
	var datos = new FormData();

	datos.append("filtro2",dami);	
	datos.append("filtro1",dal);
	
	$.ajax({

		url:"ajax/ajaxfiltro2.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(drop){
			
			$('#var').html(drop);
			$('#vari').hide();

		}
	});
}