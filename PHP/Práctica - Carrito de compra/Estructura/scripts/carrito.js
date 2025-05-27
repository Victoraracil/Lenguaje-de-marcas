document.addEventListener("DOMContentLoaded", function() {
    const nombresArticulos = ["Pelota", "Muñeca", "Coche"];
    const preciosArticulos = [20, 15, 30];
    const contenedor = document.getElementById("contenedor_articulos");
    const erroresDiv = document.getElementById("errores");
    const botonAnyadir = document.getElementById("botonAnyadir");
    const botonComprar = document.getElementById("botonComprar");
    const botonReiniciar = document.createElement("button");
    botonReiniciar.id = "botonReiniciar";
    botonReiniciar.className = "boton";
    botonReiniciar.textContent = "Reiniciar Carrito";
    document.getElementById("totales").appendChild(botonReiniciar);
    
    const articulosCarrito = document.getElementById("articulos_carrito");
    const narticulos = document.getElementById("narticulos");
    const ptotal = document.getElementById("ptotal");
    let totalArticulos = 0;
    let totalPrecio = 0;
    
    function mostrarArticulos() {
        contenedor.innerHTML = "";
        nombresArticulos.forEach((nombre, index) => {
            contenedor.innerHTML += `
                <div class="articulo" draggable="true" ondragstart="arrastrar(event)" data-index="${index}">
                    <label class="nombre">${nombre}</label>
                    <label class="precio">${preciosArticulos[index]} €</label>
                </div>`;
        });
    }
    mostrarArticulos();

    function validarEntrada(nombre, precio) {
        erroresDiv.innerHTML = "";
        const nombreRegex = /^[a-zA-Z]{4,10}$/;
        const precioRegex = /^[1-9][0-9]?$/;
        
        if (!nombreRegex.test(nombre)) {
            erroresDiv.innerHTML = "Error: Nombre inválido.";
            return false;
        }
        if (!precioRegex.test(precio)) {
            erroresDiv.innerHTML = "Error: Precio inválido.";
            return false;
        }
        erroresDiv.innerHTML = "Validación OK";
        return true;
    }
    
    botonAnyadir.addEventListener("click", function() {
        const nombre = document.getElementById("nombre").value;
        const precio = document.getElementById("precio").value;
        if (validarEntrada(nombre, precio)) {
            nombresArticulos.push(nombre);
            preciosArticulos.push(parseInt(precio));
            mostrarArticulos();
        }
    });
    
    botonComprar.addEventListener("click", function() {
        const articulo = document.getElementById("articulo").value;
        const cantidad = document.getElementById("cantidad").value;
        const index = nombresArticulos.indexOf(articulo);
        if (index === -1 || !/^[1-9]$/.test(cantidad)) {
            erroresDiv.innerHTML = "Error: Artículo o cantidad inválida.";
            return;
        }
        totalArticulos += parseInt(cantidad);
        totalPrecio += preciosArticulos[index] * cantidad;
        narticulos.textContent = totalArticulos;
        ptotal.textContent = totalPrecio + " €";
        articulosCarrito.innerHTML += `
            <div class="articulo">
                <label class="nombre">${articulo}</label>
                <label class="precio">${preciosArticulos[index]} €</label>
            </div>`;
    });

    botonReiniciar.addEventListener("click", function() {
        totalArticulos = 0;
        totalPrecio = 0;
        narticulos.textContent = totalArticulos;
        ptotal.textContent = totalPrecio + " €";
        articulosCarrito.innerHTML = "";
    });

    let carrito = document.getElementById("contenedor_carrito");
    let tituloCarrito = document.getElementById("titulo_carrito");
    let offsetX, offsetY, isDragging = false;
    
    tituloCarrito.addEventListener("mousedown", function(e) {
        isDragging = true;
        offsetX = e.clientX - carrito.offsetLeft;
        offsetY = e.clientY - carrito.offsetTop;
    });
    
    document.addEventListener("mousemove", function(e) {
        if (isDragging) {
            carrito.style.left = (e.clientX - offsetX) + "px";
            carrito.style.top = (e.clientY - offsetY) + "px";
        }
    });
    
    document.addEventListener("mouseup", function() {
        isDragging = false;
    });
    
    function arrastrar(event) {
        event.dataTransfer.setData("text", event.target.getAttribute("data-index"));
    }
    
    articulosCarrito.addEventListener("dragover", function(event) {
        event.preventDefault();
    });
    
    articulosCarrito.addEventListener("drop", function(event) {
        event.preventDefault();
        let index = event.dataTransfer.getData("text");
        totalArticulos++;
        totalPrecio += preciosArticulos[index];
        narticulos.textContent = totalArticulos;
        ptotal.textContent = totalPrecio + " €";
        articulosCarrito.innerHTML += `
            <div class="articulo">
                <label class="nombre">${nombresArticulos[index]}</label>
                <label class="precio">${preciosArticulos[index]} €</label>
            </div>`;
    });
});