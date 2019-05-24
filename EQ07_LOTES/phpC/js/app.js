	function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'clientes_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

		$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var nombre = button.data('nombre') // Extraer la información de atributos de datos
		  var paterno = button.data('paterno') // Extraer la información de atributos de datos
		  var materno = button.data('materno') // Extraer la información de atributos de datos
		  var ciudad = button.data('ciudad') // Extraer la información de atributos de datos
		  var colonia = button.data('colonia') // Extraer la información de atributos de datos
		  var calle = button.data('calle') // Extraer la información de atributos de datos
		  var numero = button.data('numero') // Extraer la información de atributos de datos
		  var telcasa = button.data('telcasa') // Extraer la información de atributos de datos
		  var celular = button.data('celular') // Extraer la información de atributos de datos
		  var fnacimiento = button.data('fnacimiento') // Extraer la información de atributos de datos
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar cliente: '+ nombre   +   paterno   +   materno )
		  modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #paterno').val(paterno)
		  modal.find('.modal-body #materno').val(materno)
		  modal.find('.modal-body #ciudad').val(ciudad)
		  modal.find('.modal-body #colonia').val(colonia)
		  modal.find('.modal-body #calle').val(calle)
		  modal.find('.modal-body #numero').val(numero)
		  modal.find('.modal-body #celular').val(celular)
		  modal.find('.modal-body #telcasa').val(telcasa)
		  modal.find('.modal-body #fnacimiento').val(fnacimiento)

		  $('.alert').hide();//Oculto alert
		})
		
		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#id_cliente').val(id)
		})

		$( "#guardarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "agregar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
		
		$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "eliminar.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});
