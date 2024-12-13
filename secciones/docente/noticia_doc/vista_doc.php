<?php  
    session_start();
    /* Incluimos Base de Datos y Templates/header */
    include("../../../bd.php");
    
    //Recepción del envío txtID.
    if(isset($_GET['txtID'])){
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
        
        //Preparamos la conexion de Editar.
        $sentencia = $conexion->prepare ( "SELECT * FROM tbl_noticia WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        
        //Utilizamos el FETCH_LAZY para que cargue solo un registro.
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
        $fecha = $registro["fecha"]; 
        $titulo = $registro["titulo"]; 
        $cuerpo = $registro["cuerpo"]; 
    }
    /* Recibimos los datos del metodo Post */
    if ($_POST) { 
        print_r($_POST);
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $fecha= (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
        $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "" ;
        $cuerpo= (isset($_POST['cuerpo'])) ? $_POST['cuerpo'] : "";
        
        /* Actualización de la tabla Noticia */
        $sentencia = $conexion->prepare("
        UPDATE tbl_noticia 
        SET
        fecha=:fecha,    
            titulo=:titulo,
            cuerpo=:cuerpo
            WHERE id=:id ");
            
            //Asignando los valores que vienen del  método POST (Los que vienen del formulario).
            $sentencia->bindParam(":fecha",$fecha);
            $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":cuerpo",$cuerpo);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        //Mensaje de Registro Actualizado (Sweet alert).
        $mensaje="Mensaje Editado";
        header("Location:index.php?mensaje=".$mensaje);    
    }            
    ?>

<?php include("../templates_doc/header_doc.php");?>

    <head>
        <meta charset="UTF-8">
    </head>
    <br>
    <br>
        <body>
            <!-- Estilos de h1 h2 label -->
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
<?php include("../templates_doc/footer_doc.php") ?>