<!-- Dirección base del proyecto-->
<?php 
    //Comprueba si una sesión de PHP ya ha sido iniciada y, si no es así, la inicia.    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $url_base = "http://localhost/Proyecto_tesis/";
    
    // Verifica si la sesión de usuario está establecida
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['rolpersona'])) {
        header("Location: " . $url_base . "index.php"); 
    }
    
    //Verificamos el rol del usuario.
    if ($_SESSION['rolpersona'] != 'administrador') {
        header("Location: " . $url_base . "index.php"); 
        exit(); // Detener la ejecución de PHP para que el script JS funcione
    }     
?>

<!--Contiene Menu y parte del Container -->
<!doctype html>
<html lang="en">
    <head>
        <title>Administrador</title>
        
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        
        <!-- Estilo de Css -->
        <link rel="stylesheet" href="../../../css/styles.css">
        
        <!--Script para data table-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
        </script>
            <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

        <!--Script para sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
        
    </head>
        <body>
            <div class="background-adm-1"></div>
                <div class="content-adm-1"> 
                    <header style="background-color:#63cdda;  text-align:center; font-family: Georgia, sans-serif;" >
                        <h1><u>Gestión de Datos</u></h1>
                    </header>
                        <!--Corresponde a la barra de navegación que incluye Sistema, Personal, Rol, Usuario, Cerrar Sesión-->
                        <nav class="navbar navbar-expand navbar-light bg-light">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?php echo $url_base;?>secciones/administrador/home_adm/index.php" aria-current="page">Sistema<span class="visually-hidden">(current)</span></a>
                                </li>
                                <!--Ingresamos en "href php con la dirección base"-->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/personal/">Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/noticia/">Noticia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/rol/">Rol</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/mensaje_adm/">Mensaje</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/unidad_ad/">Unidad</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/usuario/">Usuarios</a>
                                </li> -->
                                <!--Se agrego para usarlo en el navegador simplemente comodidad, ver si va en la linea con Personal, rol, usuario, -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/alumno/home_alu/index.php">Alumno</a>
                                </li>
                                <!--Se agrego para usarlo en el navegador simplemente comodidad, ver si va en la linea con Personal, rol, usuario, -->                    
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/docente/home_doc/index.php">Docente</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url_base;?>secciones/administrador/cerrar_adm.php">Cerrar Sesión</a>
                                </li>
                            </ul>
                        </nav>

                    <!--Sweet alert Mensaje de confirmación-->
                    <?php if (isset($_GET['mensaje'])) { ?>
                        <script>
                            Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje']; ?>"});    
                        </script>
                    <?php } ?>
            
        </body>