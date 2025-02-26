let lista = document.getElementsByClassName("tutorial");
let items = lista.getElementsByTagName("article");
alert(items.length);    // 3
for(let i = 0; i < items.length; i++)
{
    // Uno, Dos, Tres, respectivamente    
    alert(consejos[i].textContent); 
}
// Ruta hasta imagen "imagen.png"
alert(imagen.src);

let consejos = [
    {
        titulo: "Cómo evitar vulnerabilidades",
        resumen: "Un consejo rapido para evitar brechas de seguridad en tu equipo.",
        valoracion: 10,
        efectividad: 7,
    },
    {
        titulo: "Gestiona tus contraseñas de forma segura",
        resumen: "Consejos para mantener tus cuentas protegidas.",
        valoracion: 9,
        efectividad: 8,  
    }
    
    ];