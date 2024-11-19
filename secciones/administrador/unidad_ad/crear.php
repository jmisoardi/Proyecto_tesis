<?php
session_start();
include("../../../bd.php");

if ($_POST) {
    // Recibir los datos del formulario
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $nivel_id = $_POST["nivel_id"];
    $archivo = $_FILES['archivo']['name']; // Nombre del archivo subido

    // Verificar si se subió un archivo
    if ($archivo) {
        // Generar un nombre único para el archivo para evitar duplicados
        $nombreArchivo = time() . '_' . basename($archivo);
        
        // Usar ruta absoluta para guardar el archivo en la carpeta 'uploads'
        $rutaArchivo = $_SERVER['DOCUMENT_ROOT'] . "/Proyecto_tesis/uploads/" . $nombreArchivo;

        // Mover el archivo subido a la carpeta 'uploads'
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo)) {
            // Insertar los datos en la base de datos si el archivo se subió con éxito
            $sentencia = $conexion->prepare("INSERT INTO tbl_tema (titulo, descripcion, archivo, nivel_id)
                                            VALUES (:titulo, :descripcion, :archivo, :nivel_id)");
            $sentencia->bindParam(":titulo", $titulo);
            $sentencia->bindParam(":descripcion", $descripcion);
            $sentencia->bindParam(":archivo", $nombreArchivo);
            $sentencia->bindParam(":nivel_id", $nivel_id);
            $sentencia->execute();

            // Redirigir con un mensaje de éxito
            $mensaje = "Registro Agregado";
            header("Location:index.php?mensaje=" . $mensaje);
            exit;
        } else {
            // Mostrar error si el archivo no se pudo mover
            echo "Error al subir el archivo. Verifica los permisos de la carpeta 'uploads'.";
        }
    } else {
        // Mensaje de error si no se subió ningún archivo
        echo "No se seleccionó ningún archivo para subir.";
    }
}

    $sentencia = $conexion->prepare("SELECT * FROM `tbl_nivel`");
    $sentencia->execute();
    $lista_tbl_nivel = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../templates/header.php");?>
<link rel="stylesheet" href="../../../css/styles_crear_material.css">

    <!--Estilo para Materiales-->
    <body>      
        <style> 
            h1 {
                text-align: center; font-family: Georgia, sans-serif;
            }
        </style>

        <div class="contenedor-material">
            <br>
            <div class="card mx-auto" style="max-width: 500px;">
                <div class="card-header" style="background-color:bisque">    
                    <h1 style="text-align: center; font-family: Georgia, sans-serif;">-Ingreso de Material-</h1>
                </div>
            </div>
            <br>
            <div class="card mx-auto" style="max-width: 800px;">
                <div class="container-fluid py-5" style="background-color:azure">
        
                    <div class="card-body">
                        <!-- Formulario para los datos del envío de mensaje -->
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="titulo"><h5><u>Titulo</u></h5></label>
                                <input type="text" id="titulo" name="titulo" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="descripcion"><h5><u>Descripción</u></h5></label>
                                <textarea id="descripcion" name="descripcion" rows="5" required></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="archivo"><h5><u>Archivo</u></h5></label>
                                <input type="file" id="archivo" name="archivo" required>
                            </div>
                            <br>
                            <div class="mb-3">
                            <label for="nivel_id" class="form-label"><h5>Seleccione el Nivel al que pertenece:</h5></label>
                                <select
                                    class="form-select w-auto form-select-ms" name="nivel_id" id="nivel_id">
                                    <?php foreach ($lista_tbl_nivel as $registro) {?>      
                                        <option value="<?php echo $registro['id']?>">
                                                        <?php echo $registro['nombre_nivel'] ?>
                                        </option> 
                                        
                                    <?php }?>
                                </select>
                            </div>
                            <br>
                            <br>
                            <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                            <button type="submit" class="btn btn-success">Agregar</button>
                            <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <br>
    <br>
    <?php include("../templates/footer.php");?>