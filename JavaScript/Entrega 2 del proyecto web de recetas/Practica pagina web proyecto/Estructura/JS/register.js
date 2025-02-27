window.addEventListener("load", function()
{
    let user = document.getElementById("user");
    let email = document.getElementById("email")
    let pass = document.getElementById("password");
    let pass2 = document.getElementById("password2");

    //usuario
    user.addEventListener("invalid", function()
    {
        if(user.validity.valueMissing){
            user.setCustomValidity("El nombre no puede estar vacio");
        }
        else if (user.validity.typeMismatch){
            user.setCustomValidity("Asegurate de escribir un e-mail valido");
        }
    });
    user.addEventListener("input", function()
    {
        user.setCustomValidity("");
    });

    //email
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
        else if (pass.validity.typeMismatch)//falta que salga esta alerta (sale una alerta pora la alerta default, no esta)
        {
            pass.setCustomValidity("El password debe tener al menos 8 caracteres, y sólo pueden ser letras y números");
        }
    });
    pass.addEventListener("input", function()
    {
        pass.setCustomValidity("");
    });
    pass.addEventListener("input", function()
    {
        pass.setCustomValidity("");
        if (pass.value != pass2.value)
        {
            pass2.setCustomValidity("Los passwords no coinciden");
        }
        else
        {
            pass2.setCustomValidity("");
        }
    });

    pass2.addEventListener("input", function()
    {
        if (pass.value != pass2.value)
        {
            pass2.setCustomValidity("Los passwords no coinciden");
        }
        else
        {
            pass2.setCustomValidity("");
        }
    });

    //falta implementar que cada nuevo registro sea un objeto usuario y que este usuario se guarde
});

