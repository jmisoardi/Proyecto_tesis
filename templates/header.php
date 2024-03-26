<!-- Dirección base del proyecto-->
<?php 
    $url_base= "http://localhost/Proyecto_tesis/";

?>

<!--Contiene Menu y parte del Container -->
<!doctype html>
<html lang="en">
    <head>
        <title>BridgeClass</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header style="background-color:#63cdda;  text-align:center; font-family: Georgia, sans-serif;" >
            <h1><u>Gestión de Datos</u></h1>
        </header>
        
            <!--Corresponde a la barra de navegación que incluye Sistema, Personal, Rol, Usuario, Cerrar Sesión-->
            <nav class="navbar navbar-expand navbar-light bg-light">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $url_base;?>" aria-current="page">Sistema<span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <!--Ingresamos en "href php con la dirección base"-->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_base;?>secciones/personal/">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_base;?>secciones/rol/">Rol</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $url_base;?>secciones/usuario/">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cerrar.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </nav>
            
        <main class="container"> 