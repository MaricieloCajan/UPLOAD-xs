
// Obtén la URL actual
const urlActual = window.location.href;

// Verifica si el parámetro 'nombre' ya está presente en la URL
var parametros = new URLSearchParams(window.location.search);
var carpetaNombre = parametros.get("nombre");

if (!carpetaNombre) {
    // Si 'nombre' no está presente, genera un número aleatorio
    carpetaNombre = generarCadenaAleatoria();
    // Agrega el parámetro 'nombre' a la URL
    const urlConParametro = urlActual.includes("?") ? `${urlActual}&nombre=${carpetaNombre}` : `${urlActual}?nombre=${carpetaNombre}`;
    // Redirige a la nueva URL con el parámetro 'nombre'
    window.location.href = urlConParametro;
} else {
    // Extrae el valor del parámetro de la URL
    const parametros = new URLSearchParams(window.location.search);
    const carpetaNombre = parametros.get("nombre");

    // Llama a la función para crear la carpeta con el nombre obtenido
    function crearCarpeta(carpetaNombre) {
    $.ajax({
        url: 'crearCarpeta.php', // Ruta del archivo PHP que crea la carpeta
        type: 'POST', // Puedes usar POST o GET según tus necesidades
        data: { nombreCarpeta: carpetaNombre }, // Envía el nombre de la carpeta como datos
        success: function(response) {
            console.log('Carpeta creada.'); // Mensaje de éxito (puedes personalizarlo)
        },
        error: function() {
            console.log('Error al crear la carpeta.'); // Mensaje de error (puedes personalizarlo)
        }
    });
}
    
}

// Función para generar un número aleatorio de 3 dígitos
function generarCadenaAleatoria() {
    const caracteres = 'abcdefghijklmnopqrstuvwxyz0123456789';
    let cadenaAleatoria = '';
    for (let i = 0; i < 3; i++) {
        const caracterAleatorio = caracteres.charAt(Math.floor(Math.random() * caracteres.length));
        cadenaAleatoria += caracterAleatorio;
    }
    return cadenaAleatoria;
}


 