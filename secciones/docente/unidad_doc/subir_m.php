<?php
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");

    $url_base = "http://localhost/Proyecto_tesis/";

    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit();
    }
    
    if ($_POST) {
        $unidad = (isset($_POST["unidad"])) ? $_POST["unidad"] : "";
        $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"] : "";
        $file_name = $_FILES['archivo']['name'];
        $file_tmp = $_FILES['archivo']['tmp_name']; // Corregido el nombre del campo
        
        // Ruta donde se almacenará el archivo
        $route = "../unidad_doc/img_temp/" . $file_name; 

        // Mueve el archivo a la ubicación especificada
        if (move_uploaded_file($file_tmp, $route)) {
            // Inserta los datos en la base de datos
            $sentencia = $conexion->prepare("INSERT INTO `tbl_material`(`unidad`,`titulo`, `archivo`) VALUES (:unidad, :titulo, :archivo)");
            $sentencia->bindParam(":unidad", $unidad);
            $sentencia->bindParam(":titulo", $titulo);
            $sentencia->bindParam(":archivo", $file_name); // Corregido el valor de archivo
            $sentencia->execute();

            echo '<p style="color: green;">El archivo se subió correctamente.</p>';
        } else {
            echo '<p style="color: red;">Hubo un error al subir el archivo.</p>';
        }
    }
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <body>
        <!-- Formulario para subir material -->
        <div class="unidad">
            <h2>Subir nuevo material</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="unidad">Unidad:</label>
                <input type="text" id="unidad" name="unidad" required><br><br>
        
                <label for="titulo">Título del Material:</label>
                <input type="text" id="titulo" name="titulo" required><br><br>
        
                <label for="archivo">Seleccionar archivo PDF:</label>
                <input type="file" id="archivo" name="archivo" accept=".pdf" required><br><br>
        
                <input type="submit" value="Subir Material" class="btn">
            </form>
        </div>
        <div class="text-center">
            <a name="" id="" class="btn btn-info" href="index.php" role="button">
                <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
            </a>
        </div>
    </body>
</html>
<br><br>
<?php include("../templates_doc/footer_doc.php"); ?>




