<?php 
    include("../../templates/header.php");
    include("../../bd.php");
    
    if ($_POST) {    
        $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "" ;
        $cuerpo= (isset($_POST["cuerpo"])) ? $_POST["cuerpo"] : "";
    }    
    $sentencia = $conexion->prepare("
        UPDATE tbl_noticia 
        SET
            titulo=:titulo,
            cuerpo=:cuerpo,
            
        WHERE id=:id ");
        
        //Asignando los valores que vienen del  método POST (Los que vienen del formulario).
        $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":cuerpo",$cuerpo);

        $sentencia->execute();
        //Mensaje de Registro Actualizado (Sweet alert).
        $mensaje="Mensaje Enviado";
        header("Location:index.php?mensaje=".$mensaje);    
        
        
    ?>



    <?php 
    include("../../templates/footer.php");
    ?>    
    