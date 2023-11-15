<?php
// Nombre de la carpeta a crear (obtenido del parámetro)
$carpetaNombre = $_GET['nombre'];

// Ruta donde deseas crear la carpeta (por ejemplo, en la carpeta 'descarga')
$carpetaRuta = "./descarga/" . $carpetaNombre;

// Verifica si la carpeta ya existe antes de crearla
if (!file_exists($carpetaRuta)) {
    // Crea la carpeta con permisos adecuados (por ejemplo, 0755)
    mkdir($carpetaRuta, 0755, true);
    $mensaje = "Carpeta '$carpetaNombre' creada con éxito.";
} else {
    $mensaje = "La carpeta '$carpetaNombre' ya existe.";
}

// Luego, cuando se procese un archivo, guárdalo en la carpeta creada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archivo = $_FILES['archivo'];

    if (move_uploaded_file($archivo['tmp_name'], $carpetaRuta . '/' . $archivo['name'])) {
        echo "Archivo subido con éxito.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Uploader</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="parametro.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>

    <h1> CARGA DE ARCHIVOS A LA CARPETA "<?php echo $carpetaNombre; ?>"</h1> <br>
    <div class="content">
        <!-- CONTENEDOR DE SUBIR ARCHIVOS -->
       <center> <div class="container1">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3><strong>Seleccione un archivo</strong></h3>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/e44b3843-6d0b-4174-a968-32470d9d96e3/l8GhsscPt8.json" background="#ffffff" speed="1" style="width: 150px; height: 150px" loop autoplay direction="1" mode="normal"></lottie-player>
            <input type="file" name="archivo" required> <br> <br>
                <input type="submit" value="Subir Archivo"> <br> <br>
             </form> 
        </div> </center>
 
<br> <br> 

        <!--  CONTENEDOR DE ARCHIVOS SUBIDOS       -->
        <h2 class="o"><strong>Archivos Subidos:</strong></h2> 
  <center>      <div class="container2">  
            <div id="file-list" class="pila"> <br>
            <table>
  <tr>
    <th>Nombre del archivo</th>
    <th>Descargar</th>
    <th>Eliminar</th>
  </tr>

  <?php
    $targetDir = $carpetaRuta;

    $files = scandir($targetDir);
    $files = array_diff($files, array('.', '..'));

    if (count($files) > 0) {
      foreach ($files as $file) {
        $filePath = $targetDir . $file;

        echo "<tr>";
        echo "<td>$file</td>";
        echo "<td><a href='$filePath' download class='boton-descargar'>Descargar</a></td>";
        echo "<td><a href='eliminar.php?archivo=<?php echo $file; ?>' class='boton-eliminar' onclick='eliminarArchivo(this)'>Eliminar</a></td>";}
    } else {
      echo "<tr><td colspan='3'>No se han subido archivos.</td></tr>";
    }
  ?>
</table>
 <br>
        </div> </center>
    </div>
</body>
</html>
