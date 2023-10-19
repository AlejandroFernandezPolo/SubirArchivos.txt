<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ruta_destino = "archivos_subidos/combined.html";

    // Abre o crea el archivo HTML combinado para escritura
    $archivo_html = fopen($ruta_destino, 'w');

    // añadir los archivos en el html
    $archivos = ['head', 'header', 'section', 'footer'];
    if (isset($_FILES['head']) && $_FILES['head']['error'] === UPLOAD_ERR_OK) {
        $contenido = file_get_contents($_FILES['head']['tmp_name']);
        fwrite($archivo_html, $contenido);
    }
    if (isset($_FILES['header']) && $_FILES['header']['error'] === UPLOAD_ERR_OK) {
        $contenido = file_get_contents($_FILES['header']['tmp_name']);
        fwrite($archivo_html, $contenido);
    }
    if (isset($_FILES['section']) && $_FILES['section']['error'] === UPLOAD_ERR_OK) {
        $contenido = file_get_contents($_FILES['section']['tmp_name']);
        fwrite($archivo_html, $contenido);
    }
    if (isset($_FILES['footer']) && $_FILES['footer']['error'] === UPLOAD_ERR_OK) {
        $contenido = file_get_contents($_FILES['footer']['tmp_name']);
        fwrite($archivo_html, $contenido);
    }

    fclose($archivo_html);

    echo "Archivos TXT combinados y guardados como HTML en <a href='$ruta_destino' target='_blank'> Ver la página combinada</a>";
}
?>
