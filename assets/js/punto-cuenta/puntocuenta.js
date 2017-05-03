            function atras(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Presentacion/atras", 
						 data: {inicio: $("#inicio").val(), hcentro: $("#centro").val()},
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function adelante(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Presentacion/adelante", 
						 data: {inicio: $("#inicio").val(), hcentro: $("#centro").val() },
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function registro(id){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Presentacion/registro", 
						 data: {id: id},
						 success: function(data){ 
								  var container = $('#formulario'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }  
            function eliminar(id){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Presentacion/eliminar", 
						 data: {id: id, inicio: $("#inicio").val(), hcentro: $("#centro").val() },
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
