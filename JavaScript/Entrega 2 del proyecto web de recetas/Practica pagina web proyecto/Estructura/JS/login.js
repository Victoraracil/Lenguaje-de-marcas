window.addEventListener("load", function()
{
    let pass = document.getElementById("password");
    let email = document.getElementById("email");
    email.addEventListener("invalid", function()
    {
        if(email.validity.valueMissing){
            email.setCustomValidity("El e-mail no puede estar vacio");
        }
        else if (email.validity.typeMismatch){
            email.setCustomValidity("Asegurate de escribir un e-mail valido");
        }
    });
    email.addEventListener("input", function()
    {
        email.setCustomValidity("");
    });

    //contraseña

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
    pass.addEventListener("input", function()
    {
        pass.setCustomValidity("");
    });
    
    //falta implementar la comprobacion de si el correo y contraseña coinciden con las de algun usuario guardado
});