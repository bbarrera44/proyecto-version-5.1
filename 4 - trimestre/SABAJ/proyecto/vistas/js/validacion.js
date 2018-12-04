/*Validacion nombre de usuario*/
$("#n_usuario").keyup(function() {

	var nombreUs = $("#n_usuario").val();

	var datos = new FormData();
	datos.append("valUs",nombreUs);

	$.ajax({

		url:"ajax/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(resp){

			if (resp == 0) {

				$("label[for='n_usuario'] span").html("<p style='color: #DC3545'>El nombre de usuario esta en uso<p>");
				$("input[id='n_usuario'] ").attr("style","border-color: #DC3545");

			}else{

				$("label[for='n_usuario'] span").html("");
				$("input[id='n_usuario'] ").attr("style","border-color:#28a745");

			}
		}
	});

});

/*Validacion numero de documento*/

$("#n_documento").keyup(function() {

	var documento = $("#n_documento").val();

	var datos = new FormData();
	datos.append("documento",documento);

	$.ajax({

		url:"ajax/ajaxdocumento.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(resp){

			console.log(resp);

			if (resp == 0) {

				$("label[for='n_documento'] span").html("<p style='color: #DC3545'>El numero de documento ya se encuentra registrado<p>");
				$("input[id='n_documento'] ").attr("style","border-color: #DC3545");

			}else{

				$("label[for='n_documento'] span").html("");
				$("input[id='n_documento'] ").attr("style","border-color:#28a745");

			}
		}
	});

});

/*Contraseña*/

$(document).ready(function () {

	var cargo = $("[name=cargo]");
	var primer_nombre = $("[name=primer_nombre]");
	var segundo_nombre = $("[name=segundo_nombre]");	
	var primer_apellido = $("[name=primer_apellido]");
	var segundo_apellido = $("[name=segundo_apellido]");	
	var tipo_documento = $("[name=tipo_documento]");
	var documento = $("[name=n_documento]");
	var con1 = $("[name=con1]");
	var con2 = $("[name=con2]");	
	var correo1 = $("[name=correo]");
	var correo2 = $("[name=cocorreo]");
	var direccion = $("[name=direccion]");
	var genero = $("[name=genero]");
	var telefono = $("[name=telefono]");
	var celular = $("[name=celular]");


function coincidePassword(){
	var val1 = con1.val();
	var val2 = con2.val();


	if(val1 != val2){
		
		$("label[for='con2'] span").html("<p style='color: #DC3545'>Las contraseñas no coinciden.<p>");
		$("input[id='con2'] ").attr("style","border-color: #DC3545");
	}
	if(val1==val2){

		$("label[for='con2'] span").html("");
		$("input[id='con2'] ").attr("style","border-color:#28a745");
		}
	}

/*Correo*/

function coincideCorreo(){
	var co1 = correo1.val();
	var co2 = correo2.val();

	if(co1 != co2){
		
		$("label[for='cocorreo'] span").html("<p style='color: #DC3545'>Los correos no coinciden.<p>");
		$("input[id='cocorreo'] ").attr("style","border-color: #DC3545");
	}
	if(co1==co2){

		$("label[for='cocorreo'] span").html("");
		$("input[id='cocorreo'] ").attr("style","border-color:#28a745");
		}
	}

/*Resto de cosas*/

function nombres() {

	var p1 = primer_nombre.val();
	var p2 = segundo_nombre.val();
	var a1 = primer_apellido.val();
	var a2 = segundo_apellido.val();
	var car = cargo.val();
	var tip = tipo_documento.val();
	var doc = documento.val();
	var con = con1.val();
	var dic = direccion.val();
	var gen = genero.val();
	var cor = correo1.val();
	var tel = telefono.val();
	var cel = celular.val();

	if (p1.length != 0) {	$("input[id='primer_nombre'] ").attr("style","border-color:#28a745");	}

	if (p2.length != 0) {	$("input[id='segundo_nombre'] ").attr("style","border-color:#28a745");	}

	if (a1.length != 0) {	$("input[id='primer_apellido'] ").attr("style","border-color:#28a745");	}

	if (a2.length != 0) {	$("input[id='segundo_apellido'] ").attr("style","border-color:#28a745");	}

	if (car.length != 0) {	$("select[id='cargo'] ").attr("style","border-color:#28a745");	}

	if (tip.length != 0) {	$("select[id='tipo_documento'] ").attr("style","border-color:#28a745");	}

	if (doc.length != 0) {	$("input[id='n_documento'] ").attr("style","border-color:#28a745");	}

	if (con.length != 0) {	$("input[id='con1'] ").attr("style","border-color:#28a745");	}

	if (dic.length != 0) {	$("input[id='direccion'] ").attr("style","border-color:#28a745");	}

	if (gen.length != 0) {	$("select[id='genero'] ").attr("style","border-color:#28a745");	}

	if (tel.length != 0) {	$("input[id='telefono'] ").attr("style","border-color:#28a745");	}

	if (cor.length != 0) {	$("input[id='correo'] ").attr("style","border-color:#28a745");	}

	if (cel.length != 0) {	$("input[id='celular'] ").attr("style","border-color:#28a745");	}
	
}
	primer_nombre.keyup(function(){	nombres();	});

	segundo_nombre.keyup(function(){	nombres();	});

	primer_apellido.keyup(function(){	nombres();	});

	segundo_apellido.keyup(function(){	nombres();	}); 

	documento.keyup(function(){	nombres();	});

	con1.keyup(function(){	nombres();	});

	cargo.change(function(){	nombres();	});

	tipo_documento.change(function(){	nombres();	});

	con2.keyup(function(){	coincidePassword();	});

	correo2.keyup(function(){	coincideCorreo();	});

	genero.change(function(){	nombres();	});

	direccion.keyup(function(){	nombres();	});

	correo1.keyup(function(){	nombres();	});

	telefono.keyup(function(){	nombres();	});

	celular.keyup(function(){	nombres();	});

});

