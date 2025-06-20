// Para esperar a que se cargue todo el contenido de la página
window.addEventListener("load", function() {
    // Capturo el botón y le agrego el evento
    let boton = document.getElementById("botonAgregar");
    boton.addEventListener("click", anadirElemento);
});

// Recoger la info escrita por el usuario en el form
function anadirElemento() {
    let nombre = document.getElementById("nombre").value;
    let precio = document.getElementById("precio").value;
    let imagen = document.getElementById("imagen").value;

    // Validacr que los campos no sean nulos
    if (nombre === "" || precio === "" || imagen === "") {
        alert("Todos los campos son obligatorios.");
        return;
    }

    // Validar que la imagen sea correcta (que exista en /img)
    let imagenesValidas = ["imagen1", "imagen2", "imagen3"];
    if (!imagenesValidas.includes(imagen)) {
        alert("El nombre de la imagen no es válido.");
        return;
    }

    // Para crear un nuevo elemento de <li>
    let item = document.createElement("li");

    // Para crear el texto con nombre y precio
    let texto = document.createTextNode("Nombre: " + nombre + ", Precio: " + precio + "€ ");

    // Para crear la imagen
    let img = document.createElement("img");
    img.src = "img/" + imagen + ".jpeg";
    img.style.width = "50px";

    // Para crear el botón de borrar
    let botonBorrar = document.createElement("button");
    botonBorrar.textContent = "Borrar";

    // Para añadir el evento para eliminar el artículo
    botonBorrar.addEventListener("click", function() {
        let lista = document.getElementById("listaTareas");
        lista.removeChild(item);
    });

    // Para añadir todo al <ul>
    item.appendChild(texto);
    item.appendChild(img);
    item.appendChild(botonBorrar);

    let lista = document.getElementById("listaTareas");
    lista.appendChild(item);
}