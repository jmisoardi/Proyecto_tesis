
<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    // Verifica si la sesión de usuario está establecida
    $url_base = "http://localhost/Proyecto_tesis/";
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit(); // Detiene la ejecución del script después de redirigir
    } else {
        }        
?>
<br>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/styles.css">
    <title>Document</title>
</head>
<body>
    
    <!-- Formulario para subir material -->
    <div class="unidad">
        <form action="subir_m.php" method="POST" enctype="multipart/form-data">
            <label for="unidad">Unidad:</label>
            <input type="text" id="unidad" name="unidad" required><br><br>
    
            <label for="titulo">Título del Material:</label>
            <input type="text" id="titulo" name="titulo" required><br><br>
    
            <label for="archivo">Seleccionar archivo PDF:</label>
            <input type="file" id="archivo" name="archivo" accept=".pdf" required><br><br>
    
            <input type="submit" value="Subir Material">
        </form>
    </div>
</body>

</html>
<br><br>
<?php include("../templates_doc/footer_doc.php"); ?>
        
    
        
    