<?php 
    session_start();
    include("../../../bd.php");
    
    if (isset($_GET['txtID'])) {
        // Verificamos si está presente en la URL txtID, asignamos el valor en $_GET['txtID']
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        
       /*  // Preparamos la consulta para obtener el nombre del archivo antes de eliminarlo
        $sentencia = $conexion->prepare("SELECT archivo FROM tbl_material WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $material = $sentencia->fetch(PDO::FETCH_ASSOC);
         */
        // Si se encontró el archivo, lo eliminamos del sistema de archivos
        /* if ($material) {
            $archivo = $material['archivo'];
            $rutaArchivo = "../unidad_doc/img_temp/" . $archivo;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo); // Elimina el archivo físicamente
        } */
    
        // Preparamos la conexión de borrado en la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_tema WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        
        /* // Mensaje de Registro Eliminado
        $mensaje = "Registro Eliminado";
        header("Location:index.php?mensaje=" . $mensaje); */
        
    }
    /* if (isset($_GET['txtID'])) { */
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        /* $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :""; */
        //Preparamos la conexion de Borrado.
        /* $sentencia = $conexion->prepare ( "DELETE FROM tbl_material WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        } */

        // Sentencia, datos de tabla
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel  
                                        FROM tbl_tema 
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id WHERE tbl_nivel.id = 1");
        $sentencia->execute();
        $lista_tbl_tema_a1 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // Sentencia, datos de tabla
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel  
                                        FROM tbl_tema 
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id WHERE tbl_nivel.id = 3");
        $sentencia->execute();
        $lista_tbl_tema_a2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // Sentencia, datos de tabla
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel  
                                        FROM tbl_tema 
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id WHERE tbl_nivel.id = 7");
        $sentencia->execute();
        $lista_tbl_tema_b1 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // Sentencia, datos de tabla
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel  
                                        FROM tbl_tema 
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id WHERE tbl_nivel.id = 9");
        $sentencia->execute();
        $lista_tbl_tema_b2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // Sentencia, datos de tabla
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel  
                                        FROM tbl_tema 
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id WHERE tbl_nivel.id = 11");
        $sentencia->execute();
        $lista_tbl_tema_c1 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // Sentencia, datos de tabla
        $sentencia = $conexion->prepare("SELECT tbl_tema.id, tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel  
                                        FROM tbl_tema 
                                        LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id WHERE tbl_nivel.id = 12");
        $sentencia->execute();
        $lista_tbl_tema_c2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        
    
?>

<?php include("../templates_doc/header_doc.php"); ?>
<br><br>

<!-- Incluye los estilos CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="../../../css/styles.css">
<link rel="stylesheet" href="../../../css/styles_unidad_index.css">

<!-- Incluye los scripts de JavaScript en el orden correcto -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script> -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<!-- Script para inicializar DataTable y Acordeón -->
    <script>
        $(document).ready(function () {
            // Inicializar DataTable tabla_id_1
            $("#tabla_id_1").DataTable({
                "pageLength": 10,
                lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            });
            // Inicializar DataTable tabla_id_2
            $("#tabla_id_2").DataTable({
                "pageLength": 10,
                lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            });
            // Inicializar DataTable tabla_id_3
            $("#tabla_id_3").DataTable({
                "pageLength": 10,
                lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            });
            // Inicializar DataTable tabla_id_4
            $("#tabla_id_4").DataTable({
                "pageLength": 10,
                lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            });
            // Inicializar DataTable tabla_id_5
            $("#tabla_id_5").DataTable({
                "pageLength": 10,
                lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            });
            // Inicializar DataTable tabla_id_6
            $("#tabla_id_6").DataTable({
                "pageLength": 10,
                lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                }
            });
        });
    </script>

    <body>
        <!-- Acordeón para Materiales Disponibles con jQuery UI -->
        <!-- <div id="accordion"> -->
            <!-- Primera sección del acordeón -->
            <!--Estilo para el titulo Personal-->
        <style> 
            h1 {
                text-align: center; font-family: Georgia, sans-serif;
            }
        </style>

            <div class="card-header" style="background-color:bisque">
                <a name="" id="" href="crear_tema.php" role="button" >
                    <img src="../../../css/imagen_tesis/icons/icon_agregar.png" style="width: 48px; height: 48px; vertical-align: middle;">
                </a>
                <br>
                <!-- Tabla para mostrar archivos subidos (Sección 1) -->
                        <div class="unidad">
                            <h1>Materiales disponibles - Sección A0-A1</h1>
                            <div class="card-header" style="background-color: bisque;">
                                <div class="card-body-xl" style="background-color: azure;">
                                    <div class="table-responsive">
                                        <table class="table" id="tabla_id_1">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Título</th>
                                                    <th>Descripción</th>
                                                    <th>Archivo</th>
                                                    <th>Nivel</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($lista_tbl_tema_a1 as $tema_a1) { ?>
                                                    <tr>
                                                        <td><?php echo $tema_a1['id']; ?></td>
                                                        <td><?php echo $tema_a1['titulo']; ?></td>
                                                        <td><?php echo $tema_a1['descripcion']; ?></td>
                                                        <td>
                                                            <?php if (!empty($tema_a1['archivo'])) { ?>
                                                                <a href="uploads/<?php echo $tema_a1['archivo']; ?>" target="_blank">Descargar</a>
                                                            <?php } else { ?>
                                                                No hay archivo
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $tema_a1['nombre_nivel']; ?></td>
                                                        <td>
                                                            <a href="editar_tema.php?txtID=<?php echo $tema_a1['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                            <a href="javascript:borrar(<?php echo $tema_a1['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <br>
                    <!-- Tabla para mostrar archivos subidos (Sección 2) -->
                    <div class="unidad">
                        <h1>Materiales disponibles - Sección A2</h1>
                        <div class="card-header" style="background-color: bisque;">
                            <div class="card-body-xl" style="background-color: azure;">
                                <div class="table-responsive">
                                    <table class="table" id="tabla_id_2">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descripción</th>
                                                <th>Archivo</th>
                                                <th>Nivel</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_tbl_tema_a2 as $tema_a2) { ?>
                                                <tr>
                                                    <td><?php echo $tema_a2['id']; ?></td>
                                                    <td><?php echo $tema_a2['titulo']; ?></td>
                                                    <td><?php echo $tema_a2['descripcion']; ?></td>
                                                    <td>
                                                        <?php if (!empty($tema_a2['archivo'])) { ?>
                                                            <a href="uploads/<?php echo $tema_a2['archivo']; ?>" target="_blank">Descargar</a>
                                                        <?php } else { ?>
                                                            No hay archivo
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $tema_a2['nombre_nivel']; ?></td>
                                                    <td>
                                                        <a href="editar_tema.php?txtID=<?php echo $tema_a2['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                        <a href="javascript:borrar(<?php echo $tema_a2['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Tabla para mostrar archivos subidos (Sección 3) -->
                    <div class="unidad">
                        <h1>Materiales disponibles - Sección B1</h1>
                        <div class="card-header" style="background-color: bisque;">
                            <div class="card-body-xl" style="background-color: azure;">
                                <div class="table-responsive">
                                    <table class="table" id="tabla_id_3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descripción</th>
                                                <th>Archivo</th>
                                                <th>Nivel</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_tbl_tema_b1 as $tema_b1) { ?>
                                                <tr>
                                                    <td><?php echo $tema_b1['id']; ?></td>
                                                    <td><?php echo $tema_b1['titulo']; ?></td>
                                                    <td><?php echo $tema_b1['descripcion']; ?></td>
                                                    <td>
                                                        <?php if (!empty($tema_b1['archivo'])) { ?>
                                                            <a href="uploads/<?php echo $tema_b1['archivo']; ?>" target="_blank">Descargar</a>
                                                        <?php } else { ?>
                                                            No hay archivo
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $tema_b1['nombre_nivel']; ?></td>
                                                    <td>
                                                        <a href="editar_tema.php?txtID=<?php echo $tema_b1['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                        <a href="javascript:borrar(<?php echo $tema_b1['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Tabla para mostrar archivos subidos (Sección 4) -->
                    <div class="unidad">
                        <h1>Materiales disponibles - Sección B2</h1>
                        <div class="card-header" style="background-color: bisque;">
                            <div class="card-body-xl" style="background-color: azure;">
                                <div class="table-responsive">
                                    <table class="table" id="tabla_id_4">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descripción</th>
                                                <th>Archivo</th>
                                                <th>Nivel</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_tbl_tema_b2 as $tema_b2) { ?>
                                                <tr>
                                                    <td><?php echo $tema_b2['id']; ?></td>
                                                    <td><?php echo $tema_b2['titulo']; ?></td>
                                                    <td><?php echo $tema_b2['descripcion']; ?></td>
                                                    <td>
                                                        <?php if (!empty($tema_b2['archivo'])) { ?>
                                                            <a href="uploads/<?php echo $tema_b2['archivo']; ?>" target="_blank">Descargar</a>
                                                        <?php } else { ?>
                                                            No hay archivo
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $tema_b2['nombre_nivel']; ?></td>
                                                    <td>
                                                        <a href="editar_tema.php?txtID=<?php echo $tema_b2['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                        <a href="javascript:borrar(<?php echo $tema_b2['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Tabla para mostrar archivos subidos (Sección 5) -->
                    <div class="unidad">
                        <h1>Materiales disponibles - Sección C1</h1>
                        <div class="card-header" style="background-color: bisque;">
                            <div class="card-body-xl" style="background-color: azure;">
                                <div class="table-responsive">
                                    <table class="table" id="tabla_id_5">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descripción</th>
                                                <th>Archivo</th>
                                                <th>Nivel</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_tbl_tema_c1 as $tema_c1) { ?>
                                                <tr>
                                                    <td><?php echo $tema_c1['id']; ?></td>
                                                    <td><?php echo $tema_c1['titulo']; ?></td>
                                                    <td><?php echo $tema_c1['descripcion']; ?></td>
                                                    <td>
                                                        <?php if (!empty($tema_c1['archivo'])) { ?>
                                                            <a href="uploads/<?php echo $tema_c1['archivo']; ?>" target="_blank">Descargar</a>
                                                        <?php } else { ?>
                                                            No hay archivo
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $tema_c1['nombre_nivel']; ?></td>
                                                    <td>
                                                        <a href="editar_tema.php?txtID=<?php echo $tema_c1['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                        <a href="javascript:borrar(<?php echo $tema_c1['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Tabla para mostrar archivos subidos (Sección 6) -->
                    <div class="unidad">
                        <h1>Materiales disponibles - Sección C2</h1>
                        <div class="card-header" style="background-color: bisque;">
                            <div class="card-body-xl" style="background-color: azure;">
                                <div class="table-responsive">
                                    <table class="table" id="tabla_id_6">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descripción</th>
                                                <th>Archivo</th>
                                                <th>Nivel</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($lista_tbl_tema_c2 as $tema_c2) { ?>
                                                <tr>
                                                    <td><?php echo $tema_c2['id']; ?></td>
                                                    <td><?php echo $tema_c2['titulo']; ?></td>
                                                    <td><?php echo $tema_c2['descripcion']; ?></td>
                                                    <td>
                                                        <?php if (!empty($tema_c2['archivo'])) { ?>
                                                            <a href="uploads/<?php echo $tema_c2['archivo']; ?>" target="_blank">Descargar</a>
                                                        <?php } else { ?>
                                                            No hay archivo
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $tema_c2['nombre_nivel']; ?></td>
                                                    <td>
                                                        <a href="editar_tema.php?txtID=<?php echo $tema_c2['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                        <a href="javascript:borrar(<?php echo $tema_c2['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
            </div>    
            <br>
            <br>
            </div>
        </body>
    <br>
    <br>
    <!-- <div class="text-center">
        <a class="btn btn-info" href="index.php" role="button">
            <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
        </a>
    </div> -->

<?php include("../templates_doc/footer_doc.php"); ?>
