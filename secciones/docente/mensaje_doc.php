
<?php include("templates_doc/header_doc.php")?>
<br>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body>
        <div class="container mt-5" style="background-color:azure">
            <h1>Mensajes</h1>
                <form action="send_message.php" method="post" enctype="multipart/form-data">
                    <label for="receiver">Para:</label>
                    <select name="receiver" id="receiver">
                        <!-- Aquí se deben listar los usuarios disponibles -->
                        <option value="1">Docente 1</option>
                        <option value="2">Alumno 1</option>
                        <!-- Continuar con otros usuarios -->
                    </select>

                        <label for="subject">Asunto:</label>
                    <input type="text" name="subject" id="subject" required>

                    <label for="message">Mensaje:</label>
                    <textarea name="message" id="message" required></textarea>

                    <label for="attachment">Adjuntar archivo:</label>
                    <input type="file" name="attachment" id="attachment">

                    <button type="submit">Enviar Mensaje</button>
                </form>
        </div>
    </body>
</html>
<br><br>
<?php include("templates_doc/footer_doc.php")?>