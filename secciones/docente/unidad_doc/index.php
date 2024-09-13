
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
    
        
    if ($_POST){
    }    
    
    $unidad = (isset($_POST["unidad"])) ? $_POST["unidad"] : "";
    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : "";
    
    $file_name = $_FILES['archivo']['name'];
    $file_tmp =  $_FILES['file']['tmp_name'];

    $route =  "../unidad_doc/img_temp". $file_name; 

    move_uploaded_file($file_tmp,$route);

    $sentencia = $conexion->prepare("INSERT INTO `tbl_material`(`id`, `unidad`,`titulo`) VALUE (null, :unidad, :titulo, :archivo) ");
    $sentencia->bindParam(":unidad", $unidad);
    $sentencia->bindParam(":titulo", $file_name);
    $sentencia->bindParam(":archivo", $archivo);
    $sentencia->execute();
    
    /* $usuario_doc = $sentencia->fetch(PDO::FETCH_ASSOC); */

    $sentencia = $conexion->prepare("SELECT * FROM `tbl_material`");
    $sentencia->execute();
    $lista_tbl_material = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    echo 'Se subio el archivo';
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
            <input type="text" id="unidad" name="unidad" ><br><br>
    
            <label for="titulo">Título del Material:</label>
            <input type="text" id="titulo" name="titulo" ><br><br>
    
            <label for="archivo">Seleccionar archivo PDF:</label>
            <input type="file" id="archivo" name="archivo"><br><br>
    
            <input type="submit" value="Subir Material">
        </form>
    </div>
</body>
<!-- accept=".pdf" -->
</html>
<br><br>
<?php include("../templates_doc/footer_doc.php"); ?>
        
    
        
    