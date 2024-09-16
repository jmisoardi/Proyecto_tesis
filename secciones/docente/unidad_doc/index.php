<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");

    $url_base = "http://localhost/Proyecto_tesis/";
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit();
    }

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
        <h2>Materiales disponibles</h2>
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
                        <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                            <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                        </a>
                    </td>
                   
                    <!-- <div class="text-center">
                        <a name="" id="" class="btn btn-info" href="index.php" role="button">
                            <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
                        </a>
                    </div> -->

                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
<br><br>
<?php include("../templates_doc/footer_doc.php"); ?>
