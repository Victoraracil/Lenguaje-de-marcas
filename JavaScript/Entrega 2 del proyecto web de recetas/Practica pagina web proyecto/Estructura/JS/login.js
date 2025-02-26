window.addEventListener("load", function()
{
    document.form.email.addEventListener("invalid", function()
    {
        if(this.validity.valueMissing){
            this.setCustomValidity("El e-mail no puede estar vacio");
        }
        else if (this.validity.typeMismatch){
            this.setCustomValidity("Asegurate de escribir un e-mail valido");
        }
    });
    document.from.email.addEventListener("input", function()
    {
        this.setCustomValidity("");
    });

    //contraseña
    let pass = document.getElementById("password");

    pass.addEventListener("invalid", function()
    {
        if(pass.validity.valueMissing)
        {
            pass.setCustomValidity("El password no puede estar vacío");
        }
        else if (pass.validity.patternMismatch)
        {
            pass.setCustomValidity("El password debe tener al menos 8 caracteres, y sólo pueden ser letras y números");
        }
    });
    
    //falta implementar la comprobacion de si el correo y contraseña coinciden con las de algun usuario guardado
});