<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");

    $url_base = "http://localhost/Proyecto_tesis/";
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit();
    }
    if (isset($_GET['txtID'])) {
        // Verificamos si está presente en la URL txtID, asignamos el valor en $_GET['txtID']
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        
        // Preparamos la consulta para obtener el nombre del archivo antes de eliminarlo
        $sentencia = $conexion->prepare("SELECT archivo FROM tbl_material WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $material = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        // Si se encontró el archivo, lo eliminamos del sistema de archivos
        if ($material) {
            $archivo = $material['archivo'];
            $rutaArchivo = "../unidad_doc/img_temp/" . $archivo;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo); // Elimina el archivo físicamente
            }
        }
    
        // Preparamos la conexión de borrado en la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_material WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
    
        // Mensaje de Registro Eliminado
        $mensaje = "Registro Eliminado";
        header("Location: index.php?mensaje=" . $mensaje);
        exit();
    }
   /*  if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        //Preparamos la conexion de Borrado.
        $sentencia = $conexion->prepare ( "DELETE FROM tbl_material WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    } */
    // Consulta para obtener los archivos disponibles
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_material`");
    $sentencia->execute();
    $lista_tbl_material = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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
    <!-- Tabla para mostrar archivos subidos -->
    <div class="unidad">
        <div class="text-center">
            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
            </a>
        </div>
        <h2>Materiales disponibles</h2>
        <!-- <div class="card-header" style="background-color:bisque">    -->
            <!-- </div>  -->
            <table>
            <tr>
                <th>ID</th>
                <th>Unidad</th>
                <th>Título</th>
                <th>Archivo</th>
                <th>Acción</th>
            </tr>
            <?php foreach ($lista_tbl_material as $material) { ?>
                <tr>
                    <td><?php echo$material['id'] ; ?></td>
                    <td><?php echo $material['unidad']; ?></td>
                    <td><?php echo $material['titulo']; ?></td>
                    <td><?php echo $material['archivo']; ?></td>
                    <td>
                        <a href="../unidad_doc/img_temp/<?php echo $material['archivo']; ?>" role="button" download class="btn btn-success" >Descargar</a>
                        <!-- <a href="../unidad_doc/img_temp/<?php echo $material['archivo']; ?>" role="button" class="btn btn-danger" >Eliminar</a> -->
                        <a href="javascript:borrar(<?php echo $material['id']; ?>);" role="button" class="btn btn-danger">Elimi</a >
                    </td>
                    
                    
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
<br><br>
<?php include("../templates_doc/footer_doc.php"); ?>
