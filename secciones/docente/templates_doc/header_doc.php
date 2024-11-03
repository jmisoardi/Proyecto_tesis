<!-- Dirección base del proyecto-->
<?php  
    /* session_start(); */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $url_base = "http://localhost/Proyecto_tesis/";
    
    // Verifica si la sesión de usuario está establecida
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['rolpersona'])) {
        header("Location: " . $url_base . "index.php");
        exit();
    }

    // Verificamos el rol de usuario
    if ($_SESSION['rolpersona'] != 'docente' && $_SESSION['rolpersona'] != 'administrador') {
        $_SESSION['error_message'] = "USTED NO TIENE ACCESO A ESTA SECCION.";
        header("Location: " . $url_base . "index.php");
        exit();
    }
    
    /* $usuario_doc = $_SESSION['usuario']; */

    /* Seleccionamos datos de la table Persona */
   /*  $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario LIMIT 1 ");
    $sentencia->bindParam(':usuario', $usuario_doc); 
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $id_usuario = $resultado['id']; // Guardamos el ID en una variable
    } else {
        // Manejar el caso en que no se encuentre el usuario
        $_SESSION['error_message'] = "Usuario no encontrado.";
        header("Location: " . $url_base . "index.php");
        exit();
    } */
?>
<!-- Archivo header.php -->
<!doctype html>
<html lang="es">
    <head>
        <title>Docente</title>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Estilo de Css -->
        <link rel="stylesheet" href="../../css/styles.css">
        <link rel="stylesheet" href="../../../css/styles.css">
        
        <!--Script para data table-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        
        <!--Script para sweet alert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    </head>
        
        <body>
            <div class="background-doc"></div>
            <div class="content-doc"> 
                <nav class="navbar navbar-expand navbar-light bg-info">
                    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
                    <div class="container-fluid">
                        <!-- Portal de Docente, con el direccionamiento -->                                                                                                                                            
                        <a class="navbar-brand" href="<?php echo $url_base;?>secciones/docente/home_doc/index.php">Portal del Docente</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <!-- Distintas seccion del aula docente -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $url_base;?>secciones/docente/home_doc/index.php">
                                            <img src="../../../css/imagen_tesis/icons/inicio.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                        </a>
                                    </li>
                                    <!-- Seccion noticia -->
                                    <li class="nav-link">
                                        <a href="<?php echo $url_base;?>secciones/docente/noticia_doc/index.php">
                                            <img src="../../../css/imagen_tesis/icons/noticia.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                        </a>
                                    </li>
                                    <!-- Seccion mensaje -->
                                    <li class="nav-link">
                                        <a  href="<?php echo $url_base;?>secciones/docente/mensaje_doc/index.php">
                                            <img src="../../../css/imagen_tesis/icons/mensaje.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                        </a>
                                    </li>
                                    <!-- Seccion unidad -->
                                    <li class="nav-link">
                                        <a  href="<?php echo $url_base;?>secciones/docente/unidad_doc/index.php">
                                            <img src="../../../css/imagen_tesis/icons/libro.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                        </a>
                                    </li>
                                    <!-- Seccion perfil -->
                                    <li class="nav-link">
                                        <a  href="<?php echo $url_base;?>secciones/docente/perfil_doc/index.php">
                                            <img src="../../../css/imagen_tesis/icons/perfil.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                        </a>
                                    </li>
                                    <!-- Seccion de cierre de sesion -->
                                    <li class="nav-link">
                                        <a  href="<?php echo $url_base;?>secciones/docente/cerrar_doc.php">
                                            <img src="../../../css/imagen_tesis/icons/cerrar.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </nav>
                
            <main class="container">
            <!--Sweet alert Mensaje de confirmación-->
            <?php if (isset($_GET['mensaje'])) { ?>
                <script>
                    Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje']; ?>"});    
                </script>
            <?php } ?>    
        </body>
    <!-- fin archivo header.php -->