window.addEventListener("load", function() {
    let consejosshort = [
        {
            titulo: "<h3>Cómo evitar vulnerabilidades</h3>",
            categoria: "Malware",
            resumen: "<p>Un consejo rapido para evitar brechas de seguridad en tu equipo.</p>",
            valoracion: 10,
            efectividad: 7,
            enlace: "<a href= consejos.html >Leer más</a>"
        },
        {
            titulo: "<h3>Gestiona tus contraseñas de forma segura</h3>",
            categoria: "Otros",
            resumen: "<p>Consejos para mantener tus cuentas protegidas.</p>",
            valoracion: 9,
            efectividad: 8,  
            enlace: "<a href= consejos.html >Leer más</a>"
        }
    ];
    
    // Seleccionar el contenedor
    const lista = document.querySelector(".consejos");

    // Generar contenido dinámico
    let contenido = "";
    consejosshort.forEach(consejo => {
        contenido += `
            <article class="tutorial">
                
                ${consejo.titulo}  
                ${consejo.resumen}
                ${consejo.enlace}
                
            </article>
        `;
    });

    // Insertar contenido en el HTML
    lista.innerHTML = contenido;
})
