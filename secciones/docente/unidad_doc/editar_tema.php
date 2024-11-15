<?php
session_start();
include("../../../bd.php");

// Recepción del envío `txtID` para cargar los datos
if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];

    // Obtener los datos actuales del tema
    $sentencia = $conexion->prepare("SELECT * FROM tbl_tema WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $titulo = $registro["titulo"];
    $descripcion = $registro["descripcion"];
    $archivo = $registro["archivo"];
    $nivel_id = $registro["nivel_id"];

    // Obtener la lista de niveles
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_nivel`");
    $sentencia->execute();
    $lista_tbl_nivel = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

// Procesar el formulario cuando se envía
if ($_POST) {
    $txtID = $_POST['txtID'];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $nivel_id = $_POST["nivel_id"];
    $archivoNuevo = $_FILES['archivo']['name'];

    // Verificar si se subió un nuevo archivo
    if ($archivoNuevo) {
        // Generar un nombre único para el archivo nuevo
        $nombreArchivo = time() . '_' . basename($archivoNuevo);
        $rutaArchivo = $_SERVER['DOCUMENT_ROOT'] . "/Proyecto_tesis/uploads/" . $nombreArchivo;
        
        // Eliminar el archivo anterior si existe
        if ($archivo && file_exists($_SERVER['DOCUMENT_ROOT'] . "/Proyecto_tesis/uploads/" . $archivo)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/Proyecto_tesis/uploads/" . $archivo);
        }
        // Mover el archivo subido a la carpeta 'uploads'
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo)) {
            // Actualizar el nombre del archivo en la base de datos
            $sentencia = $conexion->prepare("UPDATE tbl_tema SET archivo=:archivo WHERE id=:id");
            $sentencia->bindParam(":archivo", $nombreArchivo);
            $sentencia->bindParam(":id", $txtID);
            $sentencia->execute();
        } else {
            echo "Error al subir el nuevo archivo. Verifica los permisos de la carpeta 'uploads'.";
        }
    }

    // Actualizar los demás datos del tema
    $sentencia = $conexion->prepare("UPDATE tbl_tema
                                    SET titulo=:titulo, descripcion=:descripcion, nivel_id=:nivel_id
                                    WHERE id=:id");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":nivel_id", $nivel_id);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    // Redirigir con un mensaje de éxito
    $mensaje = "Registro Actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
    exit;
}
?>


<?php include("../templates_doc/header_doc.php");?>
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
                    <h1 style="text-align: center; font-family: Georgia, sans-serif;">-Actualizar Contenido-</h1>
                </div>
            </div>
            <br>
            <div class="card mx-auto" style="max-width: 800px;">
                <div class="container-fluid py-5" style="background-color:azure">
        
                    <div class="card-body">
                        <!-- Formulario para los datos del envío de mensaje -->
                        <form action="" method="post" enctype="multipart/form-data" style="background-color:azure">
                            <div class="mb-3">
                                <label for="txtID" class="form-label">ID:</label>
                                <!--En este input se encuentra el readonly es que un atributo de lectura solamente, el usuario no puede modificar el valor-->
                                <input type="text" 
                                    value= "<?php echo $txtID; ?>"
                                    class="form-control w-auto" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />    
                            </div>        
                            <div class="form-group">
                                <label for="titulo"><h5><u>Titulo</u></h5></label>
                                <input type="text"  
                                    value= "<?php echo $titulo; ?>" id="titulo" name="titulo" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="descripcion"><h5><u>Descripción</u></h5></label>
                                <textarea id="descripcion" name="descripcion" rows="5"><?php echo $descripcion; ?></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="archivo"><h5><u>Archivo</u></h5></label>
                                <input type="file" id="archivo" name="archivo">
                                <br>
                                <?php if (!empty($archivo)) { ?>
                                    <p>Archivo actual: <a href="../uploads/<?php echo $archivo; ?>" target="_blank"><?php echo $archivo; ?></a></p>
                                <?php } ?>
                            </div>

                            <!-- <div class="form-group">
                                <label for="archivo"><h5><u>Archivo</u></h5></label>
                                <input type="file" 
                                    value= ""  id="archivo" name="archivo" required>
                            </div> -->
                            <br>
                            <div class="mb-3">
                                <label for="nivel_id" class="form-label"><h5><u>Nivel:</u></h5></label>
                                    <select
                                        class="form-select w-auto form-select-ms" name="nivel_id" id="nivel_id">
                                        <?php foreach ($lista_tbl_nivel as $registro) {?>      
                                            <option <?php echo ($nivel_id== $registro['id'])? "selected" : ""; ?> value ="<?php echo $registro['id']?>">
                                                                                                                        <?php echo $registro['nombre_nivel']?>
                                            </option>
                                        <?php }?>
                                    </select>
                            </div>
                            <br>
                            <br>
                            <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <br>
    <br>
<?php include("../templates_doc/footer_doc.php"); ?>