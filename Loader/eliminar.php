<?php

$fileToDelete = $_GET['archivo'];
$targetDir = "./descarga/" . $nombreCarpeta;
$filePath = $targetDir . "/" . $fileToDelete;

if (file_exists($filePath)) {
    unlink($filePath);
    header("Location: d.php"); // Redirect back to the index page
} else {
    echo "Error: File not found";
}

?>