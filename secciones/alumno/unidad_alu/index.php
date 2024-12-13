<?php
    session_start();
    include("../../../bd.php");

    // Obtener el nivel asignado al docente desde la tabla tbl_persona
    $descripcion = "Usted se encuentra en la Sección ";
    $descripcion_material = "Unidades de Estudio";
        // Obtener el usuario de la sesión
    $usuario_sesion = $_SESSION['usuario'];

    // Consulta para obtener el nivel asignado al alumno
    $sentencia = $conexion->prepare("SELECT nivel_asignado FROM tbl_persona WHERE usuario = :usuario");
    $sentencia->bindParam(":usuario", $usuario_sesion, PDO::PARAM_STR);
    $sentencia->execute();
    $nivel_asignado = $sentencia->fetchColumn();

    // Consulta para obtener los materiales habilitados del nivel asignado
    $sentencia = $conexion->prepare("SELECT tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel
                                    FROM tbl_tema
                                    LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id
                                    WHERE tbl_tema.habilitado = 1 AND tbl_tema.nivel_id = :nivel_asignado");
    $sentencia->bindParam(":nivel_asignado", $nivel_asignado, PDO::PARAM_INT);
    $sentencia->execute();
    $materiales = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para obtener el nombre del nivel del alumno
    $sentencia = $conexion->prepare("SELECT nombre_nivel FROM tbl_nivel WHERE id = :nivel_asignado");
    $sentencia->bindParam(":nivel_asignado", $nivel_asignado, PDO::PARAM_INT);
    $sentencia->execute();
    $nombre_nivel_ALUMNO = $sentencia->fetchColumn();
?>

<?php include("../templates_alu/header_alu.php");?>

<!-- Tabla para mostrar -->
<style> 
            h1 {
                text-align: center; font-family: Georgia, sans-serif;
            }
            </style>
                <br>
                <h1>-Materiales disponibles-</h1>
                <br>
                <div class="unidad" style="width: auto; height: auto; border: 1px solid #000;">
                    <div class="card-header" style="background-color:bisque;">
                        <h2><?php echo "$descripcion"."$nombre_nivel_ALUMNO "."-"." $descripcion_material"?></h2>
                        <div class="card-body-sm" style="background-color: azure;">
                            <div class="table-responsive">
                                
                                <table class="table" id="tabla_id_1">
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Título</th>
                                            <th>Descripción</th>
                                            <th>Archivo</th>
                                            <th>Nivel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($materiales as $tema_a1) { ?>
                                            <tr>
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
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

<br><br>
<?php include("../templates_alu/footer_alu.php");?>