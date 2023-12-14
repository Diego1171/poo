function submitForm(event) {
    event.preventDefault();

    // Validar campos obligatorios
    const tipoUsuario = document.getElementById("tipoUsuario").value;
    const correo = document.getElementById("correo").value;
    const nombres = document.getElementById("nombres").value;
    const apellidos = document.getElementById("apellidos").value;
    const idDocumento = document.getElementById("idDocumento").value;
    const telefono = document.getElementById("telefono").value;

    if (!tipoUsuario || !correo || !nombres || !apellidos || !idDocumento || !telefono) {
        alert("Por favor, complete todos los campos obligatorios.");
        return;
    }

    // Validar longitud de ID Documento y Teléfono
    if (idDocumento.length !== 10 || telefono.length !== 10) {
        alert("El ID Documento y el número de teléfono deben tener 10 dígitos.");
        return;
    }

    // Mostrar resultados
    const resultadoDiv = document.getElementById("resultado");
    resultadoDiv.style.display = "block";
    resultadoDiv.innerHTML = `
        <h2>Resultado del formulario:</h2>
        <p><strong>Tipo de usuario:</strong> ${tipoUsuario}</p>
        <p><strong>Correo electrónico:</strong> ${correo}</p>
        <p><strong>Nombres:</strong> ${nombres}</p>
        <p><strong>Apellidos:</strong> ${apellidos}</p>
        <p><strong>ID Documento:</strong> ${idDocumento}</p>
        <p><strong>Número teléfono:</strong> ${telefono}</p>
    `;
}


function cambiarColorCampos(color) {
    const campos = document.querySelectorAll("input, select, textarea");
    campos.forEach((campo) => {
        campo.style.borderColor = color;
    });
}