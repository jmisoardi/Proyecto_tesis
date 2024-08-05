<?php include("../../templates/header.php");?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <!--Estilo para el titulo Personal-->
    <style> 
        h1 {
            text-align: center; font-family: Georgia, sans-serif;
            }
        h2 {
            text-align: center; font-family: Georgia, sans-serif;
        }
    </style>
    
    <div class="container mt-5" style="background-color:azure">
        <h1>Enviar Noticia</h1>
            <form action="send_news.php" method="post">
        
                <label for="title" class="form-label"><h3>Título:</h3></label>
                    <input type="text" id="title" name="title" required><br>
                
                <label for="message" class="form-label"><h3>Mensaje:</h3></label>
                    <textarea class="form-control"id="message" name="message" rows="10" cols="50" required></textarea><br>
            
                <input type="submit" value="Enviar Noticia">
            </form>    
    </div>
</body>
</html>

<?php include("../../templates/footer.php");?>
