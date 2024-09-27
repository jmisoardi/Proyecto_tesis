    <?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    

   /*  $usuario = $_SESSION['usuario'];
     // Verificamos si se envió el formulario para crear un mensaje
    if ($_POST) {
        $id_remitente = $_SESSION['id_usuario']; // ID del usuario en sesión
        $id_destinatario = $_POST['id_destinatario']; // ID del destinatario del mensaje
        $asunto = $_POST['asunto'];
        $cuerpo = $_POST['cuerpo'];
        $email_destinatario = $_POST['email_destinatario']; // Email del destinatario

        // Insertamos el mensaje en la base de datos
        $sentencia = $conexion->prepare("INSERT INTO tbl_mensaje (id_remitente, id_destinatario, asunto, cuerpo, fecha_envio) VALUES (:id_remitente, :id_destinatario, :asunto, :cuerpo, NOW())");
        $sentencia->bindParam(':id_remitente', $id_remitente);
        $sentencia->bindParam(':id_destinatario', $id_destinatario);
        $sentencia->bindParam(':asunto', $asunto);
        $sentencia->bindParam(':cuerpo', $cuerpo);
        $sentencia->execute();
    }
        
    // Obtenemos el id del usuario en sesión;
    $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario limit 1");
    $sentencia->bindParam(':usuario', $usuario);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    $id_usuario = $resultado['id'];
 */
    

    
    // Incluir el autoload de Composer
    require '../../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Variable para almacenar mensajes de éxito o error
    $msg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Verificar que los campos requeridos del formulario estén completos
        if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            // Crear una nueva instancia de PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com'; // Cambia esto por el servidor SMTP que uses
                $mail->SMTPAuth = true;
                $mail->Username = 'tu_correo@example.com'; // Cambia esto a tu correo
                $mail->Password = 'tu_contraseña'; // Cambia esto a tu contraseña
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587; // Puerto SMTP
                // Configuración del correo
                $mail->setFrom('tu_correo@example.com', 'Nombre Remitente'); // Remitente
                $mail->addAddress($email); // Destinatario (del formulario)
                $mail->Subject = $subject; // Asunto (del formulario)
                $mail->Body    = $message; // Mensaje (del formulario)
                // Enviar el correo
                $mail->send();
                $msg = 'Mensaje enviado correctamente';
            } catch (Exception $e) {
                $msg = "Error al enviar el mensaje: {$mail->ErrorInfo}";
            }
        } else {
            $msg = 'Por favor, complete todos los campos del formulario.';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/styles_mensaje-doc.css">
    <link rel="stylesheet" href="../../../css/styles.css">
    <title>Enviar Mensaje</title>
        
    </head>
    <br>
        <body>
            <div class="container">
                <h1>Enviar Mensaje</h1>
                <?php if ($msg != ''): ?>
                    <div class="msg <?php echo strpos($msg, 'Error') === false ? 'success' : 'error'; ?>">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Correo del destinatario:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Asunto:</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Enviar</button>
                </form>
            </div>
        </body>
</html>
<br>
<br>
<?php include("../templates_doc/footer_doc.php") ?>
