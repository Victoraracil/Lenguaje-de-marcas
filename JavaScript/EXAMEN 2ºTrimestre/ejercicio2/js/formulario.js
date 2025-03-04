let valoraciones = [];

//email
document.form_valoracion.email.addEventListener("invalid", function()
{
    if(this.validity.valueMissing){
        this.setCustomValidity("El e-mail no puede estar vacio");
    }
    else if (this.validity.typeMismatch){
        this.setCustomValidity("Asegurate de escribir un e-mail valido");
    }
});
this.addEventListener("input", function()
{
    this.setCustomValidity("");
});

//edad
document.form_valoracion.edad.addEventListener("invalid", function()
{
    if(this.validity.valueMissing){
        this.setCustomValidity("Edad fuera de rango");
    }
    else if (this.validity.typeMismatch){
        this.setCustomValidity("Edad fuera de rango");
    }
});
this.addEventListener("input", function()
{
    this.setCustomValidity("");
});

//telefono
document.form_valoracion.telefono.addEventListener("input", function()
{
    if (this.value == "" || /[0-9]{9}/.test(this.value))
    {
        this.setCustomValidity("");
    }
    else
    {
        this.setCustomValidity("Número de teléfono no válido");
    }
});

//web
document.form_valoracion.web.addEventListener("input", function()
{
    if (this.value == "" || /https?:\/\/?.*/.test(this.value))
    {
        this.setCustomValidity("");
    }
    else
    {
        this.setCustomValidity("URL no válida");
    }
});

//valoracion
documento.getElementById("enviar").addEventListener("click", function()
{
    let Botones = document.getElementsByName("valoracion");
    let correcto = false;
    for (let i = 0; i < Botones.length; i++)
    {
        if (Botones[i].checked)
        {
            correcto = true;
        }
    }
    if (correcto)
    {
        Botones[0].setCustomValidity("");
    }
    else
    {
        Botones[0].setCustomValidity("Debes realizar una valoración");
    }
});

//Evento para el boton de enviar
document.form_valoracion.addEventListener("submit", function(event)
{
    event.preventDefault();
    nuevaValoracion();  
    mostrarValoraciones(); 
});

//Funcion para añadir una nueva valoracion
function nuevaValoracion()
{
    //datos
    let nombre = document.form_valoracion.nombre.value;
    let email = document.form_valoracion.email.value;
    let edad = document.form_valoracion.edad.value;
    let telefono = document.form_valoracion.telefono.value;
    let valoracion = document.form_valoracion.valoracion.value;

    //nueva valoracion
    let nuevaValoracion = {
        nombre: nombre,
        email: email,
        edad: edad,
        telefono: telefono,
        valoracion: valoracion
    };

    //añadir valoracion
    valoraciones.push(nuevaValoracion);

    //ordenar valoraciones
    valoraciones.sort((v1,v2) => v2.valoracion - v1.valoracion);

}

//Evento para el boton de mostrar
function mostrarValoraciones()
{
    let opiniones = document.getElementById("opiniones");

    //limpiar opiniones
    let listado = opiniones.getElementsByTagName("ul");
    for (let i = 0; i < valoraciones.length; i++)
    {
        listado[i].parentNode.removeChild(listado[i]);
    }

    //mostrar listado
    let newlistado = document.createElement("ul");
    valoraciones.forEach(v => {
        let newli = document.createElement("li");
        let contenido = document.createTextNode(v.nombre 
            + " - " + v.email 
            + " - " + v.edad 
            + " - " + v.telefono 
            + " - " + v.valoracion
        );
        
        newli.appendChild(contenido);
        newlistado.appendChild(newli);    
    });
    opiniones.appendChild(newlistado);
    
}