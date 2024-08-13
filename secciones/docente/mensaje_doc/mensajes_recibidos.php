
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <br>
    <br>
        <body>
            <style> 
                h1, h2, label {
                    text-align: center; 
                    font-family: Georgia, sans-serif;
                }
                .form-control.w-auto {
                    display: inline-block;
                }
            </style>
            <div class="card mx-auto" style="max-width: 900px;">
                <!--Header y button primary-->
                <label class="card" style="background-color:gold"><h1>Noticias</h1></label>
                <div class="card-header" style="background-color:silver"></div>
                <div class="card-body" style="background-color:azure">
                    <br>
                    <div class="container mt-3" style="background-color:azure">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label for="fecha" class="form-label"><h4>Fecha:</h4></label>
                                <input type="text"
                                    value="<?php echo $fecha_formateada = date('d/m/Y H:i:s', strtotime($registro['fecha']));?>" 
                                    class="form-control w-auto" id="fecha" readonly name="fecha">
                            </div>
                            
                            <div class="mb-3 ">
                                <label for="titulo" class="form-label"><h4>Titulo:</h4></label>
                                <input type="text"
                                    value="<?php echo $titulo?>" 
                                    class="form-control" id="titulo" readonly name="titulo">
                            </div>
                            
                            <div class="mb-3 ">
                                <label for="cuerpo" class="form-label"><h4>Mensaje:</h4></label>
                                <textarea 
                                    class="form-control" id="cuerpo" readonly name="cuerpo" rows="10" cols="50"><?php echo htmlspecialchars($cuerpo); ?></textarea>
                            </div>
                            <!-- boton para regresar al index -->
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="index.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </form> 
                        <br>
                    </div>
                </div>
            </div>
        </body>
<br><br>
    
    
