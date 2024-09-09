
<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    // Verifica si la sesión de usuario está establecida
    $url_base = "http://localhost/Proyecto_tesis/";
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit(); // Detiene la ejecución del script después de redirigir
    } else {
        
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Conectar a la base de datos
            $unidad = $_POST['unidad'];
            $titulo = $_POST['titulo'];
            $archivo = $_FILES['archivo'];
        
            // Verificar si el archivo es un PDF
            if ($archivo['type'] == 'application/pdf') {
                // Definir una ruta para guardar el archivo
                $nombreArchivo = time() . '_' . $archivo['name'];
                $rutaDestino = '../../../uploads/' . $nombreArchivo;
        
                // Mover el archivo subido a la carpeta
                if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                    // Insertar los datos en la base de datos
                    $query = "INSERT INTO tbl_material (unidad, titulo, archivo) VALUES (?, ?, ?)";
                    $stmt = $conexion->prepare($query);
                    $stmt->bindparam(1, $unidad);
                    $stmt->bindparam(2, $titulo);
                    $stmt->bindparam(3, $nombreArchivo);
                    $stmt->execute();
        
                    echo "Material subido exitosamente";
                } else {
                    echo "Error al subir el archivo";
                }
            } else {
                echo "Solo se permiten archivos PDF.";
            }
        }
?>
        
        <!-- Formulario para subir material -->
        <div class="unidad">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <label for="unidad">Unidad:</label>
                <input type="text" id="unidad" name="unidad" required><br>
        
                <label for="titulo">Título del Material:</label>
                <input type="text" id="titulo" name="titulo" required><br>
        
                <label for="archivo">Seleccionar archivo PDF:</label>
                <input type="file" id="archivo" name="archivo" accept=".pdf" required><br><br>
        
                <input type="submit" value="Subir Material">
            </form>
        </div>
    
    <?php include("../templates_doc/footer_doc.php"); ?>
        
    