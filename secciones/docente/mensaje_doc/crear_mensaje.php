<?php 
    include ("../../../bd.php");
    include("../templates_doc/header_doc.php");
    
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    
    if($_POST){
        // Capturamos los datos del formulario
        $destinatario_email = (isset($_POST["destinatario"])) ? $_POST["destinatario"]: "";
        $asunto = (isset($_POST["asunto"])) ? $_POST["asunto"]: "";
        $cuerpo = (isset($_POST["cuerpo"])) ? $_POST["cuerpo"]: "";
        $fecha = date('Y-m-d H:i:s'); 
        
        // Obtener el ID del remitente desde la sesión
        $remitente_id = $_SESSION['id_usuario'];  

        // Consulta para obtener el ID y nombre del destinatario utilizando su email
        $sentencia = $conexion->prepare("SELECT id, nombre FROM tbl_persona WHERE email = :email");
        $sentencia->bindParam(':email', $destinatario_email);
        $sentencia->execute();
        $destinatario = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        // Si no se encuentra el destinatario, mostrar un error o manejar el caso
        if (!$destinatario) {
            echo "El destinatario no existe.";
            exit();
        }

        $destinatario_id = $destinatario['id'];

        // Insertar el mensaje en la base de datos
        $sentencia = $conexion->prepare("
            INSERT INTO tbl_mensaje 
            (id_remitente, destinatario_nombre, asunto, cuerpo, fecha_envio) 
            VALUES 
            (:id_remitente, :destinatario_nombre, :asunto, :cuerpo, :fecha_envio)
        ");
        
        $sentencia->bindParam(':id_remitente', $remitente_id);
        $sentencia->bindParam(':destinatario_nombre', $destinatario_id);
        $sentencia->bindParam(':asunto', $asunto);
        $sentencia->bindParam(':cuerpo', $cuerpo);
        $sentencia->bindParam(':fecha_envio', $fecha);
        $sentencia->execute();
        
        // Redirigir al usuario con un mensaje de éxito
        $mensaje="Mensaje Enviado";
        header("Location:index.php?mensaje=".$mensaje);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <body>
        <style> 
            h1 {
                text-align: center; font-family: Georgia, sans-serif;
            }
        </style>

        <form action="procesar_mensaje.php" method="POST">
            <div class="form-group">
                <label for="destinatario">Destinatario (Correo Electrónico):</label>
                <input type="email" name="destinatario" id="destinatario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" name="asunto" id="asunto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cuerpo">Mensaje:</label>
                <textarea name="cuerpo" id="cuerpo" class="form-control" rows="5" required></textarea>
            </div>
            <br>
            <button   type="submit" class="btn btn-primary">Enviar</button>
            <div class="text-center">
                <a name="" id="" class="btn btn-info" href="index.php" role="button">
                    <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
                </a>
            </div>
        </form>
    </body>
</html>
