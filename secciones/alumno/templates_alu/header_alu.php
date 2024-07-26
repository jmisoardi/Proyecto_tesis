<!-- Dirección base del proyecto-->
<?php 
        session_start();
        $url_base= "http://localhost/Proyecto_tesis/";
        
        //Verificamos que exista ese usuario, de lo contrario se invía al login.
        if (!isset($_SESSION['usuario'])) {
            header("Location:".$url_base."login.php");
        }else{
            
        }
?>
<!-- Archivo header.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">    
    <link rel="stylesheet" href="../../css/styles.css">
</head>
    <body>
    <div class="background-alu"></div>
    <div class="content-alu"> 
        <nav class="navbar navbar-expand navbar-light bg-info">
            <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Portal del Estudiante</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?php echo $url_base;?>secciones/alumno/index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/noticia.php">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/mensaje.php">Mensajes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/unidad.php">Unidad</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/perfil.php">Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/cerrar.php">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </div>
                </div>
        </nav>
    <!-- fin archivo header.php -->