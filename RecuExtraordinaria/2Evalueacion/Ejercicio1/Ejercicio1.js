window.addEventListener("load", function()
{
    let desc = document.getElementById("codigo")
    const re = new RegExp(... + "-" + \d\d\d$);

    desc.addEventListener("invalid", function()
    {
        if(desc != ){
            desc.setCustomValidity("La cadena no puede estar vacia");
        }
        else if (desc.validity.typeMismatch){
            desc.setCustomValidity("invalido");
        }
    });
    desc.addEventListener("input", function()
    {
        desc.setCustomValidity("");
    });
});