<?php 
include("../../../bd.php");
include("../templates_doc/header_doc.php");

// Incluir el autoload de Composer
require '../../../vendor/autoload.php';

$usuario = $_SESSION['usuario'];

//Zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar las variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

// Variable para almacenar mensajes de éxito o error
$msg = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verificar que los campos requeridos del formulario estén completos
        if (isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $fecha = date('Y-m-d H:i:s');

            // Obtener el ID del remitente desde la sesión
            $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario limit 1");
            $sentencia->bindParam(':usuario', $usuario);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

            $remitente_id = $resultado['id'];;  

            // Consulta para obtener el ID del destinatario utilizando su email
            $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE email = :email");
            $sentencia->bindParam(':email', $email);
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
                (id_remitente, id_destinatario, email, subject, message, fecha_envio) 
                VALUES 
                (:id_remitente, :id_destinatario, :email, :subject, :message, :fecha_envio)
            ");
            
            $sentencia->bindParam(':id_remitente', $remitente_id);
            $sentencia->bindParam(':id_destinatario', $destinatario_id);
            $sentencia->bindParam(':email', $email);
            $sentencia->bindParam(':subject', $subject);
            $sentencia->bindParam(':message', $message);
            $sentencia->bindParam(':fecha_envio', $fecha);
            $sentencia->execute();
            
            // Crear una nueva instancia de PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.office365.com'; // Servidor SMTP de Hotmail/Outlook
                $mail->SMTPAuth = true;
                $mail->Username = 'jmisoardi@hotmail.com'; // Tu dirección de correo Hotmail
                $mail->Password = $_ENV['EMAIL_PASSWORD']; // Obtener la contraseña desde .env
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Seguridad
                $mail->Port = 587; // Puerto SMTP

                // Configuración del correo
                $mail->setFrom('jmisoardi@hotmail.com', 'BridgeClass-Jair'); // Remitente
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
    // Consulta para obtener todos los correos electrónicos de los usuarios
    $sentencia_usuarios = $conexion->prepare("SELECT email, nombre FROM tbl_persona");
    $sentencia_usuarios->execute();
    $usuarios = $sentencia_usuarios->fetchAll(PDO::FETCH_ASSOC);
?>
<br>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/styles_mensaje-doc.css">
    <link rel="stylesheet" href="../../../css/styles.css">
    <title>Enviar Mensaje</title>
</head>
<body>
    <div class="container">
        <style> 
            h3 {
                text-align: center; font-family: Georgia, sans-serif;
                }
        </style>
        <h3>Enviar Mensaje</h3>
        <?php if ($msg != ''): ?>
            <div class="msg <?php echo strpos($msg, 'Error') === false ? 'success' : 'error'; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
        <div class="form-group">
                <label for="email">Destinatario (Correo Electrónico):</label>
                <select name="email" id="email" class="form-control" required>
                    <option value="" disabled selected>Selecciona un destinatario</option>
                    <?php foreach($usuarios as $usuario): ?>
                        <option value="<?php echo $usuario['email']; ?>">
                            <?php echo $usuario['nombre']; ?> - <?php echo $usuario['email']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Asunto:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>
    <br>
    
</body>
<div class="text-center">
    <a name="" id="" class="btn btn-info" href="index.php" role="button">
        <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
    </a>
</div>
<br>
<br>
</html>
<?php include("../templates_doc/footer_doc.php") ?>
