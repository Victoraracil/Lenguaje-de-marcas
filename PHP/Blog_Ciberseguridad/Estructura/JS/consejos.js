window.addEventListener("load", function () {
    let consejos = [//array de consejos
        //Malware
        {
            titulo: "Cómo evitar vulnerabilidades",
            categoria: "Malware",
            resumen: "Mantén tu sistema actualizado y usa software de seguridad.",
            valoracion: 10,
            efectividad: 7,
            enlace: "consejos/Malware/consejo1.html",
            imagen: "consejos/imagenes/Malware/consejo1.jpg"
        },
        {
            titulo: "Protección contra troyanos",
            categoria: "Malware",
            resumen: "No descargues archivos de fuentes desconocidas y usa un antivirus confiable.",
            valoracion: 9,
            efectividad: 8,
            enlace: "consejos/Malware/consejo2.html",
            imagen: "consejos/imagenes/Malware/consejo2.jpg"
        },
        {
            titulo: "Evita el ransomware",
            categoria: "Malware",
            resumen: "Realiza copias de seguridad frecuentes y nunca abras correos sospechosos.",
            valoracion: 8,
            efectividad: 9,
            enlace: "consejos/Malware/consejo3.html",
            imagen: "consejos/imagenes/Malware/consejo3.jpg"
        },

        //Phishing
        {
            titulo: "Protege tu correo de phishing",
            categoria: "Phishing",
            resumen: "Verifica los remitentes antes de hacer clic en enlaces.",
            valoracion: 8,
            efectividad: 9,
            enlace: "consejos/Phising/consejo1.html",
            imagen: "consejos/imagenes/Phising/consejo1.jpg"
        },
        {
            titulo: "Detecta sitios web falsos",
            categoria: "Phishing",
            resumen: "Siempre revisa la URL antes de ingresar credenciales.",
            valoracion: 9,
            efectividad: 9,
            enlace: "consejos/Phising/consejo2.html",
            imagen: "consejos/imagenes/Phising/consejo2.jpg"
        },
        {
            titulo: "Evita llamadas de soporte falsas",
            categoria: "Phishing",
            resumen: "Nunca compartas información sensible por teléfono.",
            valoracion: 7,
            efectividad: 8,
            enlace: "consejos/Phising/consejo3.html",
            imagen: "consejos/imagenes/Phising/consejo3.jpg"
        },

        //Hacking Ético
        {
            titulo: "Aprende hacking ético legalmente",
            categoria: "Hacking etico",
            resumen: "Utiliza plataformas oficiales como Hack The Box o TryHackMe.",
            valoracion: 10,
            efectividad: 9,
            enlace: "consejos/Hacking Etico/consejo1.html",
            imagen: "consejos/imagenes/Hacking Etico/consejo1.jpg"            
        },
        {
            titulo: "Usa Kali Linux para pruebas de seguridad",
            categoria: "Hacking etico",
            resumen: "Kali Linux tiene herramientas preinstaladas para auditorías de seguridad.",
            valoracion: 9,
            efectividad: 8,
            enlace: "consejos/Hacking Etico/consejo2.html",
            imagen: "consejos/imagenes/Hacking Etico/consejo2.jpg"            
        },
        {
            titulo: "Explora vulnerabilidades con OWASP",
            categoria: "Hacking etico",
            resumen: "OWASP Top 10 te enseña los ataques más comunes y cómo mitigarlos.",
            valoracion: 8,
            efectividad: 9,
            enlace: "consejos/Hacking Etico/consejo3.html",
            imagen: "consejos/imagenes/Hacking Etico/consejo3.jpg"            
        },

        //Otros
        {
            titulo: "Gestiona tus contraseñas de forma segura",
            categoria: "Otros",
            resumen: "Usa gestores de contraseñas y activa autenticación en dos pasos.",
            valoracion: 9,
            efectividad: 8,
            enlace: "consejos/Otros/consejo1.html",
            imagen: "consejos/imagenes/Otros/consejo1.jpg"
        },
        {
            titulo: "Cifrado de archivos sensibles",
            categoria: "Otros",
            resumen: "Usa herramientas como VeraCrypt para proteger información privada.",
            valoracion: 9,
            efectividad: 9,
            enlace: "consejos/Otros/consejo2.html",
            imagen: "consejos/imagenes/Otros/consejo2.jpg"
        },
        {
            titulo: "Configura una VPN segura",
            categoria: "Otros",
            resumen: "Usar una VPN en redes públicas protege tu privacidad y seguridad.",
            valoracion: 10,
            efectividad: 9,
            enlace: "consejos/Otros/consejo3.html",
            imagen: "consejos/imagenes/Otros/consejo3.jpg"
        }
    ];
    //definicion de variables para filtros
    const lista = document.querySelector(".tip-list");
    const categoriaFiltro = document.getElementById("categoria");
    const valoracionFiltro = document.getElementById("valoracion");
    const efectividadFiltro = document.getElementById("efectividad");

    //comprobacion de si existen elementos
    if (!lista || !categoriaFiltro || !valoracionFiltro || !efectividadFiltro) {
        console.error("Uno o más elementos no fueron encontrados.");
        return;
    }

    //filtros
    function filtrarConsejos() {
        const categoriaSeleccionada = categoriaFiltro.value;
        const valoracionSeleccionada = parseInt(valoracionFiltro.value);
        const efectividadSeleccionada = parseInt(efectividadFiltro.value);

        let consejosFiltrados = consejos.filter(consejo => {
            return (categoriaSeleccionada === "filtro" || consejo.categoria === categoriaSeleccionada) &&
                (isNaN(valoracionSeleccionada) || consejo.valoracion == valoracionSeleccionada) &&
                (isNaN(efectividadSeleccionada) || consejo.efectividad == efectividadSeleccionada);
        });

        mostrarConsejos(consejosFiltrados);
    }

    function mostrarConsejos(consejosMostrar) {
        lista.innerHTML = "";

        if (consejosMostrar.length === 0) {
            lista.innerHTML = "<p>No hay consejos que coincidan con los filtros seleccionados.</p>";
            return;
        }
        consejosMostrar.sort((a, z) => a.titulo.localeCompare(z.titulo));
        consejosMostrar.forEach(consejo => {
            let consejoHTML = document.createElement("article");
            consejoHTML.classList.add("tip");

            consejoHTML.innerHTML = `
            <div class="consejo">
                <div class="tooltip-container">
                    ${consejo.imagen ? `<img src="${consejo.imagen}" alt="${consejo.titulo}" class="tooltip-trigger">` : ""}
                    <div class="tooltip">
                        <p><strong>Categoría:</strong> ${consejo.categoria}</p>
                        <p><strong>Valoración:</strong> ${consejo.valoracion}/10</p>
                        <p><strong>Efectividad:</strong> ${consejo.efectividad}/10</p>
                    </div>
                </div>
                <h3>${consejo.titulo}</h3>
                <p>${consejo.resumen}</p>
                <a href="${consejo.enlace}">Leer más</a>
            </div>
            `;

            lista.appendChild(consejoHTML);
        });
    }

    categoriaFiltro.addEventListener("change", filtrarConsejos);
    valoracionFiltro.addEventListener("change", filtrarConsejos);
    efectividadFiltro.addEventListener("change", filtrarConsejos);

    // Mostrar los consejos al cargar la página
    mostrarConsejos(consejos);
});
