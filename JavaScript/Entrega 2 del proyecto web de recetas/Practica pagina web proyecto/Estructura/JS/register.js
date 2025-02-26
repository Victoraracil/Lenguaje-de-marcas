function validarEmail(email) 
	{
	    var re = /\S+@\S+\.\S+/;
	    return re.test(email);
	}
		var form = document.procesar;

	document.procesar.onsubmit = function(e){
		var ready = false;
		
		if(form.nombre.value!="" && form.apellidos.value!=""&& form.email.value!=""&& form.password.value!="" && form.confirm.value!=""){
			ready = true;
		}else{
				ready= false;
				alert("Hay algunos campos vacios");
				e.preventDefault();			
		}

		if(ready){
			if(validarEmail(form.email.value)){
				if(form.password.value==form.confirm.value){
					ready = true;
				}else{
					ready= false;
					alert("El password y la confirmacion no coinciden");
					form.password.focus();
					e.preventDefault();
				}		
			}else {
					alert("El email no tiene un formato valido!");
					form.email.focus();
					e.preventDefault();			
			}
		}

	}