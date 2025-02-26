window.addEventListener("load", function()
{
    //usuario
    document.form.user.addEventListener("invalid", function()
    {
        if(this.validity.valueMissing){
            this.setCustomValidity("El nombre no puede estar vacio");
        }
    });
    document.from.user.addEventListener("input", function()
    {
        this.setCustomValidity("");
    });

    //email
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
    let pass2 = document.getElementById("password2");

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

