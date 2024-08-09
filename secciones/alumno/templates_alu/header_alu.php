<!-- Dirección base del proyecto-->
<?php 
        session_start();
        $url_base = "http://localhost/Proyecto_tesis/";

        // Verifica si la sesión de usuario está establecida
        if (!isset($_SESSION['usuario']) || !isset($_SESSION['rolpersona'])) {
            header("Location: " . $url_base . "login.php");
            exit(); // Detiene la ejecución del script después de redirigir
        } else {
                
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
    <!--Script para sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
    <body>
    <div class="background-alu"></div>
    <div class="content-alu"> 
        <nav class="navbar navbar-expand navbar-light bg-info">
            <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
                <div class="container-fluid">
                    
                    <a class="navbar-brand" href="<?php echo $url_base;?>secciones/alumno/home_alu/index.php">Portal del Estudiante</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/home_alu/index.php">
                                        <img src="../../../css/imagen_tesis/icons/inicio.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a  href="<?php echo $url_base;?>secciones/alumno/noticia_alu/index.php">
                                        <img src="../../../css/imagen_tesis/icons/noticia.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a  href="<?php echo $url_base;?>secciones/alumno/mensaje_alu/index.php">
                                        <img src="../../../css/imagen_tesis/icons/mensaje.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a  href="<?php echo $url_base;?>secciones/alumno/unidad_alu/index.php">
                                        <img src="../../../css/imagen_tesis/icons/libro.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a  href="<?php echo $url_base;?>secciones/alumno/perfil_alu/index.php">
                                        <img src="../../../css/imagen_tesis/icons/perfil.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                    </a>
                                </li>
                                <li >
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/cerrar.php">
                                        <img src="../../../css/imagen_tesis/icons/cerrar.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                    </a>
                                </li>
                            </ul>
                        </div>
                </div>
        </nav>
        <!--Sweet alert Mensaje de confirmación-->
        <?php if (isset($_GET['mensaje'])) { ?>
            <script>
                Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje']; ?>"});    
            </script>
        <?php } ?>
    <!-- fin archivo header.php -->