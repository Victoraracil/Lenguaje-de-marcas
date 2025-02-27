window.addEventListener("load", function()
{
    let tit = document.getElementById("titulo");
    let resu = document.getElementById("resumen");
    let desc = document.getElementById("descripcion")
    //titulo
    tit.addEventListener("invalid", function()
    {
        if(tit.validity.valueMissing){
            tit.setCustomValidity("El titulo no puede estar vacio");
        }
        else if (tit.validity.typeMismatch){
            tit.setCustomValidity("Asegurate de escribir un nombre valido");
        }
    });
    tit.addEventListener("input", function()
    {
        tit.setCustomValidity("");
    });

    //resumen
    resu.addEventListener("invalid", function()
    {
        if(resu.validity.valueMissing){
            resu.setCustomValidity("El resumen no puede estar vacio");
        }
        else if (resu.validity.typeMismatch){
            resu.setCustomValidity("Resumen invalido");
        }
    });
    resu.addEventListener("input", function()
    {
        resu.setCustomValidity("");
    });

    //descripcion
    desc.addEventListener("invalid", function()
    {
        if(desc.validity.valueMissing){
            desc.setCustomValidity("La descripcion no puede estar vacia");
        }
        else if (desc.validity.typeMismatch){
            desc.setCustomValidity("Descripcion invalido");
        }
    });
    desc.addEventListener("input", function()
    {
        desc.setCustomValidity("");
    });
});


//faltaria hacer la parte para que al pulsar el boton "enviar" se cree un objeto 'consejo' y se guarde en un array para posteriormente mostrarlo en consejos