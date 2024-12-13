<?php
    // Incluimos la base de datos. 
    include("../../../bd.php");

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    
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
    if ($_POST) { 
        print_r($_POST);
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $fecha = date('Y-m-d H:i:s'); 
        /* $fecha= (isset($_POST['fecha'])) ? $_POST['fecha'] : ""; */
        $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "" ;
        $cuerpo= (isset($_POST['cuerpo'])) ? $_POST['cuerpo'] : "";
    
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
<?php include("../templates/header.php");?>
<div class="container mt-5" style="background-color:azure">
    <h1>Editar Noticia</h1>
        <form action="" method="post" enctype="multipart/form-data">    
            <label for="txtID" class="form-label"><h4>Id:</h4></label>
                <input type="text"
                value="<?php echo $txtID?>" id="txtID" readonly name="txtID" required><br>
            <label for="fecha" class="form-label"><h4>fecha:</h4></label>
                <input type="text"
                value="<?php echo $fecha_formateada = date('d/m/Y H:i:s', strtotime($registro['fecha']));?>" 
                class="form-control" id="fecha" name="fecha"><br>        
            <label for="titulo" class="form-label"><h4>Titulo:</h4></label>
                <input type="text"
                value="<?php echo $titulo?>" 
                class="form-control" id="titulo" name="titulo"><br>
            <label for="cuerpo" class="form-label"><h3>Mensaje:</h3></label>
                <textarea 
                class="form-control" id="cuerpo" name="cuerpo" rows="10" cols="50"><?php echo htmlspecialchars($cuerpo); ?></textarea><br>

            <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
        </form>    
</div>
<?php include("../templates/footer.php");?>