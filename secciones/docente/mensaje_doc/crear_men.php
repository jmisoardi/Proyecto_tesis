<?php 
    session_start();
    // Incluir base de datos
    include("../../../bd.php");

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
                    $mail->Host = 'smtp-relay.brevo.com'; // Servidor SMTP de Hotmail/Outlook
                    $mail->SMTPAuth = true;
                    $mail->Username = '7d22be001@smtp-brevo.com'; // Tu dirección de correo Hotmail
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
                    $msg = 'Mensaje enviado correctamente al destinatario';
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

<?php include("../templates_doc/header_doc.php"); ?>
<head>
    <link rel="stylesheet" href="../../../css/styles_mensaje.css">
    <title>Enviar Mensaje</title>
</head>
    <body>
        <div class="contenedor-mensaje">
            <div class="card mx-auto" style="max-width: 500px;">
                <div class="card-header" style="background-color:bisque">    
                    <h1 style="text-align: center; font-family: Georgia, sans-serif;">-Correo Electrónico-</h1>
                </div>
            </div>
            <br>
            <div class="card mx-auto" style="max-width: 900px;">
                <div class="container-fluid py-5" style="background-color:azure">
                    <?php if ($msg != ''): ?>
                        <div class="msg <?php echo strpos($msg, 'Error') === false ? 'success' : 'error'; ?>">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        
                        <!-- Formulario para los datos del envío de mensaje -->
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
                            
                            <div class="text-center">    
                                <a name="" id="" class="btn btn-info" href="index.php" role="button">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php include("../templates_doc/footer_doc.php") ?>
