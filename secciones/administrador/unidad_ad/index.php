<?php 
    session_start();
    include("../../../bd.php");
    
    if (isset($_GET['txtID'])) {
        // Verificamos si está presente en la URL txtID, asignamos el valor en $_GET['txtID']
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        
         // 1. Obtener el nombre del archivo antes de eliminar el registro
        $sentencia = $conexion->prepare("SELECT archivo FROM tbl_tema WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
        $archivo = $registro['archivo'];

        // 2. Eliminar el archivo físico si existe
        $rutaArchivo = $_SERVER['DOCUMENT_ROOT'] . "/Proyecto_tesis/uploads/" . $archivo;
        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo);
        }

        // 3. Eliminar el registro de la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_tema WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
    
        // Preparamos la conexión de borrado en la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_tema WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        
        // Mensaje de Registro Eliminado
        $mensaje = "Registro Eliminado";
        header("Location:index.php?mensaje=" . $mensaje);
        
    }
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

<?php include("../templates/header.php");?>
<br><br>

    <!-- Incluye los estilos CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../../css/styles.css">

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
                <!--Estilo para el titulo Personal-->
            <style> 
                h1 {
                    text-align: center; font-family: Georgia, sans-serif;
                }
            </style>
                
                <!-- Tabla para mostrar (Sección 1) -->
                <div class="card-header" style="background-color:bisque;">
                    <br>
                    <h1>-Materiales disponibles-</h1>
                    <a name="" id="" class="btn btn-primary btn-mover-derecha" href="crear.php" role="button" >Ingresar Contenido</a>
                    <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;">
                        <h2>-Sección A0-A1-</h2>
                        <div class="card-body-sm" style="background-color: azure;">
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
                                                        <a href="/Proyecto_tesis/uploads/<?php echo $tema_a1['archivo']; ?>" target="_blank"><?php echo $tema_a1['archivo']; ?></a>
                                                    <?php } else { ?>
                                                        No hay archivo
                                                    <?php } ?>
                                                </td>


                                                <td><?php echo $tema_a1['nombre_nivel']; ?></td>
                                                <td>
                                                    <a href="editar.php?txtID=<?php echo $tema_a1['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                                                    <a href="javascript:borrar(<?php echo $tema_a1['id']; ?>);" class="btn btn-danger btn-sm">Eliminar</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                        <br>
                        <!-- Tabla para mostrar (Sección 2) -->
                <div class="card-header" style="background-color:bisque;">
                    <br>
                        <a name="" id="" class="btn btn-primary btn-mover-derecha" href="crear.php" role="button" >Ingresar Contenido</a>
                        <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;" >
                            <h2>-Sección A2-</h2>
                            <div class="card-header" style="background-color: bisque;">
                                <div class="card-body-md" style="background-color: azure;">
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
                                                                <a href="/Proyecto_tesis/uploads/<?php echo $tema_a2['archivo']; ?>" target="_blank"><?php echo $tema_a2['archivo']; ?></a>
                                                            <?php } else { ?>
                                                                No hay archivo
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $tema_a2['nombre_nivel']; ?></td>
                                                        <td>
                                                            <a href="editar.php?txtID=<?php echo $tema_a2['id']; ?>" class="btn btn-info btn-sm">Editar</a>
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
                </div>
                <br>
                <!-- Tabla para mostrar (Sección 3) -->
                <div class="card-header" style="background-color:bisque;">
                    <br>
                        <a name="" id="" class="btn btn-primary btn-mover-derecha" href="crear.php" role="button" >Ingresar Contenido</a>
                        <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;">
                            <h2>-Sección B1-</h2>
                            <div class="card-header" style="background-color: bisque;">
                                <div class="card-body-md" style="background-color: azure;">
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
                                                                <a href="/Proyecto_tesis/uploads/<?php echo $tema_b1['archivo']; ?>" target="_blank"><?php echo $tema_b1['archivo']; ?></a>
                                                            <?php } else { ?>
                                                                No hay archivo
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $tema_b1['nombre_nivel']; ?></td>
                                                        <td>
                                                            <a href="editar.php?txtID=<?php echo $tema_b1['id']; ?>" class="btn btn-info btn-sm">Editar</a>
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
                </div>
                <br>
                <!-- Tabla para mostrar (Sección 4) -->
                <div class="card-header" style="background-color:bisque;">
                    <br>
                        <a name="" id="" class="btn btn-primary btn-mover-derecha"  href="crear.php" role="button" >Ingresar Contenido</a>
                        <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;">
                            <h2>-Sección B2-</h2>
                            <div class="card-header" style="background-color: bisque;">
                                <div class="card-body-md" style="background-color: azure;">
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
                                                                <a href="/Proyecto_tesis/uploads/<?php echo $tema_b2['archivo']; ?>" target="_blank"><?php echo $tema_b2['archivo']; ?></a>
                                                            <?php } else { ?>
                                                                No hay archivo
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $tema_b2['nombre_nivel']; ?></td>
                                                        <td>
                                                            <a href="editar.php?txtID=<?php echo $tema_b2['id']; ?>" class="btn btn-info btn-sm">Editar</a>
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
                </div>
                <br>
                <!-- Tabla para mostrar (Sección 5) -->
                <div class="card-header" style="background-color:bisque;">
                    <br>
                        <a name="" id="" class="btn btn-primary btn-mover-derecha" href="crear.php" role="button" >Ingresar Contenido</a>
                        <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;">
                            <h2>-Sección C1-</h2>
                            <div class="card-header" style="background-color: bisque;">
                                <div class="card-body-md" style="background-color: azure;">
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
                                                                <a href="/Proyecto_tesis/uploads/<?php echo $tema_c1['archivo']; ?>" target="_blank"><?php echo $tema_c1['archivo']; ?></a>
                                                            <?php } else { ?>
                                                                No hay archivo
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $tema_c1['nombre_nivel']; ?></td>
                                                        <td>
                                                            <a href="editar.php?txtID=<?php echo $tema_c1['id']; ?>" class="btn btn-info btn-sm">Editar</a>
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
                </div>
                <br>
                <!-- Tabla para mostrar (Sección 6) -->
                <div class="card-header" style="background-color:bisque;">
                    <br>
                        <a name="" id="" class="btn btn-primary btn-mover-derecha" href="crear.php" role="button" >Ingresar Contenido</a>
                        <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;">
                            <h2>-Sección C2-</h2>                        
                            <div class="card-header" style="background-color: bisque;">
                                <div class="card-body-md" style="background-color: azure;">
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
                                                                <a href="/Proyecto_tesis/uploads/<?php echo $tema_c2['archivo']; ?>" target="_blank"><?php echo $tema_c2['archivo']; ?></a>
                                                            <?php } else { ?>
                                                                No hay archivo
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $tema_c2['nombre_nivel']; ?></td>
                                                        <td>
                                                            <a href="editar.php?txtID=<?php echo $tema_c2['id']; ?>" class="btn btn-info btn-sm">Editar</a>
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
<?php include("../templates/footer.php");?>