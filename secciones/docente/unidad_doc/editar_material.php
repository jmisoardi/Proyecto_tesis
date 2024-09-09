<?php
include("../../../bd.php");
include("../templates_doc/header_doc.php");

$url_base = "http://localhost/Proyecto_tesis/";

if (!isset($_SESSION['usuario'])) {
    header("Location: " . $url_base . "login.php");
    exit();
}

$id = $_GET['id'] ?? null;

// Obtener los datos actuales del material
$query = "SELECT * FROM tbl_material WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bindParam(1, $id);
$stmt->execute();
$material = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $unidad = $_POST['unidad'];
    $titulo = $_POST['titulo'];

    if (isset($_FILES['archivo']) && $_FILES['archivo']['type'] == 'application/pdf') {
        $nombreArchivo = time() . '_' . $_FILES['archivo']['name'];
        $rutaDestino = '../../../uploads/' . $nombreArchivo;
        move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaDestino);

        // Actualizar con nuevo archivo
        $query = "UPDATE tbl_material SET unidad = ?, titulo = ?, archivo = ? WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(1, $unidad);
        $stmt->bindParam(2, $titulo);
        $stmt->bindParam(3, $nombreArchivo);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    } else {
        // Actualizar sin cambiar el archivo
        $query = "UPDATE tbl_material SET unidad = ?, titulo = ? WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(1, $unidad);
        $stmt->bindParam(2, $titulo);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    }

    echo "Material actualizado exitosamente";
}
?>

<!-- Formulario para editar material -->
<div class="unidad">
    <form action="editar_material.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <label for="unidad">Unidad:</label>
        <input type="text" id="unidad" name="unidad" value="<?php echo htmlspecialchars($material['unidad']); ?>" required><br>

        <label for="titulo">Título del Material:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($material['titulo']); ?>" required><br>

        <label for="archivo">Seleccionar archivo PDF (opcional):</label>
        <input type="file" id="archivo" name="archivo" accept=".pdf"><br><br>

        <input type="submit" value="Actualizar Material">
    </form>
</div>

<?php include("../templates_doc/footer_doc.php"); ?>
