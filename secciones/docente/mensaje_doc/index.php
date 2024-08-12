
<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php")?>


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
            <br>
            <div style="margin-bottom: 10px;">
                <button onclick="window.location.href='templates_men/vista_men_enviados.php'">Ver Mensajes Enviados</button>
                <button onclick="window.location.href='templates_men/vista_men_recibidos.php'">Ver Mensajes Recibidos</button>
            </div>
            <br>
            <br>
            <h1>Mensajes</h1>

                <!-- Botones de navegación -->

                <form action="send_message.php" method="post" enctype="multipart/form-data">
                    <label for="receiver">Para:</label>
                    <div class="mb-3">
                        <label for="" class="form-label">Correo:</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="" />
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                        <!-- Continuar con otros usuarios -->
                    <label for="subject">Asunto:</label>
                    <input type="text"class="form-control" name="subject" id="subject" required>
                    <br>
                    <label for="message">Mensaje:</label>
                    <textarea class="form-control"name="message" id="message" required></textarea>
                    <br>
                    <!-- <label for="attachment">Adjuntar archivo:</label>
                    <input type="file" class="form-control" name="attachment" id="attachment"> -->
                    <br>
                    
                    <button type="submit">Enviar Mensaje</button>
                    <br>
                    <br>
                </form>
        </div>
    </body>
</html>
<br><br>
<?php include("../templates_doc/footer_doc.php")?>