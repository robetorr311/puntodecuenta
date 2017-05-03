            function atrasi(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Inicio/atrasi", 
						 data: {inicio: $("#inicioi").val()},
						 success: function(data){ 
								  var container = $('#contenidoinf'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function adelantei(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Inicio/adelantei", 
						 data: {inicio: $("#inicioi").val() },
						 success: function(data){ 
								  var container = $('#contenidoinf'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function atrasp(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Inicio/atrasp", 
						 data: {inicio: $("#iniciop").val()},
						 success: function(data){ 
								  var container = $('#contenidopto'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function adelantep(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/punto-cuenta/Inicio/adelantep", 
						 data: {inicio: $("#iniciop").val() },
						 success: function(data){ 
								  var container = $('#contenidopto'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }

