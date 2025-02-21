function mostrarInformacion()
{
    let login = document.form1.login.value;
    let nhijos = document.form1.nhijos.value;
    let info = document.form1.info.checked;
    let horario = document.form1.horario;
    let operador = document.form1.operador;

    // Login
    if (login == "")
    {
        alert("Tu login está vacío");
    }

    // Número de hijos
    if (nhijos == "")
    {
        document.form1.nhijos.value = 0;
        nhijos = document.form1.nhijos.value;
    }

    // Checkbox información
    if (info)
    {
        alert("Deseas recibir información por e-mail");
    }
    else
    {
        alert("No deseas recibir información por e-mail");
    }

    // Horario
    /*
    for (let indice in horario)
    {
        if (horario[indice].checked)
        {
            alert("Has elegido el horario de " + horario[indice].value);
        }
    }
    */

    // Operador
    /*
    let indice = operador.selectedIndex;
    if (indice < 0)
    {
        alert("No has elegido operador");
    }
    else
    {
        alert("Has elegido el operador " + operador[indice].value);
    }
    */
}