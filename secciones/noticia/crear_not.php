<?php 
    include ("../../bd.php");
    if($_POST){
        print_r($_POST);

        $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"]: "";
        $cuerpo = (isset($_POST["cuerpo"])) ? $_POST["cuerpo"]: "";

        //Preparamos la insercción de los datos.
        $sentencia = $conexion->prepare("INSERT INTO `tbl_noticia`(`id`, `titulo`, `cuerpo`) VALUES (null, :titulo, :cuerpo)");
        
        /* ("INSERT INTO 
        tbl_noticia (`id`, `titulo`, `cuerpo`) 
        VALUES (null, :titulo, :cuerpo )"); */

        $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":cuerpo",$cuerpo);
        
        //Mensaje de Registro Agregado (Sweet alert).
        $mensaje="Mensaje Creado";
        header("Location:index.php?mensaje=".$mensaje);
    }
?>
<?php include("../../templates/header.php")?>
<br>
<div class="container mt-5" style="background-color:azure">
        <h1>Enviar Noticia</h1>
            <form action="" method="post" enctype="multipart/form-data">
        
                <label for="titulo" class="form-label"><h4>Titulo:</h4></label>
                    <input type="text" class="form-control" name="titulo" id="titulo" required><br>
                
                <label for="cuerpo" class="form-label"><h3>Mensaje:</h3></label>
                    <textarea 
                    class="form-control" name="cuerpo" id="cuerpo" rows="10" cols="50" required></textarea><br>

                <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                <button type="submit" class="btn btn-success">Agregar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                <!-- <input type="submit" value="Enviar Noticia"> -->

            </form>    
    </div>
<?php  include("../../templates/footer.php") ?>