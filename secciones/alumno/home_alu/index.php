
<?php include("../templates_alu/header_alu.php")?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Alumno</title>
        <!--Script para sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">    
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>    
    <br>
    <!-- Página de inicio -->
    <body>
        <br>
        <br>
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5" style="background-color:azure">
                <h1 class="display-5 fw-bold">Introducción</h1>
                <p class="col-md-8 fs-4">
                    <h1>Bienvenid@ <?php echo $_SESSION['usuario'];?> a "BridgeClass"</h1>
                        Nos enorgullece presentarles un proyecto que surge del compromiso con la excelencia educativa y la innovación constante. 
                    Desde su concepción, nuestra plataforma se ha distinguido por su carácter original y vanguardista, 
                    con un enfoque inclusivo y participativo que busca atender las diversas necesidades y expectativas de docentes y alumnos por igual.
                    <br>
                        En un mundo donde la educación es clave para el desarrollo personal y social, creemos firmemente en la importancia de brindar herramientas que faciliten el proceso de enseñanza y aprendizaje. 
                    Es por ello que hemos creado esta página web, un espacio diseñado para conectar a docentes y alumnos en un entorno virtual dinámico y enriquecedor.
                    <br>
                </p>
                <!-- <button class="btn btn-primary btn-lg" type="button">
                    Example button
                </button> -->
            </div>
        </div>
    </body>
    <br>
<?php include("../templates_alu/footer_alu.php")?>