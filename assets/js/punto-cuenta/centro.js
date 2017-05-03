            function atras(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Centro/atras", 
						 data: {inicio: $("#inicio").val()},
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
						 url: base_url + "/punto-cuenta/Centro/adelante", 
						 data: {inicio: $("#inicio").val()},
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
						 url: base_url + "/punto-cuenta/Centro/registro", 
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
						 url: base_url + "/punto-cuenta/Centro/eliminar", 
						 data: {id: id, inicio: $("#inicio").val()},
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
