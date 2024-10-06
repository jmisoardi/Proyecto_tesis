<?php 
    session_start();
    include("../../../bd.php");
    
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
    if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        //Preparamos la conexion de Borrado.
        $sentencia = $conexion->prepare ( "DELETE FROM tbl_material WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        }
    // Consulta para obtener los archivos disponibles
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_material`");
    $sentencia->execute();
    $lista_tbl_material = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../templates_doc/header_doc.php");?>
<br><br>
<link rel="stylesheet" href="../../../css/styles_material.css">
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
                    <details>
                        <summary><h2>Unidad-1</h2></summary>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>
                    </details>
                    <details>
                        <summary><h2>Unidad-2</h2></summary>
                            <h1>Test headline</h1>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>
                    </details>
                    <details>
                        <summary><h2>Unidad-3</h2></summary>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>
                    </details>
                    <details>
                        <summary><h2>Unidad-4</h2></summary>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>
                    </details>
                    <details>
                        <summary><h2>Unidad-5</h2></summary>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>
                    </details>
                </table>
            </div>
    </body>
<br><br>
<?php include("../templates_doc/footer_doc.php"); ?>
