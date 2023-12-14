// Función para generar y mostrar el código QR
function generarQR() {
    var formData = new FormData(document.getElementById('registroForm'));
    var datos = {};
    formData.forEach((value, key) => {
        datos[key] = value;
    });

    var qr = new QRCode(document.getElementById("codigoQRContainer"), {
        text: JSON.stringify(datos),
        width: 128,
        height: 128
    });
}

// Evento de clic para generar el código QR
document.getElementById('descargarQR').addEventListener('click', function() {
    generarQR();
    // Descargar la imagen del código QR
    var canvas = document.getElementById("codigoQRContainer").getElementsByTagName("canvas")[0];
    var url = canvas.toDataURL("image/png");
    var a = document.createElement('a');
    a.href = url;
    a.download = 'codigoQR.png';
    a.click();
});
