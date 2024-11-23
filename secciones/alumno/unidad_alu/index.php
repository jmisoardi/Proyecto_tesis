<?php
    session_start();
    include("../../../bd.php");

    /* // Verifica si el usuario es un alumno
    if ($_SESSION['rol'] !== 'alumno') {
        header("Location: ../../../index.php");
        exit;
    } */

    // Consulta para obtener el material habilitado
    $sentencia = $conexion->prepare("SELECT tbl_tema.titulo, tbl_tema.descripcion, tbl_tema.archivo, tbl_nivel.nombre_nivel
                                    FROM tbl_tema
                                    LEFT JOIN tbl_nivel ON tbl_tema.nivel_id = tbl_nivel.id
                                    WHERE tbl_tema.habilitado = 1");
    $sentencia->execute();
    $materiales = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../templates_alu/header_alu.php");?>

<div class="container">
    <h1 class="text-center mt-4">Materiales Disponibles</h1>
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Nivel</th>
                    <th>Archivo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materiales as $material) { ?>
                    <tr>
                        <td><?php echo $material['titulo']; ?></td>
                        <td><?php echo $material['descripcion']; ?></td>
                        <td><?php echo $material['nombre_nivel']; ?></td>
                        <td>
                            <?php if (!empty($material['archivo'])) { ?>
                                <a href="/Proyecto_tesis/uploads/<?php echo $material['archivo']; ?>" target="_blank">Descargar</a>
                            <?php } else { ?>
                                No disponible
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<br><br>
<?php include("../templates_alu/footer_alu.php");?>