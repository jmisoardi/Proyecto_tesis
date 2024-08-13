<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes Enviados</title>
</head>
<body>
    <style> 
            h1,h2,body,thead {
                text-align: center; font-family: Georgia, sans-serif;                
            }
    </style>       
    <br>
    <br>
        
            <h1>Mensajes Enviados</h1>
            <table border="4">
                <thead>
                    <tr>
                        <th>Destinatario</th>
                        <th>Asunto</th>
                        <th>Fecha de Envío</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <thead>
                    <!-- Ejemplo de fila de mensaje enviado -->
                    <tr>
                        <td>Usuario 2</td>
                        <td>Asunto del mensaje enviado</td>
                        <td>2024-08-12 15:00</td>
                        <td><a href="ver_mensaje.php?id=2">Ver Mensaje</a></td>
                    </tr>
                    <!-- Más filas dinámicas -->
                </thead>
            </table>
        
    <br>
    <div class="text-center">
        <a name="" id="" class="btn btn-info" href="index.php" role="button">
            <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
        </a>
    </div>
    
</body>
</html>