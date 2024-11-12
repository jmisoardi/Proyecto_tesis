<?php 
    session_start();
    include("../../../bd.php");
    
   /*  if (isset($_GET['txtID'])) { */
        // Verificamos si está presente en la URL txtID, asignamos el valor en $_GET['txtID']
        /* $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
         */
        // Preparamos la consulta para obtener el nombre del archivo antes de eliminarlo
       /*  $sentencia = $conexion->prepare("SELECT archivo FROM tbl_material WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $material = $sentencia->fetch(PDO::FETCH_ASSOC); */
        
        // Si se encontró el archivo, lo eliminamos del sistema de archivos
        /* if ($material) {
            $archivo = $material['archivo'];
            $rutaArchivo = "../unidad_doc/img_temp/" . $archivo;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo); // Elimina el archivo físicamente
            }
        } */
    
        // Preparamos la conexión de borrado en la base de datos
        /* $sentencia = $conexion->prepare("DELETE FROM tbl_material WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute(); */
        
        // Mensaje de Registro Eliminado
        /*  $mensaje = "Registro Eliminado";
        header("Location: index.php?mensaje=" . $mensaje);
        exit(); */
   /*  } */
    /* if (isset($_GET['txtID'])) { */
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        /* $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :""; */
        //Preparamos la conexion de Borrado.
        /* $sentencia = $conexion->prepare ( "DELETE FROM tbl_material WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        } */

        // Asumimos que ya tienes la conexión establecida en $conexion
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.subtitulo, tbl_tema.archivo, tbl_nivel.nombre_nivel 
                                        FROM tbl_tema
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id");
        $sentencia->execute();
        $lista_tbl_tema = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        
    
?>

<?php include("../templates_doc/header_doc.php"); ?>
<br><br>

<!-- Incluye los estilos CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="../../../css/styles.css">

<!-- Incluye los scripts de JavaScript en el orden correcto -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<!-- Script para inicializar DataTable y Acordeón -->
<script>
    $(document).ready(function () {
        // Inicializar DataTable para ambas tablas
        $("#tabla_id_1").DataTable({
            "pageLength": 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });

        $("#tabla_id_2").DataTable({
            "pageLength": 10,
            lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });

        // Inicializar el acordeón de jQuery UI
        $("#accordion").accordion({
            collapsible: true,
            heightStyle: "content",
            active: 0
        });
    });
</script>

<body>
    <!-- Acordeón para Materiales Disponibles con jQuery UI -->
    <div id="accordion">
        <!-- Primera sección del acordeón -->
        <h3>Materiales disponibles - Sección 1</h3>
        <div>
            <!-- Tabla para mostrar archivos subidos (Sección 1) -->
            <div class="unidad">
                <div class="card-header" style="background-color: bisque;">
                    <div class="card-body-xl" style="background-color: azure;">
                        <div class="table-responsive">
                            <table class="table" id="tabla_id_1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Subtítulo</th>
                                        <th>Archivo</th>
                                        <th>Nivel</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lista_tbl_tema as $tema) { ?>
                                        <tr>
                                            <td><?php echo $tema['id']; ?></td>
                                            <td><?php echo $tema['titulo']; ?></td>
                                            <td><?php echo $tema['subtitulo']; ?></td>
                                            <td>
                                                <?php if (!empty($tema['archivo'])) { ?>
                                                    <a href="uploads/<?php echo $tema['archivo']; ?>" target="_blank">Descargar</a>
                                                <?php } else { ?>
                                                    No hay archivo
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $tema['nombre_nivel']; ?></td>
                                            <td>
                                                <a href="editar_tema.php?id=<?php echo $tema['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                <a href="javascript:borrarTema(<?php echo $tema['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segunda sección del acordeón -->
        <h3>Materiales disponibles - Sección 2</h3>
        <div>
            <!-- Tabla para mostrar archivos subidos (Sección 2) -->
            <div class="unidad">
                <div class="card-header" style="background-color: bisque;">
                    <div class="card-body-xl" style="background-color: azure;">
                        <div class="table-responsive">
                            <table class="table" id="tabla_id_2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Subtítulo</th>
                                        <th>Archivo</th>
                                        <th>Nivel</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lista_tbl_tema as $tema) { ?>
                                        <tr>
                                            <td><?php echo $tema['id']; ?></td>
                                            <td><?php echo $tema['titulo']; ?></td>
                                            <td><?php echo $tema['subtitulo']; ?></td>
                                            <td>
                                                <?php if (!empty($tema['archivo'])) { ?>
                                                    <a href="uploads/<?php echo $tema['archivo']; ?>" target="_blank">Descargar</a>
                                                <?php } else { ?>
                                                    No hay archivo
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $tema['nombre_nivel']; ?></td>
                                            <td>
                                                <a href="editar_tema.php?id=<?php echo $tema['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                <a href="javascript:borrarTema(<?php echo $tema['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<br>

<div class="text-center">
    <a class="btn btn-info" href="index.php" role="button">
        <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
    </a>
</div>



<?php include("../templates_doc/footer_doc.php"); ?>
