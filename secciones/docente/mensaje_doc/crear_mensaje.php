<?php 
    include ("../../../bd.php");
    include("../templates_doc/header_doc.php");
    
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    
    if($_POST){
        print_r($_POST);

        $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"]: "";
        $cuerpo = (isset($_POST["cuerpo"])) ? $_POST["cuerpo"]: "";
        $fecha = date('Y-m-d H:i:s'); 
        
        /* $fecha_db = "2024-08-07 14:30:00"; */ // Ejemplo de fecha obtenida de la base de datos
        
        
        //Preparamos la insercción de los datos.
        $sentencia = $conexion->prepare("INSERT INTO tbl_noticia (`id`, `fecha`,`titulo`, `cuerpo`) VALUES (null, :fecha, :titulo, :cuerpo)");
        
        $sentencia->bindParam(":fecha",$fecha);
        $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":cuerpo",$cuerpo);
        $sentencia->execute();
        
        //Mensaje de Registro Agregado (Sweet alert).
        $fecha_formateada = date('d/m/Y H:i:s', strtotime($fecha));
        /* echo $fecha_formateada; */ // Mostrará la fecha en el formato deseado
        
        $mensaje="Mensaje Creado";
        header("Location:index.php?mensaje=".$mensaje);
    }
?>
<br>

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
        <div class="container mt-5" style="background-color:azure">
            <h1>Enviar Mensaje</h1>
            <form action="" method="post" enctype="multipart/form-data">
                
                <!-- <label for="fecha" class="form-label"><h4>Fecha:</h4></label>
                <input type="date" class="form-control" name="fecha" id="fecha"><br> -->
                
                <label for="titulo" class="form-label"><h4>Para:</h4></label>
                <input type="text" class="form-control" name="titulo" id="titulo"><br>
                
                <label for="titulo" class="form-label"><h4>Asunto:</h4></label>
                <input type="text" class="form-control" name="titulo" id="titulo"><br>
                
                <label for="cuerpo" class="form-label"><h3>Mensaje:</h3></label>
                <textarea class="form-control" name="cuerpo" id="cuerpo" rows="10" cols="50"></textarea><br>
                
                <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                <button type="submit" class="btn btn-success">Agregar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                <!-- <input type="submit" value="Enviar Noticia"> -->
                
            </form>    
        </div>

        </body>
        <br>
        
    <?php include ("../templates_doc/footer_doc.php"); ?>
</html>  