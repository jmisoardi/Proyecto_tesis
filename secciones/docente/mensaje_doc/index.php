<?php 
include("../../../bd.php");
include("../templates_doc/header_doc.php");

// Incluir el autoload de Composer
require '../../../vendor/autoload.php';

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
?>
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
<?php include("../templates_doc/footer_doc.php") ?>
