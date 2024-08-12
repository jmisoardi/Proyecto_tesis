
<?php 
    include("../../../bd.php");
    include("../templates/header.php")?>


<br>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mensajes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <body>
        <div class="container mt-5" style="background-color:azure">
            <h1>Mensajes</h1>
                <form action="send_message.php" method="post" enctype="multipart/form-data">
                    <label for="receiver">Para:</label>
                    <select class="form-control" name="receiver" id="receiver">
                        <!-- Aquí se deben listar los usuarios disponibles -->
                        <option value="1">Docente 1</option>
                        <option value="2">Alumno 1</option>
                        <!-- Continuar con otros usuarios -->
                    </select>
                    <br>
                    <label for="subject">Asunto:</label>
                    <input type="text"class="form-control" name="subject" id="subject" required>
                    <br>
                    <label for="message">Mensaje:</label>
                    <textarea class="form-control"name="message" id="message" required></textarea>
                    <br>
                    <label for="attachment">Adjuntar archivo:</label>
                    <input type="file" class="form-control" name="attachment" id="attachment">
                    <br>
                    
                    <button type="submit">Enviar Mensaje</button>
                    <br>
                    <br>
                </form>
        </div>
    </body>
</html>
<br><br>
<?php include("../templates/footer.php")?>