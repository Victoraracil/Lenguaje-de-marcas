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